@extends('layouts.app')

@push('css')
<!-- Calendar -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/calendar.css') }}">
<style>
ul.disc-list {
  list-style-type: disc;
  margin-left: 2%;
}
.edit-date {
  margin-right: 8px;
}

#pdfEmbed {
  min-height:80vh;
  width:100%;
}

#shpMap {
  position: relative;
  height: 80vh;
  z-index:1;
}

</style>
@endpush

@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper box-layout box-layout">
    @include('NavigationBar.index')
    <div class="page-body-wrapper">
        @include('MenuBar.index')
        @include('ControlBar.advance')
        <div class="page-body">
          <!-- START SPECIFIC CONTENT-->
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col">
                  <div class="page-header-left">
                    <h3>Detail Peraturan</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('daftar_peraturan') }}">Daftar Peraturan</a></li>
                      <li class="breadcrumb-item active">Detail Peraturan</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Peraturan {{ $peraturanBupatiWalikota->nama }}</h5>
                    <p>Diajukan oleh : <b>{{ $user->getUsersById($peraturanBupatiWalikota->user_id)->name }}</b></p>
                    <a href="{{ route('upload_peraturan', ['peraturan_id' => $peraturanBupatiWalikota->id]) }}" type="button" class="btn btn-info btn-sm" data-original-title="" title="">
                      <i class="icofont icofont-edit-alt"></i> Sunting
                    </a>

                  </div>
                  <div class="card-body">
                    <table id="tableDaftarPeraturan">
                      <tr>
                        <th style="width: 20%;">Nama Peraturan</th>
                        <th>:</th>
                        <td>
                        {{$peraturanBupatiWalikota->nama}}
                        </td>
                        </th>
                      </tr>
                      <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <td>
                        {{$peraturanBupatiWalikota->keterangan}}
                        </td>
                      </tr>

                      <tr>
                        <th>Desa</th>
                        <th>:</th>
                        <td>
                        {{$peraturanDesa->desa}}
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Start Dokumen View  -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        <a href="{{ $peraturanBupatiWalikota->path_dokumen }}" target="_blank" type="button" class="btn btn-danger btn-xs">
                          <i class="icofont icofont-download-alt"></i>
                          Lihat Dokumen
                        </a>
                        <embed id="pdfEmbed" src="{{ $peraturanBupatiWalikota->path_dokumen }}" class="img-thumbnail pdf-embed" type="application/pdf">
                      </div>
                      <div class="col-xl-6">
                        <a href="{{ $peraturanBupatiWalikota->path_geometry }}" type="button" class="btn btn-primary btn-xs">
                          <i class="icofont icofont-download-alt"></i>
                          Unduh Shapefile
                        </a>
                        <div id="shpMap"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Dokumen View -->
          </div>
        </div>
    </div>
    <!-- ./END SPECIFIC CONTENT -->
</div>

@endsection

@push('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/shpjs@latest/dist/shp.js"></script>
<script>
    var osmMapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    var esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });
    var baseMaps = {
      "OSM" : osmMapnik,
      "Esri World Imagery": esri_WorldImagery
    };

var shpMap = L.map('shpMap').setView([-4.45, 119.80], 5);
osmMapnik.addTo(shpMap);
L.control.layers(baseMaps, []) .addTo(shpMap);

// load shp here
@if(isset($peraturanBupatiWalikota->path_geometry))
  shp("{{$peraturanBupatiWalikota->path_geometry}}").then(function(geojson){
       var jsonFeature = L.geoJson(geojson, {
         onEachFeature: function (feature, layer) {
           if (feature.properties) {
               var allattributes = "";
               for (var key in feature.properties) {
                 if (feature.properties.hasOwnProperty(key)) {
                     allattributes += "<tr><th>" + key + "</th><td> : </td><td>" + feature.properties[key] + "</td></tr>";
                 }
               }
               var content = "<table>" + allattributes + "</table>";
               layer.bindPopup(content);
             }
          }
       }).addTo(shpMap);
       shpMap.fitBounds(jsonFeature.getBounds());
  });
@endif
</script>
@endpush
