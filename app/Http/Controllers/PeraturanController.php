<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\IndeksDelineasiDesa;
use App\PeraturanBupatiWalikota;
use Storage;
use DataTables;
use Redirect;
use Carbon\Carbon;

class PeraturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        return view('PeraturanBupatiWalikota.daftar', compact('user'));
    }

    public function uploadPeraturan(Request $request)
    {
        $user = $request->user();
        $indeksDelineasiDesa = IndeksDelineasiDesa::where('kode_kab', $user->kode_kab)->get();
        $peraturanBupatiWalikota = PeraturanBupatiWalikota::find($request->peraturan_id);
        return view('PeraturanBupatiWalikota.uploadperaturan', compact('user', 'indeksDelineasiDesa', 'peraturanBupatiWalikota'));
    }

    public function savePeraturan(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'name' => 'required|string',
            'indeks_desa' => 'required|string',
            'dokumen_peraturan' => 'required|mimes:pdf'
        ]);

        $name = $request->input("name");
        $keterangan = $request->input("keterangan");
        $indeks_desa = $request->input("indeks_desa");
        $dokumen_peraturan = $request->dokumen_peraturan;
        $shapefile = $request->shapefile;

        $peraturanBupatiWalikota = PeraturanBupatiWalikota::find($request->peraturan_id);
        if($peraturanBupatiWalikota){
          $peraturanBupatiWalikota->nama = $name;
          $peraturanBupatiWalikota->keterangan = $keterangan;
          $peraturanBupatiWalikota->indeks_desa_id = $indeks_desa;
          # Save PDF
          $fileNamePdf = $dokumen_peraturan->getClientOriginalName();
          $storageFilePdf = 'dokumenperda/'.$peraturanBupatiWalikota->id.'/'.$fileNamePdf;
          Storage::disk('uploads')->put($storageFilePdf, file_get_contents($dokumen_peraturan));
          $peraturanBupatiWalikota->path_dokumen = asset('uploads/'. $storageFilePdf);
          # Save SHP
          $fileNameShp = $shapefile->getClientOriginalName();
          $storageFileShp = 'shpperda/'.$peraturanBupatiWalikota->id.'/'.$fileNameShp;
          Storage::disk('uploads')->put($storageFileShp, file_get_contents($shapefile));
          $peraturanBupatiWalikota->path_geometry = asset('uploads/'. $storageFileShp);
          # Save Peraturan
          $peraturanBupatiWalikota->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $peraturanBupatiWalikota->save();
        } else {
          $peraturanBupatiWalikota = new PeraturanBupatiWalikota;
          $peraturanBupatiWalikota->user_id =  $user->id;
          $peraturanBupatiWalikota->nama = $name;
          $peraturanBupatiWalikota->keterangan = $keterangan;
          $peraturanBupatiWalikota->indeks_desa_id = $indeks_desa;
          # Save PDF
          $fileNamePdf = $dokumen_peraturan->getClientOriginalName();
          $storageFilePdf = 'dokumenperda/'.$peraturanBupatiWalikota->id.'/'.$fileNamePdf;
          Storage::disk('uploads')->put($storageFilePdf, file_get_contents($dokumen_peraturan));
          $peraturanBupatiWalikota->path_dokumen = asset('uploads/'. $storageFilePdf);
          # Save SHP
          $fileNameShp = $shapefile->getClientOriginalName();
          $storageFileShp = 'shpperda/'.$peraturanBupatiWalikota->id.'/'.$fileNameShp;
          Storage::disk('uploads')->put($storageFileShp, file_get_contents($shapefile));
          $peraturanBupatiWalikota->path_geometry = asset('uploads/'. $storageFileShp);
          # Save Peraturan
          $peraturanBupatiWalikota->created_at = Carbon::now()->format('Y-m-d H:i:s');
          $peraturanBupatiWalikota->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $peraturanBupatiWalikota->save();

        }
        return redirect()->route('daftar_peraturan');
    }

    // public function dokumenPeraturan(Request $request)
    // {
    //     $user = $request->user();
    //     $user->authorizeRoles(['user_daerah']);
    //     return view('PeraturanBupatiWalikota.dokumenasistensi', compact('user'));
    // }

    public function deletePeraturan(Request $request)
    {
      $user = $request->user();
      $peraturanBupatiWalikota = PeraturanBupatiWalikota::find($request->peraturan_id);
      dd($peraturanBupatiWalikota);
    }

    public function getPeraturanData(Request $request)
    {
        $user = $request->user();
        if($user->hasAnyRole(['user_daerah'])){
          $peraturanBupatiWalikota = PeraturanBupatiWalikota::where("user_id",$user->id);
        } else {
          $peraturanBupatiWalikota = PeraturanBupatiWalikota::all();
        }
        return Datatables::of($peraturanBupatiWalikota)
            ->addColumn('username', function ($data) {
                return User::find($data->user_id)->name;
            })
            ->addColumn('desa', function ($data){
                $indeksDelineasiDesa = IndeksDelineasiDesa::find($data->indeks_desa_id);
                return $indeksDelineasiDesa->desa;
            })
            ->addColumn('date', function ($data) {
              return date('d-m-Y, H:i:s', strtotime($data->updated_at));
            })
            ->addColumn('link_pdf', function ($data){
                return "<a href='$data->path_dokumen' target='_blank' class='btn btn-xs btn-danger' role='button'><i class='fa fa-eye'></i> Lihat Dokumen</a>";
             })
            ->addColumn('link_shp', function ($data){
                return "<a href='$data->path_geometry' class='btn btn-xs btn-primary' role='button'><i class='fa fa-download'></i> Unduh Shapefile</a>";
            })
            ->addColumn('action', function ($data) {
                return "<a href='" . route('upload_peraturan', ["peraturan_id" => $data->id]) . "' class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a><br>" .
                "<a href='" . route('detail_peraturan', ["peraturan_id" => $data->id]) . "' class='btn btn-xs btn-info' role='button'><i class='fa fa-eye'></i> Lihat</a><br>" .
                "<a href='#' class='btn btn-xs btn-danger delete-peraturan' role='button' nama-peraturan='" . $data->nama . "' peraturan-id='" . $data->id . "' data-toggle='modal' data-target='#deletePeraturanModal'><i class='fa fa-trash'></i> Hapus</a>";

            })
            ->rawColumns(['action', 'link_pdf', 'link_shp', 'date'])
            ->make(true);
    }

    public function detailPeraturan(Request $request)
    {
      $user = $request->user();


      if(isset($request->peraturan_id)){
        $peraturanBupatiWalikota = PeraturanBupatiWalikota::find($request->peraturan_id);
        $peraturanDesa = IndeksDelineasiDesa::find($request->peraturan_id);
        
      } else {
        $peraturanBupatiWalikota = null;
      }

      return view('PeraturanBupatiWalikota.detailperaturan', compact(
        'user',
        'peraturanBupatiWalikota',
        'peraturanDesa'
      ));
    }




}
