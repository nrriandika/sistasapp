@extends('layouts.app')

@push('css')
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
                    <h3>Permohonan Asistensi</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Permohonan Asistensi</li>
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
                  <div class="card-body">
                    <div class="col-lg-10">
                      <form action="{{ route('upload_permohonan_asistensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                          <label class="form-label">Unggah surat permohonan asistensi</label>
                          <input accept=".pdf" class="form-control" name="surat_permohonan" id="surat_permohonan" type="file" onchange="readUploadedPdf(this);">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Jenis Pengajuan</label>
                          <select class="form-control digits"  name="jenis_pengajuan" id="jenis_pengajuan">
                            @foreach($jenisPengajuan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <button id="surat_permohonan_upload" type="submit" class="btn btn-success" disabled>
                          <i class="icofont icofont-upload-alt"></i> Unggah Surat Permohonan
                        </button>
                        <br>
                        <embed id="surat_permohonan_embed" src="" class="img-thumbnail pdf-embed" type="application/pdf">
                      </form>
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
function readUploadedPdf(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#surat_permohonan_embed')
            .text(e.target)
            .attr('src', e.target.result)
            .width('100%')
            .height(750);
        $('#surat_permohonan_upload').prop('disabled', false);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
