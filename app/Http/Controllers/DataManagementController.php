<?php

namespace App\Http\Controllers;

// require_once('php-shapefile/src/Shapefile/ShapefileAutoloader.php');
// Shapefile\ShapefileAutoloader::register();

use Illuminate\Http\Request;
use App\JenisDataBatasWilayah;
use App\PeriodeData;
use App\PeriodeDataBatasWilayah;
use Storage;
use Shapefile\Shapefile;
use Shapefile\ShapefileException;
use Shapefile\ShapefileReader;
use DB;

class DataManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeShp(Request $request)
    {
        $this->validate($request, [
            'uploadedShpFile' => 'required|file|mimes:zip',
            'jenisDataId' => 'required',
        ]);
        $file = $request->file('uploadedShpFile');
        $fileName = $file->getClientOriginalName();
        $storageFile = 'datashpzip/'.$fileName;
        Storage::disk('local')->put($storageFile, file_get_contents($file));
        $outputZip = Storage::disk('local')->path($storageFile);
        $zip = new \ZipArchive;
        $res = $zip->open($outputZip);
        $outputUnZip = Storage::disk('local')->path('datashpzip/'.pathinfo($storageFile, PATHINFO_FILENAME));
        if ($res === TRUE) {
          $zip->extractTo($outputUnZip);
          $zip->close();
          Storage::delete($outputZip);
          unlink($outputZip);
        } else {
          return false;
        }
        $shpFile = false;
        foreach (scandir($outputUnZip) as $extfile) {
          if(pathinfo($extfile, PATHINFO_EXTENSION ) === 'shp') {
              $shpFile = $outputUnZip.'/'.$extfile;
          }
        }
        if ($shpFile === FALSE) {
          return redirect()->back();
        } else {
          return redirect()->route('new_period_form', [
            'jenisDataId' => $request->jenisDataId,
            'shpPath' => $shpFile
          ]);
        }
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $batasNegara = JenisDataBatasWilayah::where('kategori', 'Batas Negara')->get();
        $batasAdm = JenisDataBatasWilayah::where('kategori', 'Batas Wilayah Administrasi')->get();
        $wilayahPLaut = JenisDataBatasWilayah::where('kategori', 'Wilayah Pengelolaan Laut')->get();
        $dataBatas = [
          'Batas Negara' => $batasNegara,
          'Batas Wilayah Administrasi' => $batasAdm,
          'Wilayah Pengelolaan Laut' => $wilayahPLaut
        ];
        return view('DataManagement.view', compact('user', 'dataBatas'));
    }

    public function formNewPeriod(Request $request)
    {
      $user = $request->user();
      $jenisDataId = $request->jenisDataId;
      $shpPath = $request->shpPath;
      $labelJenisData = JenisDataBatasWilayah::find($jenisDataId)->nama;
      return view('DataManagement.newperiod', compact('user', 'jenisDataId', 'shpPath', 'labelJenisData'));
    }

    public function createNewPeriod(Request $request)
    {
      $this->validate($request, [
          'shpPath' => 'required|string',
          'jenisDataId2' => 'required|integer',
          'nama' => 'required|string',
          'tanggal_periode' => 'required|date',
      ]);

      $user = $request->user();
      $shpPath = $request->input('shpPath');
      $jenisDataId = $request->input('jenisDataId2');
      $nama = $request->input('nama');
      $tanggal_periode = $request->input('tanggal_periode');
      $tanggal_periode = date('d-m-Y', strtotime($tanggal_periode));
      $catatan = $request->input('catatan');
      $active = $request->input('active');
      if ($active == 'on'){
        $active = 1;
        PeriodeData::where('active', 1)
          ->where('idJenisDataBatasWilayah', $jenisDataId)
          ->update(['active' => 0]);
      } else {
        $active = 0;
      }

      $periodeData = new PeriodeData;
      $periodeData->nama = $nama;
      $periodeData->idJenisDataBatasWilayah = $jenisDataId;
      $periodeData->tanggal_periode = $tanggal_periode;
      $periodeData->active = $active;
      $periodeData->catatan = $catatan;
      $periodeData->save();

      $jenisData = JenisDataBatasWilayah::find($jenisDataId);

      try {
        // Open Shapefile
        $Shapefile = new ShapefileReader($shpPath);

        // Read all the records
        while ($Geometry = $Shapefile->fetchRecord()) {
            // Skip the record if marked as "deleted"
            if ($Geometry->isDeleted()) {
                continue;
            }
            $dataArray = $Geometry->getDataArray();
            $query = "select ST_Multi(ST_GeomFromText('SRID=4326;".$Geometry->getWKT()."'))";
            $wkb_geom = DB::connection('pgsql_spasial')->select(DB::raw($query))[0]->st_multi;
            $dataArray["wkb_geom"] = $wkb_geom;
            $dataArray = array_change_key_case($dataArray,CASE_LOWER);
            $dataUpdatedQuery = DB::connection('pgsql_spasial')->table(
              $jenisData->nama_tabel_spasial
            );
            $dataUpdatedQuery->insert($dataArray);
            $idData = $dataUpdatedQuery->getConnection()->getPdo()->lastInsertId();
            $periodedatabataswilayah = new PeriodeDataBatasWilayah;
            $periodedatabataswilayah->idPeriodeData = $periodeData->id;
            $periodedatabataswilayah->idJenisDataBatasWilayah = $jenisDataId;
            $periodedatabataswilayah->idData = $idData;
            $periodedatabataswilayah->save();
        }

      } catch (ShapefileException $e) {
          $errorMsg = ("Error Type: " . $e->getErrorType()
              . "\nMessage: " . $e->getMessage()
              . "\nDetails: " . $e->getDetails());
          return redirect()->route('data_management')->withErrors(['msg', $errorMsg]);
      }
      return redirect()->route('data_management');
    }
}
