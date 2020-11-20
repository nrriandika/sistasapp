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
                    <h3>Pengajuan Konsultasi Teknis</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Pengajuan Konsultasi Teknis</li>
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
                      <form action="{{ route('save_konsultasi_teknis') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <input class="form-control" name="konsultasi_id" id="konsultasi_id" type="hidden" value="{{ isset($konsultasiTeknis->id) ? $konsultasiTeknis->id : null }}">
                          <label class="col-sm-3 col-form-label"><b>Judul</b></label>
                          <div class="col-sm-5">
                            <input class="form-control" name="judul" id="judul" type="text" placeholder="Judul Konsultasi" value="{{ isset($konsultasiTeknis->judul) ? $konsultasiTeknis->judul : null }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>Keterangan</b></label>
                          <div class="col-sm-8">
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="8" cols="8">{!! isset($konsultasiTeknis->keterangan) ? $konsultasiTeknis->keterangan : null !!}</textarea>
                          </div>
                        </div>
                        <div class="datetime-picker">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><b>Tanggal Konsultasi</b></label>
                            <div class="col-xl-5 col-sm-7 col-lg-8">
                              <div class="input-group date" id="dt-konsultasi" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" name="tanggal" id="tanggal" type="text" data-target="#dt-konsultasi">
                                <div class="input-group-append" data-target="#dt-konsultasi" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="calendar-wrap">
                  <div class="card">
                    <div class="card-header">
                      <h5>Jadwal Internal</h5>
                      <div class="card-header-right">
                        <ul class="list-unstyled card-option" style="width: 35px;">
                          <li><i class="icofont icofont-simple-left"></i></li>
                          <li><i class="icofont icofont-maximize full-card"></i></li>
                          <li><i class="icofont icofont-minus minimize-card"></i></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div id="cal-basic-view"></div>
                        </div>
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
