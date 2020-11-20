<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\PeriodeData;
use App\PeriodeDataBatasWilayah;
use Illuminate\Http\Request;
use App\JenisDataBatasWilayah;
use App\Helpers\GlobalHelper;

class MapController extends Controller
{
    public function home()
    {
       return redirect('/');
    }

    public function index(Request $request)
    {
        $wms_url = env('GEOSERVER_URL').'/wms';
        $user = $request->user();
        $jenisDataBatasWilayahAll = JenisDataBatasWilayah::all();
        $batasNegara = JenisDataBatasWilayah::where('kategori', 'Batas Negara')->get()->toArray();
        $batasAdm = JenisDataBatasWilayah::where('kategori', 'Batas Wilayah Administrasi')->get()->toArray();
        $wilayahPLaut = JenisDataBatasWilayah::where('kategori', 'Wilayah Pengelolaan Laut')->get()->toArray();

        /* Wilayah Pengelolaan Laut under Batas Wilayah ADM */
        $dataBatasForController = [
          'Batas Negara' => $batasNegara,
          'Batas Wilayah Administrasi' => array_merge(
            $batasAdm, ['Wilayah Pengelolaan Laut' => $wilayahPLaut]
          ),
        ];
        $dataBatasAll = [
          'Batas Negara' => $batasNegara,
          'Batas Wilayah Administrasi' => $batasAdm,
          'Wilayah Pengelolaan Laut' => $wilayahPLaut
        ];

        $activeData = [];
        foreach($jenisDataBatasWilayahAll as $tableName){
          $periodeDataActive = PeriodeData::where("idJenisDataBatasWilayah", $tableName->id)
            ->where("active", true)
            ->first();
          if($periodeDataActive->nama == "Initial Period") {
            $activeData[$tableName->nama_layer_geoserver] = "initial_period";
          } else {
            $activeData[$tableName->nama_layer_geoserver] = $this->getActivePeriod($tableName);
          }

        }
        return view('MainMap.index', compact('wms_url', 'user', 'dataBatasAll', 'dataBatasForController', 'activeData'));
    }

    public function getInfo(Request $request)
    {
        $coordX = $request->get('coordX');
        $coordY = $request->get('coordY');
        $layers = $request->get('layers');
        if (!$coordX || !$coordY || !$layers){
          return '{"type": "false"}';
        }
        $listLayers = explode(",",str_replace("bataswilayah:","",$layers));

        foreach($listLayers as $tableName){
          $tableObj = JenisDataBatasWilayah::where("nama_tabel_spasial",$tableName)->first();
          $geoTyp = $this->getGeoType($tableName);
          $idDataList = $this->getActivePeriod($tableObj);
          $selectQuery = 'select ST_AsGeoJSON(t.*) from '.$tableName.' as t ';
          if ($geoTyp == 'Polygon'){
            $whereCls = "ST_Contains(wkb_geom,(select ST_GeomFromText('SRID=4326;POINT(".$coordX." ".$coordY.")')))";
          } else {
            $whereCls = "ST_DWithin(wkb_geom,(select ST_GeomFromText('SRID=4326;POINT(".$coordX." ".$coordY.")')), 0.01)";
          }
          $whereClsIn = 'gid IN ('.$idDataList.')';

          $tableQuery = DB::connection('pgsql_spasial')
            ->select($selectQuery.' where '.$whereCls.' and '.$whereClsIn);

          if(count($tableQuery) != 0){
            $tableQuery = $tableQuery[0]->st_asgeojson;
            $jsonKeep = json_decode($tableQuery);
            $propertiesalias = [];
            foreach($jsonKeep->properties as $key => $value){
              $propertiesalias[GlobalHelper::getAlias($tableName, $key)] = $value;
            }
            $jsonKeep->propertiesalias = $propertiesalias;
            $tableQuery = json_encode($jsonKeep);
            break;
          } else {
            $tableQuery = '{"type": "false"}';
          };
        }
        return $tableQuery;
    }

    public function getAllLayers(Request $request)
    {
        $layers = JenisDataBatasWilayah::all();
        return $layers;
    }

    public function getAllFields(Request $request)
    {
        $tableName = $request->get('tableName');
        $fieldQuery = 'select column_name from information_schema.columns ' .
                      'where table_name = \'' . $tableName . '\' ' .
                      'and column_name != \'wkb_geom\' ' .
                      'and column_name != \'gid\' ' .
                      'and column_name != \'objectid\'';
        $tableQuery = DB::connection('pgsql_spasial')
          ->select($fieldQuery);
        return $tableQuery;
    }

