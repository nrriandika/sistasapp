@extends('layouts.app')

@push('css')
<!-- Calendar -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/calendar.css') }}">
<style>
#passwordOnlineMeeting {
  width: 50%;
}
#konsultasiTeknisDetail, th, td {
  padding:7px;
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
                    <h3>Jadwal Konsultasi Teknis</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Jadwal Konsultasi Teknis</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="calendar-wrap">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="cal-basic"></div>
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

@endsection

@push('js')
<script src="{{ asset('js/endless/calendar/moment.min.js') }}"></script>
<script src="{{ asset('js/endless/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/endless/calendar/fullcalendar-custom.js') }}"></script>
<script src="{{ asset('js/endless/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('js/endless/clipboard/clipboard-script.js') }}"></script>
<script>

</script>
@endpush
