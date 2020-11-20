<?php

namespace App\Http\Controllers;

// require_once('php-shapefile/src/Shapefile/ShapefileAutoloader.php');
// Shapefile\ShapefileAutoloader::register();

use Illuminate\Http\Request;
use App\JenisDataBatasWilayah;
use App\PeriodeData;
use App\PeriodeDataBatasWilayah;
use Storage;
use DataTables;
use DB;

class DaftarLplController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big', 'user_kemenkeu']);

        $batasNegara = JenisDataBatasWilayah::where('kategori', 'Batas Negara')->get();
        $batasAdm = JenisDataBatasWilayah::where('kategori', 'Batas Wilayah Administrasi')->get();
        $wilayahPLaut = JenisDataBatasWilayah::where('kategori', 'Wilayah Pengelolaan Laut')->get();

        $dataBatas = [
          'Batas Negara' => $batasNegara,
          'Batas Wilayah Administrasi' => $batasAdm,
          'Wilayah Pengelolaan Laut' => $wilayahPLaut
        ];

        // dropdown menu starts
        $tableName = $request->tbl_name;
        if(!isset($tableName)){
          $tableName = 'lpl_prov_12nm';
          $tableTitle = JenisDataBatasWilayah::where('nama_tabel_spasial', $tableName)->first()->nama;
        } else {
          $tableTitle = JenisDataBatasWilayah::where('nama_tabel_spasial', $tableName)->first()->nama;
        }


        // download button
        $geoserver_url = env('GEOSERVER_URL');
        $gsParameter = "/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=";
        $layerName =  "bataswilayah:" . $tableName;
        $outputFormat = "&outputFormat=";
        $wfs_url = $geoserver_url . $gsParameter . $layerName . $outputFormat;

        $SHP = "SHAPE-ZIP";
        $KML = "application%2Fvnd.google-earth.kml%2Bxml";
        $CSV = "csv";
        $GeoJSON = "application/json";

        //table header
        $tableHeader = DB::connection('pgsql_spasial')
          ->select("select column_name from INFORMATION_SCHEMA.COLUMNS where table_name ='" . $tableName . "'");





        return view('DaftarLPL.view', compact(
          'user',
          'wilayahPLaut',
          'tableHeader',
          'tableTitle',
          'tableName',
          'wfs_url',
          'SHP',
          'KML',
          'CSV',
          'GeoJSON'
        ));
    }


    //request table starts
    public function getDaftarLayer(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big', 'user_kemenkeu']);

        $table_name = $request->tbl_name;
        if(!isset($table_name)){
          $table_name = 'lpl_kabkota_4nm';
        }
        $tableQuery = DB::connection('pgsql_spasial')->table($table_name)->orderBy('gid', 'asc');
        return Datatables::of($tableQuery)
            ->make(true);
    }

}