    public function getAllValues(Request $request)
    {
        $colName = $request->get('colName');
        $tableName = $request->get('tableName');
        $columnQuery = 'select gid, ' . $colName . ' as value from ' . $tableName;
        $tableQuery = DB::connection('pgsql_spasial')
          ->select($columnQuery);
        $listData = [];
        foreach($tableQuery as $value){
          if($value->value){
            $item = $value->value;
          } else {
            $item = "";
          }
          array_push($listData, [$value->gid, $item]);
        };
        return $listData;
    }

    public function getSpatialObject(Request $request)
    {
        $tableName = $request->get('tableName');
        $gid = $request->get('gid');
        if (!$tableName || !$gid){
          return '{"type": "false"}';
        }
        $idDataList = $this->getActivePeriod($tableName->nama_tabel_spasial);

        $selectQuery = 'select ST_AsGeoJSON(t.*) from '.$tableName.' as t ';
          $whereCls = 'gid = '. $gid;
        $whereClsIn = 'gid IN ('.$idDataList.')';

        $tableQuery = DB::connection('pgsql_spasial')
          ->select($selectQuery.' where '.$whereCls.' and '.$whereClsIn);

        if(count($tableQuery) != 0){
          $tableQuery = $tableQuery[0]->st_asgeojson;
        } else {
          $tableQuery = '{"type": "false"}';
        };

        return $tableQuery;
    }

    private function getGeoType($tableName)
    {
      $geoTyp = null;
      if ($tableName == "batas_desa") {
        $geoTyp = 'Polygon';
      } else if ($tableName == "administrasi_ln_kabkota") {
        $geoTyp = 'Line';
      } else if ($tableName == "batas_lk_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "batas_mou_fisheries_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "batas_negara_darat_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "batas_teritorial_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "batas_zee_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "garis_pangkal_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "titik_dasar_pt") {
        $geoTyp = 'Point';
      } else if ($tableName == "zona_tambahan_ln") {
        $geoTyp = 'Line';
      } else if ($tableName == "lpl_kabkota_4nm") {
        $geoTyp = 'Polygon';
      } else if ($tableName == "lpl_prov_12nm") {
        $geoTyp = 'Polygon';
      }
      return $geoTyp;
    }

    private function getActivePeriod($tableName)
    {
        $jenisDataId = JenisDataBatasWilayah::where("nama", $tableName->nama)->first();
        $periodeDataActive = PeriodeData::where("idJenisDataBatasWilayah", $jenisDataId->id)
          ->where("active", true)
          ->first();
        if($periodeDataActive->nama == "Initial Period"){
          if ($tableName->nama_tabel_spasial == "batas_desa") {
            $idDataList = range(0,117182);
          } else if ($tableName->nama_tabel_spasial == "administrasi_ln_kabkota") {
            $idDataList = range(0,1406);
          } else if ($tableName->nama_tabel_spasial == "batas_lk_ln") {
            $idDataList = range(0,31);
          } else if ($tableName->nama_tabel_spasial == "batas_mou_fisheries_ln") {
            $idDataList = range(0,2);
          } else if ($tableName->nama_tabel_spasial == "batas_negara_darat_ln") {
            $idDataList = range(0,184);
          } else if ($tableName->nama_tabel_spasial == "batas_teritorial_ln") {
            $idDataList = range(0,21);
          } else if ($tableName->nama_tabel_spasial == "batas_zee_ln") {
            $idDataList = range(0,24);
          } else if ($tableName->nama_tabel_spasial == "garis_pangkal_ln") {
            $idDataList = range(0,193);
          } else if ($tableName->nama_tabel_spasial == "titik_dasar_pt") {
            $idDataList = range(0,195);
          } else if ($tableName->nama_tabel_spasial == "zona_tambahan_ln") {
            $idDataList = range(0,10);
          } else if ($tableName->nama_tabel_spasial == "lpl_kabkota_4nm") {
            $idDataList = range(0,329);
          } else if ($tableName->nama_tabel_spasial == "lpl_prov_12nm") {
            $idDataList = range(0,35);
          }
          $idDataList = implode(",",$idDataList);
        } else {
          $idDataList = PeriodeDataBatasWilayah::where(
            'idPeriodeData', $periodeDataActive->id
          )->pluck('idData')->toArray();
          $idDataList = implode(",",$idDataList);
        }
        return $idDataList;
    }
}
