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
                    <h3>Unggah Publikasi</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Unggah Publikasi</li>
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
                  <form action="{{ route('save_publikasi') }}" class="form theme-form ml-3 " method="post" enctype="multipart/form-data">
                    <input class="form-control" name="publikasi_id" id="publikasi_id" type="hidden" value="{{ isset($dokumenPublikasi->id) ? $dokumenPublikasi->id : null}}">
                    <div class="card-body">
                      <div class="col-lg-12">
                          @csrf
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                            <div class="col-sm-5">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Nama Publikasi" value="{{ isset($dokumenPublikasi->nama) ? $dokumenPublikasi->nama : null}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Keterangan</b></label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="keterangan" id="keterangan" rows="8" cols="8">{{ isset($dokumenPublikasi->keterangan) ? $dokumenPublikasi->keterangan : null }}</textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Aktif</b></label>
                            <div class="col-sm-1">
                              <div class="media-body text-right icon-state">
                                <label class="switch">
                                  <input type="checkbox" {{ isset($dokumenPublikasi->active) ? $dokumenPublikasi->active == true ? 'checked' : '' : 'checked' }} name="active" id="active">
                                  <span class="switch-state"></span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Unggah Dokumen Publikasi</b></label>
                            <div class="col-sm-9">
                              <input accept=".pdf" class="form-control" name="dokumen_publikasi" id="dokumen_publikasi" type="file" onchange="readUploadedPdf(this);">
                              <embed id="dokumen_publikasi_embed" src="{{ isset($dokumenPublikasi->path_dokumen) ? $dokumenPublikasi->path_dokumen : ''}}" class="img-thumbnail pdf-embed" style="{{ isset($dokumenPublikasi->path_dokumen) ? '' : 'display:none'}}" type="application/pdf">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-sm-9">
                        <button id="dokumen_publikasi_upload" type="submit" class="btn btn-success" {{ isset($dokumenPublikasi->path_dokumen) ? '' : 'disabled'}}>
                          <i class="icofont icofont-upload-alt"></i> Unggah Publikasi
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
<script>
function readUploadedPdf(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#dokumen_publikasi_embed').show();
        $('#dokumen_publikasi_embed')
            .text(e.target)
            .attr('src', e.target.result)
            .width('80%')
            .height(500);
        $('#dokumen_publikasi_upload').prop('disabled', false);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
