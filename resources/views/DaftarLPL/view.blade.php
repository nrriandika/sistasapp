@extends('layouts.app')

@push('css')
<style>

#mapid {
  position: relative;
  height: 300px;
  margin-top: 10px;
  z-index:1;
  }

.multiselect {
  width: 150px;

}

.selectBox {
  position: relative;

}

.selectBox select {
  width: 100%;

}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;

}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
  top: 50px;

}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}

.large-table-container-3 {
  max-width: 100%;
  overflow-x: scroll;
  overflow-y: auto;
}
.large-table-fake-top-scroll-container-3 {
  max-width: 100%;
  overflow-x: scroll;
  overflow-y: auto;
}
.large-table-fake-top-scroll-container-3 div {
  font-size:1px;
  line-height:1px;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/datatables.css') }}">

@endpush

@section('content')
  <!-- page-wrapper Start-->
  <div class="page-wrapper box-layout box-layout">
      @include('NavigationBar.index')
      <div class="page-body-wrapper">
          @include('MenuBar.index')

          @include('ControlBar.advance')
          <div class="page-body">



            <div class="container-fluid">
              <div class="page-header">
                <div class="row">
                  <div class="col">
                    <div class="page-header-left">
                      <h3>Wilayah Pengelolaan Laut</h3>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Wilayah Pengelolaan Laut</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                  @if($errors->any())
                      <div class="alert alert-danger dark" role="alert">
                        {{ implode('', $errors->all(':message')) }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title="">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                  @endif
                  <div class="card">
                    <div class="card-body">
                      <div class="row" >
                        <div class="col-lg-4 mr-0">
                          <div class="mb-2">
                            <select id="DaftarLayerOptions" class="js-example-basic-single col-sm-12">
                              <option>Pilih Jenis LPL</option>

                                @foreach($wilayahPLaut as $value)
                                <option data-nama="{{ $value->nama_tabel_spasial }}">
                                {{$value->nama}}
                                </option>
                                @endforeach

                            </select>
                          </div>
                        </div>



                        <!-- download button starts -->
                        <div class="btn-group btn-group-sm col-sm-1">
                            <a href="{{$wfs_url .$SHP}}"><button class="btn btn-danger btn-sm ml-1 px-3" download>Download SHP</button></a>
                            <a href="{{$wfs_url .$KML}}"><button class="btn btn-primary btn-sm ml-1 px-3" download>Download KML</button></a>
                            <a href="{{$wfs_url .$CSV}}"><button class="btn btn-success btn-sm ml-1 px-3" download>Download CSV</button></a>
                            <a href="{{$wfs_url .$GeoJSON}}"><button class="btn btn-warning btn-sm ml-1 px-3" download>Download GeoJSON</button></a>
                        </div>


                      </div>


                    </div>
                  </div>

                  <div class="card" >
                    <div class="card-header">
                      <h5>PETA WILAYAH PENGELOLAAN LAUT</h5>
                      <div class="card-header-right">
                          <ul class="list-unstyled card-option" style="width: 35px;">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                          </ul>
                      </div>

                    </div>
                    <div class="card-body">
                      <!-- Peta Pengelolaan Wilayah Laut -->
                      <div class="row">
                        <div id="mapid"class="col-sm-10"></div>
                        <!-- multiple select dropdown starts -->
                        <div class="col-sm-2" >
                          <form>
                            <div class="multiselect">
                              <div class="selectBox" onclick="showCheckboxes()">
                                <select class="js-example-basic-single" >
                                  <option>Periode Data</option>
                                </select>
                                <div class="overSelect"></div>
                              </div>
                              <div id="checkboxes">
                                <label for="one">
                                  <input type="checkbox" id="one" />First checkbox</label>
                                <label for="two">
                                  <input type="checkbox" id="two" />Second checkbox</label>
                                <label for="three">
                                  <input type="checkbox" id="three" />Third checkbox</label>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="card" >
                    <div class="card-header">
                      <h5>Tabel Data {{$tableTitle}}</h5>
                      <div class="card-header-right">
                          <ul class="list-unstyled card-option" style="width: 35px;">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                          </ul>
                        </div>
                    </div>
                    <div class="card-body" >
                      <div class="row"  >
                        <!-- table starts-->
                        <div class="large-table-fake-top-scroll-container-3">
                          <div>&nbsp;</div>
                        </div>
                        <div class="large-table-container-3">
                          <table id="tableDaftarLayer" class="display" style="width:100%">
                            <thead >
                              <tr>
                                @foreach($tableHeader as $header)
                                  @if($header->column_name != 'wkb_geom')
                                    <th>{{ GlobalHelper::getAlias($tableName, $header->column_name) }}</th>
                                  @endif
                                @endforeach
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>





            </div>
          </div>
        </div>
    </div>
@endsection

@push('js')


<script src="{{ asset('js/endless/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/endless/datatable/datatables/datatable.custom.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script>
var mymap = L.map('mapid').setView([-4.45, 119.80], 4);
var osmMapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

var esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
  attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});

