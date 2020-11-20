@extends('layouts.app')

@push('css')
<!-- Calendar -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/calendar.css') }}">
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
                    <h3>Form Data Pembimbing Baru</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('daftar_pembimbing') }}">Daftar Pembimbing Teknis</a></li>
                      <li class="breadcrumb-item active">Form Data Pembimbing Baru</li>
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
                      <form action="{{ route('save_form_pembimbing') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <input class="form-control" name="pembimbing_id" id="pembimbing_id" type="hidden" value="{{ isset($pembimbingTeknis->id) ? $pembimbingTeknis->id : null }}">
                          <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                          <div class="col-sm-5">
                            <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama Pembimbing" value="{{ isset($pembimbingTeknis->nama) ? $pembimbingTeknis->nama : null }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>Posisi</b></label>
                          <div class="col-sm-5">
                            <input class="form-control" name="posisi" id="posisi" type="text" placeholder="Posisi" value="{{ isset($pembimbingTeknis->posisi) ? $pembimbingTeknis->posisi : null }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>Instansi</b></label>
                          <div class="col-sm-5">
                            <input class="form-control" name="instansi" id="instansi" type="text" placeholder="Instansi" value="{{ isset($pembimbingTeknis->instansi) ? $pembimbingTeknis->instansi : null }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>Keterangan</b></label>
                          <div class="col-sm-8">
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="8" cols="8">{!! isset($pembimbingTeknis->keterangan) ? $pembimbingTeknis->keterangan : null !!}</textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
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
<script src="{{ asset('js/endless/calendar/moment.min.js') }}"></script>
<script src="{{ asset('js/endless/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/endless/calendar/fullcalendar-custom.js') }}"></script>
<script>
$(document).ready(function(){
  $('#dt-konsultasi').datetimepicker({
      defaultDate: "{{ isset($konsultasiTeknis->tanggal) ? $konsultasiTeknis->tanggal : null }}",
      daysOfWeekDisabled: [0, 6]
  });
});
</script>
@endpush
