@extends('layouts.app')

@push('css')
<!-- Summernote css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/summernote.css') }}">
<style>
.card .card-body .minim-padding {
    padding: 0px;
}
.map-dokast {
  height: 480px;
  width: 100%;
  z-index: 0;
}
.p-justify {
  text-align: justify;
  text-justify: inter-word;
}
.pdf-embed {
  min-height:80vh;
  width:100%;
}
.card .card-header .card-header-right .status-form i {
  margin: 0 5px;
  cursor: pointer;
  color: #ffffff;
  line-height: 20px;
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
                      <h3>Detail Form Asistensi</h3>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('daftar_asistensi') }}">Asistensi Batas Desa</a></li>
                        <li class="breadcrumb-item active">Detail Form Asistensi</li>
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
                        <h5>{{ $formAsistensi->name }}</h5>
                        <span>{{ $jenisPengajuan->nama }}</span>
                        <span>{{ $formAsistensi->updated_at }}</span>
                        <div class="card-header-right">
                          @if($formAsistensi->verified)
                          <div class="alert alert-success dark status-form" role="alert">
                            <i class="icofont icofont-certificate" ></i>
                            Sudah Tervefirikasi
                          </div>
                          @else
                          <div class="alert alert-warning dark" role="alert">
                            Belum Terverifikasi
                          </div>
                          @endif
                        </div>
                      </div>
                      <div class="card-body minim-padding">
                        <button class="btn btn-primary btn-sm" type="button" title="Unduh">
                          <i class="icofont icofont-download"></i>
                          Unduh Semua Dokumen
                        </button>
                        <button class="btn btn-danger btn-sm surat-permohonan" type="button">
                          <i class="icofont icofont-law-document"></i>
                          Surat Permohonan Asistensi
                        </button>
                        <p class="p-justify">{{ $formAsistensi->description }}</p>
                      </div>
                    </div>

                    @foreach($fileAsistensi as $files)
                    <div class="card">
                      <div class="card-header">
                        <h5>
                          @if(trim($files->format) === 'jpg')
                          <i class="icofont icofont-file-jpg mr-2"></i>
                          @elseif(trim($files->format) === 'zip (shapefile)')
                          <i class="icofont icofont-file-zip mr-2"></i>
                          @else
                          <i class="icofont icofont-file-pdf mr-2"></i>
                          @endif
                          {{ $files->nama_file }}
                          <a href="{{ $files->file_path }}" type="button" class="btn btn-info btn-sm" download>
                            <i class="icofont icofont-download-alt"></i>
                          </a>
                        </h5>
                        <span>{{ $files->jenis_dokumen }}</span>
                        <span>{{ $files->getDesaName() }}</span>
                        <span>{{ $files->updated_at}}</span>
                        <div class="card-header-right">
                          <ul class="list-unstyled card-option" style="width: 35px;">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-body">
                        @if(trim($files->format) === 'jpg')
                          <div class="col-xl-11">
                            <p class="p-justify">{{ $files->catatan }}</p>
                            <a href="{{ $files->file_path }}" itemprop="contentUrl">
                              <img class="img-thumbnail" src="{{ $files->file_path }}" itemprop="thumbnail" alt="Image description">
                            </a>
                          </div>
                        @elseif(trim($files->format) === 'zip (shapefile)')
                          <div class="col-xl-11">
                            <p class="p-justify">{{ $files->catatan }}</p>
                            <div id="dokast-{{ $files->id }}" class="map-dokast img-thumbnail"></div>
                          </div>
                        @else
                          <div class="row">
                            <div class="col-xl-6">
                              <a href="{{ $files->file_path }}" type="button" class="btn btn-danger btn-xs">
                                <i class="icofont icofont-eye-alt"></i>
                                Lihat Dokumen
                              </a>
                              <embed id="dokast-{{ $files->id }}" src="{{ $files->file_path }}" class="img-thumbnail pdf-embed" type="application/pdf">
                            </div>
                            <div class="col-xl-6">
                              <p class="p-justify">{{ $files->catatan }}</p>
                            </div>
                          </div>
                        @endif
                        @if($user->hasAnyRole(['user_big', 'admin']))
                        <div class="card" style="margin-bottom:0px;">
                          <div class="card-body" style="padding-bottom:0px;">
                            <form action="{{ route('verify_status_asistensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id_file" value="{{$files->id}}">
                              <input type="hidden" name="idForm" value="{{$formAsistensi->id}}">
                              <div class="row">
                                <div class="form-group" style="margin-right:15px;">
                                  @if($files->getStatusAndCatatan() != null)
                                  <select class="form-control digits" name="status_file" id="status_file">
                                    <option {{ $files->getStatusAndCatatan()->status == true ? 'selected' : '' }} value="sudah_sesuai">Sudah Sesuai</option>
                                    <option {{ $files->getStatusAndCatatan()->status == false ? 'selected' : '' }} value="belum_sesuai">Belum Sesuai</option>
                                  </select>
                                  @else
                                  <select class="form-control digits" name="status_file" id="status_file">
                                    <option value="sudah_sesuai">Sudah Sesuai</option>
                                    <option selected value="belum_sesuai">Belum Sesuai</option>
                                  </select>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                              <div class="row">
                                <button class="btn btn-default toogle-note" data-id="{{$files->id}}" type="button">
                                  <i class="icofont icofont-notepad"></i>
                                  Tulis Catatan
                                </button>
                                <div id="note-{{$files->id}}" style="display:none;">
                                  @if($files->getStatusAndCatatan() != null)
                                  <textarea name="note_file" class="summernote">{!! $files->getStatusAndCatatan()->catatan !!}</textarea>
                                  @else
                                  <textarea name="note_file" class="summernote"></textarea>
                                  @endif
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        @endif
                        @if($files->getStatusAndCatatan() != null)
                        <div class="default-according" id="accordion-{{$files->id}}">
                          <div class="card">
                            <div class="card-header" id="heading-{{$files->id}}">
                              <h5 class="mb-0">
                                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapse-{{$files->id}}" aria-expanded="true" aria-controls="collapse-{{$files->id}}">
                                  Catatan
                                </button>
                              </h5>
                            </div>
                            <div class="collapse" id="collapse-{{$files->id}}" aria-labelledby="heading-{{$files->id}}" data-parent="#accordion-{{$files->id}}">
                              <div class="card-body">
                                <div class="row">
                                  @if($files->getStatusAndCatatan()->status == true)
                                  <span class="h5 txt-success">Sudah Sesuai</span>
                                  @else
                                  <span class="h5 txt-danger">Belum Sesuai</span>
                                  @endif
                                  <a style="margin-left:10px" href="{{ route('pengajuan_asistensi', ['form_id' => $formAsistensi->id]) }}" class="btn btn-info btn-sm" role="button"><i class="fa fa-gear"></i> Sunting</a>
                                </div>
                                <p>{!! $files->getStatusAndCatatan()->catatan !!}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                    </div>
                    @endforeach

                    @if($user->hasAnyRole(["admin","user_big"]))
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('verify_asistensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                          @csrf
                          @if(!$formAsistensi->verified)
                            <input type="hidden" name="idForm" id="idForm" value="{{ $formAsistensi->id }}"/>
                            <input type="hidden" name="is_verifying" id="is_verifying" value="true"/>
                            <button type="submit" class="btn btn-square btn-success">
                              <i class="icofont icofont-tick-boxed"></i>
                              Verifikasi Pengajuan Ini
                            </button>
                          @else
                            <input type="hidden" name="idForm" id="idForm" value="{{ $formAsistensi->id }}"/>
                            <input type="hidden" name="is_verifying" id="is_verifying" value="false"/>
                            <button class="btn btn-square btn-warning">
                              Non-Aktifkan Pengajuan Ini
                            </button>
                          @endif
                        </form>
                      </div>
                    </div>
                    @endif
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
<!-- <script src="{{ asset('js/leaflet.shpfile.js') }}"></script> -->
<script src="{{ asset('js/endless/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('js/endless/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/endless/editor/summernote/summernote.js') }}"></script>
<script src="{{ asset('js/endless/editor/summernote/summernote.custom.js') }}"></script>
<script>
  @foreach($fileAsistensi as $files)
    @if(trim($files->format) === 'zip (shapefile)')

    var osmMapnik_{{ $files->id }} = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });

    var esri_WorldImagery_{{ $files->id }} = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    var baseMaps_{{ $files->id }} = {
      "OSM" : osmMapnik_{{ $files->id }},
      "Esri World Imagery": esri_WorldImagery_{{ $files->id }}
    };

    var dokastMap_{{ $files->id }} = L.map('dokast-{{$files->id}}').setView([-4.45, 119.80], 5);
    osmMapnik_{{ $files->id }}.addTo(dokastMap_{{ $files->id }});
    L.control.layers(baseMaps_{{ $files->id }}, []).addTo(dokastMap_{{ $files->id }});

    shp("{{$files->file_path}}").then(function(geojson){
         var jsonFeature_{{ $files->id }} = L.geoJson(geojson, {
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
         }).addTo(dokastMap_{{ $files->id }});
         dokastMap_{{ $files->id }}.fitBounds(jsonFeature_{{ $files->id }}.getBounds());
    });

    @endif
  @endforeach

  /* Open Surat Permohonan */
  $(".surat-permohonan").click(function(){
    var url = "{{ $suratAsistensi->file_path }}";
    window.open(url);
  });

  @if($user->hasAnyRole(['admin', 'user_big']))
  /* Toogle Catatan */
  $(".toogle-note").click(function(){
    var noteId = $(this).attr('data-id');
    $("#note-"+noteId).toggle(200);
  });
  @endif
</script>
@endpush
