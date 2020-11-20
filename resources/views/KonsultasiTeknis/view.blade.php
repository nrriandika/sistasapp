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
                    <p>Diajukan oleh : <b>{{ $user->getUsersById($konsultasiTeknis->submitter_id)->name }}</b></p>
                    <a href="{{ route('pengajuan_konsultasiteknis', ['konsultasi_id' => $konsultasiTeknis->id]) }}" type="button" class="btn btn-info btn-sm" data-original-title="" title="">
                      <i class="icofont icofont-edit-alt"></i> Sunting
                    </a>
                    @if($user->hasAnyRole(['admin', 'user_big']))
                    <a href="{{ route('unggah_dokumennotulensi', ['konsultasi_id' => $konsultasiTeknis->id]) }}" type="button" class="btn btn-danger btn-sm" data-original-title="" title="">
                      <i class="icofont icofont-file-document"></i></i> Unggah Dokumen Notulensi
                    </a>
                    @endif
                    <div class="card-header-right edit-konsultasiteknis">
                      @if($konsultasiTeknis->status)
                      <div style='padding: 10px;margin-bottom: 5px;' class="alert alert-success dark status-form" role="alert">
                        Disetujui
                      </div>
                      @else
                      <div style='padding: 10px;margin-bottom: 5px;' class="alert alert-warning dark" role="alert">
                        Belum Disetujui
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="konsultasiTeknisDetail">
                      <tr>
                        <th style="width: 20%;">Tanggal Konsultasi</th>
                        <th>:</th>
                        <td>
                          <div id="dateKonsultasi">{{ $konsultasiTeknis->tanggal }}
                            <span id="showForm" class="btn btn-primary btn-xs" onclick="showForm(this);"><i class="icofont icofont-edit-alt"></i></span>
                          </div>
                          <form id="dateKonsultasiEdit" style="display:none" action="{{ route('save_konsultasi_teknis') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" name="konsultasi_id" id="konsultasi_id" type="hidden" value="{{ isset($konsultasiTeknis->id) ? $konsultasiTeknis->id : null }}">
                            <input class="form-control" name="judul" id="judul" type="hidden" value="{{ isset($konsultasiTeknis->judul) ? $konsultasiTeknis->judul : null }}">
                            <div class="input-group">
                              <div class="datetime-picker edit-date">
                                <div class="input-group date" id="dt-konsultasi" data-target-input="nearest">
                                  <input class="form-control datetimepicker-input digits" name="tanggal" id="tanggal" type="text" data-target="#dt-konsultasi">
                                  <div class="input-group-append" data-target="#dt-konsultasi" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-xs btn-info edit-date">Simpan</button>
                              <span id="hideForm" class="btn btn-primary btn-xs edit-date" onclick="hideForm(this);">
                                <i class="icofont icofont-undo"></i>
                              </span>
                            </div>
                          </form>
                        </th>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>{{ $konsultasiTeknis->status ? "Disetujui" : "Belum Disetujui" }}</td>
                      </tr>
                      <tr>
                        <th>Verifikator</th>
                        <th>:</th>
                        <td>{{ isset($konsultasiTeknis->verifikator_id) ? $user->getUsersById($konsultasiTeknis->verifikator_id)->name : null }}</th>
                      </tr>
                      <tr>
                        <th><span>Pembimbing</span></th>
                        <th>:</th>
                        <td>
                          <ul class="disc-list">
                            @foreach($konsultasiTeknis->getAllSupervisors() as $supervisor)
                            <li>{{ $supervisor->nama }}</li>
                            @endforeach
                          </ul>
                         </th>
                      </tr>
                      <tr>
                        <th>Tautan Ruang Konsultasi</th>
                        <th>:</th>
                        <td>
                          @if(isset($konsultasiTeknis->room_url))
                          <a href="{{$konsultasiTeknis->room_url}}" target="_blank">{{$konsultasiTeknis->room_url}}</a>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Password</th>
                        <th>:</th>
                        <td>
                          @if(isset($konsultasiTeknis->room_password))
                          <span id="roomPassword" data-password="{{$konsultasiTeknis->room_password}}">******</span>
                          <span id="showhidePasswords" class="btn btn-primary btn-xs" onclick="handleClick(this);"><i class="icofont icofont-eye-alt"></i></span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <td>{!! $konsultasiTeknis->keterangan !!}</td>
                      </tr>
                      <tr>
                        <th>Dokumen Notulensi</th>
                        <th>:</th>
                        <td>
                          @if(isset($konsultasiTeknis->dokumen_notulensi))
                          <a href="{{ $konsultasiTeknis->dokumen_notulensi }}" target="_blank" type="button" class="btn btn-danger btn-xs float-left">
                            <i class="icofont icofont-eye-alt"></i>
                            Lihat Dokumen
                          </a>
                          <br>
                          @if($konsultasiTeknis->dokumen_notulensi_format == 'pdf')
                          <embed src="{{ $konsultasiTeknis->dokumen_notulensi }}" class="float-left" type="application/pdf" width="50%" height="350">
                          @elseif($konsultasiTeknis->dokumen_notulensi_format == 'jpg')
                          <img src="{{ $konsultasiTeknis->dokumen_notulensi }}" width="50%" height="350" class="img-thumbnail">
                          @endif
                          @endif
                        </td>
                      </tr>
                    </table>
                    @if($user->hasAnyRole(['admin', 'user_big']))
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                        <form action="{{ route('approve_konsultasi_teknis') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                          <input class="form-control" name="konsultasi_id" id="konsultasi_id" type="hidden" value="{{ $konsultasiTeknis->id }}">
                          <div class="mb-2">
                            <div class="form-label">Pembimbing</div>
                            <select required name="pembimbingOnlineMeeting[]" id="pembimbingOnlineMeeting" class="js-example-basic-multiple col-sm-12" multiple="multiple">
                              @foreach($pembimbingTeknis as $pembimbing)
                              <option value="{{ $pembimbing->id }}" {{ in_array($pembimbing->id, $konsultasiTeknis->getAllSupervisorsList()) ? 'selected' : ''}}>{{ $pembimbing->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Tautan Konsultasi Online</label>
                            <input required class="form-control" name="tautanOnlineMeeting" id="tautanOnlineMeeting" type="text" value="{{ isset($konsultasiTeknis->room_url) ? $konsultasiTeknis->room_url : '' }}">
                            <button class="btn btn-xs btn-primary btn-clipboard" type="button" data-clipboard-action="copy" data-clipboard-target="#tautanOnlineMeeting">
                              <i class="fa fa-copy"></i> Copy
                            </button>
                            <button class="btn btn-xs btn-secondary btn-clipboard-cut" type="button" data-clipboard-action="cut" data-clipboard-target="#tautanOnlineMeeting">
                              <i class="fa fa-cut"></i> Cut
                            </button>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Password</label>
                            <input class="form-control" name="passwordOnlineMeeting" id="passwordOnlineMeeting" type="password" value="{{ isset($konsultasiTeknis->room_password) ? $konsultasiTeknis->room_password : '' }}">
                          </div>
                          <button id="approve_konsultasi_teknis" type="submit" class="btn btn-success" disabled>
                            <i class="icofont icofont-ui-check"></i> Setujui
                          </button>
                        </form>
                      </div>
                      <div class="col-lg-6">
                        @if(isset($konsultasiTeknis->dokumen_asistensi))
                        <a href="{{ $konsultasiTeknis->dokumen_asistensi }}" type="button" class="btn btn-danger btn-xs">
                          <i class="icofont icofont-eye-alt"></i>
                          Lihat Dokumen
                        </a>
                        <embed src="{{ $konsultasiTeknis->dokumen_asistensi }}" class="img-thumbnail pdf-embed" type="application/pdf">
                        @endif
                      </div>
                    </div>
                    @endif
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
<script src="{{ asset('js/endless/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('js/endless/clipboard/clipboard-script.js') }}"></script>
<script>
$(document).ready(function(){
  $('#dt-konsultasi').datetimepicker({
      defaultDate: "{{ isset($konsultasiTeknis->tanggal) ? $konsultasiTeknis->tanggal : null }}",
      daysOfWeekDisabled: [0, 6]
  });
});
</script>
<script>
function isValidUrl(url){
 var myVariable = url;
    if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(myVariable)) {
      return 1;
    } else {
      return -1;
    }
}

$('#tautanOnlineMeeting').on('keyup', function(){
  if(isValidUrl($(this).val()) == 1){
      $('#approve_konsultasi_teknis').prop('disabled', false);
  } else {
      $('#approve_konsultasi_teknis').prop('disabled', true);
  };
});

function handleClick(cb) {
  var password = $('#roomPassword').data('password');
  if($('#roomPassword').text()== "******"){
    $('#roomPassword').text(password);
  } else {
    $('#roomPassword').text("******");
  }
}

function showForm() {
  $("#dateKonsultasi").hide();
  $("#dateKonsultasiEdit").show();
}

function hideForm() {
  $("#dateKonsultasi").show();
  $("#dateKonsultasiEdit").hide();
}


</script>
@endpush
