@extends('layouts.app')

@push('css')
<style>
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
                        @if(isset($idDokumen))
                        <h3>Sunting Dokumen Asistensi</h3>
                        @else
                        <h3>Buat Dokumen Asistensi</h3>
                        @endif
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                          <li class="breadcrumb-item"><a href="{{ route('dokumen_asistensi') }}">Daftar Dokumen Asistensi</a></li>
                          @if(isset($idDokumen))
                          <li class="breadcrumb-item active">Sunting Dokumen Asistensi</li>
                          @else
                          <li class="breadcrumb-item active">Buat Dokumen Asistensi</li>
                          @endif
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
                        <form action="{{ route('save_dokumen_asistensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="row">
                            <input type="hidden" name="idDokumen" id="idDokumen" value="{{ $idDokumen }}"/>
                            <div class="col">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                                <div class="col-sm-5">
                                  <input class="form-control" name="name" id="name" type="text" placeholder="Nama Pengajuan" value="{{ isset($detailDokumenAsistensi) ? $detailDokumenAsistensi->name : null}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="description" id="description" rows="8" cols="8">{{ isset($detailDokumenAsistensi) ? $detailDokumenAsistensi->description : null }}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Format</b></label>
                                <div class="col-sm-5">
                                    <select class="form-control digits"  name="format" id="format">
                                      <option value="pdf">PDF</option>
                                      <option value="jpg">JPG</option>
                                      <option value="zip (shapefile)">ZIP (Shapefile)</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Aktifkan</b></label>
                                <div class="col-sm-1">
                                  <div class="media-body text-right icon-state">
                                    <label class="switch">
                                      <input type="checkbox" {{ isset($detailDokumenAsistensi) && $detailDokumenAsistensi->status == true ? 'checked' : '' }} name="status" id="status">
                                      <span class="switch-state"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
</script>
@endpush