var baseMaps = {
  "OSM" : osmMapnik,
  "Esri World Imagery": esri_WorldImagery
};

L.control.layers(baseMaps, []).addTo(mymap);

/* Layers  WFS */
var adminlayerWFS = L.geoJson(null, {
  //Fungsi style
  style: function (feature) {
    return {
     color: "blue",
     weight: 1,
     opacity: 1
    };
  },

  onEachFeature: function (feature, layer) {
    layer.on({
      mouseover: function (e) {
        var popupcontent = "Nama: " + feature.properties.fid;
        adminlayerWFS.bindPopup(popupcontent);
        e.target.setStyle({
            color: '#1d2c57',
            opacity: 1,
            weight: 3
        });
      },
      mouseout: function (e) {
        mymap.closePopup();
        e.target.setStyle({
            color: "blue",
            weight: 1,
            opacity: 1
        });
      }
    });
  }
});

var geoJsonUrl ='http://103.152.118.19:8080/geoserver/ows';
var defaultParameters = {
    service: 'WFS',
    version: '1.0.0',
    request: 'getFeature',
    typeName: 'bataswilayah:lpl_prov_12nm',
    maxFeatures: 1,
    outputFormat: 'application/json'
};
$.getJSON(geoJsonUrl + L.Util.getParamString(defaultParameters), function (data) {
  adminlayerWFS.addData(data);
  mymap.addLayer(adminlayerWFS);
});



</script>
<script>


var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

$('#DaftarLayerOptions').change(function(){
  var nama_tabel_spasial = $(this).find(':selected').attr('data-nama');
  var url = location.protocol + '//' + location.host + location.pathname;
  url += '?tbl_name=' + nama_tabel_spasial;
  window.location.href = url;
});

function GetUrlParameter(sParam){
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++){
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam){
            return sParameterName[1];
        }
    }
}

var tbl_name = GetUrlParameter('tbl_name');
if(tbl_name){
  var ajax_url = "{{ route('daftar_lpl') }}?tbl_name="+tbl_name;
} else {
  var ajax_url = "{{ route('daftar_lpl') }}";
}
$('#tableDaftarLayer').DataTable({
     processing: true,
     serverSide: true,
     lengthMenu: [[25, 100, 250, 500, -1], [25, 100, 250, 500, "All"]],
     ajax: ajax_url,
     columns: [
         @foreach($tableHeader as $header)
          @if($header->column_name != 'wkb_geom')
          { data: '{{$header->column_name}}', name: '{{$header->column_name}}' },
          @endif
         @endforeach
     ],
 });

 $(function() {
   var tableContainer = $(".large-table-container-3");
   var table = $(".large-table-container-3 table");
   var fakeContainer = $(".large-table-fake-top-scroll-container-3");
   var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");

   var tableWidth = table.width();
   fakeDiv.width(tableWidth);

   fakeContainer.scroll(function() {
     tableContainer.scrollLeft(fakeContainer.scrollLeft());
   });
 })
</script>
@endpush
