@extends('layouts.app')

@push('css')
<style>
.pdf-embed {
  min-height:100vh;
  width:80%;
}
#mapDaerah {
  position: relative;
  height: 60vh;
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
                    <h3>Unggah Peraturan Bupati Walikota</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Unggah Peraturan Bupati Walikota</li>
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
                  <form action="{{ route('save_peraturan') }}" class="form theme-form ml-3 " method="post" enctype="multipart/form-data">
                    <input class="form-control" name="peraturan_id" id="peraturan_id" type="hidden" value="{{ isset($peraturanBupatiWalikota->id) ? $peraturanBupatiWalikota->id : null}}">
                    <div class="card-body">
                      <div class="col-lg-12">
                          @csrf
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                            <div class="col-sm-5">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Nama Peraturan" value="{{ isset($peraturanBupatiWalikota->nama) ? $peraturanBupatiWalikota->nama : null}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Keterangan</b></label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="keterangan" id="keterangan" rows="8" cols="8">{{ isset($peraturanBupatiWalikota->keterangan) ? $peraturanBupatiWalikota->keterangan : null }}</textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Desa</b></label>
                            <div class="col-sm-9">
                              <select class="form-control indeks_desa"  name="indeks_desa">
                                @foreach($indeksDelineasiDesa as $desa)
                                <option value="{{ $desa->id }}" {{ isset($peraturanBupatiWalikota->indeks_desa_id) && $peraturanBupatiWalikota->indeks_desa_id == $desa->id ? 'selected' : '' }}>
                                  {{ $desa->desa }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Unggah Shapefile</b></label>
                            <div class="col-sm-9">
                              <input accept=".zip" class="form-control" name="shapefile" id="shapefile" type="file">
                              <div id="mapDaerah" class="map-daerah img-thumbnail" style="{{ isset($peraturanBupatiWalikota->path_geometry) ? '' : 'display:none'}}"></div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Unggah Dokumen Peraturan</b></label>
                            <div class="col-sm-9">
                              <input accept=".pdf" class="form-control" name="dokumen_peraturan" id="dokumen_peraturan" type="file" onchange="readUploadedPdf(this);">
                              <embed id="dokumen_peraturan_embed" src="{{ isset($peraturanBupatiWalikota->path_dokumen) ? $peraturanBupatiWalikota->path_dokumen : ''}}" class="img-thumbnail pdf-embed" style="{{ isset($peraturanBupatiWalikota->path_dokumen) ? '' : 'display:none'}}" type="application/pdf">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-sm-9">
                        <button id="dokumen_peraturan_upload" type="submit" class="btn btn-success" disabled>
                          <i class="icofont icofont-upload-alt"></i> Unggah Peraturan
                        </button>
                        <input class="btn btn-light" type="reset" value="Cancel" onclick="history.back();">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ./END SPECIFIC CONTENT -->
        </div>
      </div>
  </div>

@endsection

@push('js')
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

var mapDaerah = L.map('mapDaerah').setView([-4.45, 119.80], 5);
osmMapnik.addTo(mapDaerah);
L.control.layers(baseMaps, []).addTo(mapDaerah);

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
       }).addTo(mapDaerah);
       mapDaerah.fitBounds(jsonFeature.getBounds());
  });
@endif

function readUploadedPdf(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#dokumen_peraturan_embed').show();
        $('#dokumen_peraturan_embed')
            .text(e.target)
            .attr('src', e.target.result)
            .width('80%')
            .height(500);
        $('#dokumen_peraturan_upload').prop('disabled', false);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
