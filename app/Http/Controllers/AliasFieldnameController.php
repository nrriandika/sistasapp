<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisDataBatasWilayah;
use App\AliasFieldname;
use DB;
use Carbon\Carbon;

class AliasFieldnameController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index(Request $request)
  {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);

      $batasNegara = JenisDataBatasWilayah::where('kategori', 'Batas Negara')->get();
      $batasAdm = JenisDataBatasWilayah::where('kategori', 'Batas Wilayah Administrasi')->get();
      $wilayahPLaut = JenisDataBatasWilayah::where('kategori', 'Wilayah Pengelolaan Laut')->get();

      $dataBatas = [
        'Batas Negara' => $batasNegara,
        'Batas Wilayah Administrasi' => $batasAdm,
        'Wilayah Pengelolaan Laut' => $wilayahPLaut
      ];

      $tableName = $request->tbl_name;
      if(!isset($tableName)){
        $tableName = 'administrasi_ln_kabkota';
        $tableTitle = JenisDataBatasWilayah::where('nama_tabel_spasial', $tableName)->first()->nama;
      } else {
        $tableTitle = JenisDataBatasWilayah::where('nama_tabel_spasial', $tableName)->first()->nama;
      }

      $tableHeader = DB::connection('pgsql_spasial')
        ->select("select column_name from INFORMATION_SCHEMA.COLUMNS where table_name ='" . $tableName . "'");

      $aliasFieldname = AliasFieldname::where('tablename', $tableName)->get()->keyBy('fieldname');

      return view('Alias.index', compact(
        'user',
        'tableHeader',
        'tableName',
        'dataBatas',
        'aliasFieldname'
      ));
  }

  public function saveAlias(Request $request)
  {
      $user = $request->user();
      $this->validate($request, [
          'tablename' => 'required',
      ]);

      $allHeader = $request->all();
      $tableName = $allHeader['tablename'];
      foreach($allHeader['fieldname'] as $fieldname){
        $aliasFieldname = AliasFieldname::where('tablename', $tableName)
          ->where('fieldname', $fieldname)
          ->first();
        if(isset($aliasFieldname)){
          $aliasFieldname->tablename = $tableName;
          $aliasFieldname->fieldname = $fieldname;
          $aliasFieldname->alias = $allHeader['alias'][$fieldname];
          if(isset($allHeader['status'][$fieldname])){
            $aliasFieldname->status = $allHeader['status'][$fieldname] == 'on' ? true : false;
          } else {
            $aliasFieldname->status = false;
          }
          $aliasFieldname->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $aliasFieldname->save();
        } else {
          $aliasFieldname = new AliasFieldname;
          $aliasFieldname->tablename = $tableName;
          $aliasFieldname->fieldname = $fieldname;
          $aliasFieldname->alias = $allHeader['alias'][$fieldname];
          if(isset($allHeader['status'][$fieldname])){
            $aliasFieldname->status = $allHeader['status'][$fieldname] == 'on' ? true : false;
          } else {
            $aliasFieldname->status = false;
          }
          $aliasFieldname->created_at = Carbon::now()->format('Y-m-d H:i:s');
          $aliasFieldname->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $aliasFieldname->save();
        }
      }
      return redirect()->route('alias', ["tbl_name" => $tableName]);
  }
}
