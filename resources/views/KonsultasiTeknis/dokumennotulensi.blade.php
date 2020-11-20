@extends('layouts.app')

@push('css')
<!-- Calendar -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/calendar.css') }}">
<style>
.card .card-header .edit-konsultasiteknis i {
    margin: 0px;
    color: #ffffff;
    line-height: 20px;
}
#passwordOnlineMeeting {
  width: 50%;
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
                    <h3>Detail Konsultasi Teknis</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('daftar_konsultasiteknis') }}">Daftar Konsultasi Teknis</a></li>
                      <li class="breadcrumb-item active">Detail Konsultasi Teknis</li>
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
                    <h5>{{ $konsultasiTeknis->judul }}</h5>
                    <span>Diajukan oleh : {{ $user->getUsersById($konsultasiTeknis->submitter_id)->name }}</span>
                    <span>{{ $konsultasiTeknis->keterangan }}</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <form action="{{ route('save_dokumen_notulensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                          @csrf
                          <input class="form-control" name="konsultasi_id" id="konsultasi_id" type="hidden" value="{{ $konsultasiTeknis->id }}">
                          <div class="form-group">
                            <label class="form-label">Unggah Dokumen Notulensi</label>
                            <input accept=".pdf,.doc,.docx,.jpg" class="form-control" name="dokumen_notulensi" id="dokumen_notulensi" type="file" onchange="readUploadedDoc(this);">
                          </div>
                          <button id="dokumen_notulensi_upload" type="submit" class="btn btn-success" disabled>
                            <i class="icofont icofont-upload-alt"></i> Unggah
                          </button>
                          <br>
                          <embed id="dokumen_notulensi_embed" src="" class="img-thumbnail" type="application/pdf">
                          <img id="dokumen_notulensi_img" src="" style="display:none;" class="img-thumbnail">
                        </form>
                      </div>
                    </div>
                  </div>
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
<script>
function readUploadedDoc(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader(),
        extension = input.files[0].name.split('.').pop().toLowerCase();
    if(extension == 'pdf'){
      reader.onload = function (e) {
          $('#dokumen_notulensi_embed').css('display','block');
          $('#dokumen_notulensi_img').css('display','none');
          $('#dokumen_notulensi_embed')
              .text(e.target)
              .attr('src', e.target.result)
              .width('100%')
              .height(750);
          $('#dokumen_notulensi_upload').prop('disabled', false);
      };
      reader.readAsDataURL(input.files[0]);
    } else if(extension == 'doc' || extension == 'docx'){
      reader.onload = function (e) {
          $('#dokumen_notulensi_embed').css('display','none');
          $('#dokumen_notulensi_img').css('display','block');
          $('#dokumen_notulensi_img')
              .text(e.target)
              .attr('src', "{{ asset('images/endless/defaultdoc.png') }}")
              .width('100%');
          $('#dokumen_notulensi_upload').prop('disabled', false);
      }
      reader.readAsDataURL(input.files[0]);
    } else if(extension == 'jpg'){
      reader.onload = function (e) {
          $('#dokumen_notulensi_embed').css('display','none');
          $('#dokumen_notulensi_img').css('display','block');
          $('#dokumen_notulensi_img')
              .text(e.target)
              .attr('src', e.target.result)
              .width('100%');
          $('#dokumen_notulensi_upload').prop('disabled', false);
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      $('#dokumen_notulensi_upload').prop('disabled', true);
    };
  }
}

</script>
@endpush
