@extends('layouts.app')

@section('content')
    <!-- page-wrapper Start-->
    <div class="page-wrapper box-layout box-layout">
        @include('NavigationBar.index')
        <div class="page-body-wrapper">
            @include('MenuBar.index')
            @include('ControlBar.advance')
            <div class="page-body">











                        <div class="container-fluid">
                          <div class="page-header">
                            <div class="row">
                              <div class="col">
                                <div class="page-header-left">
                                  <h3>Manajemen Data</h3>
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item active">Manajemen Data</li>
                                  </ol>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Container-fluid starts-->
                        <div class="container-fluid">
                          <div class="edit-profile">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                    <h5>Periode Data ({{ $labelJenisData }})</h5>
                                  </div>
                                  <form id="formPeriodeBaru" class="form theme-form" method="post" action="{{ route('new_period_create') }}">
                                    @csrf
                                    <div class="card-body">
                                      <div class="row">
                                        <input type="hidden" name="shpPath" id="shpPath" value="{{ $shpPath }}"/>
                                        <input type="hidden" name="jenisDataId2" id="jenisDataId2" value="{{ $jenisDataId }}"/>
                                        <div class="col">
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                                            <div class="col-sm-5">
                                              <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama Periode">
                                            </div>
                                          </div>
                                          <div class="datetime-picker">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label"><b>Tanggal Terbit</b></label>
                                              <div class="col-xl-5 col-sm-7 col-lg-8">
                                                <div class="input-group date" id="dt-date" data-target-input="nearest">
                                                  <input class="form-control datetimepicker-input digits" name="tanggal_periode" id="tanggal_periode" type="text" data-target="#dt-date">
                                                  <div class="input-group-append" data-target="#dt-date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><b>Aktifkan</b></label>
                                            <div class="col-sm-1">
                                              <div class="media-body text-right icon-state">
                                                <label class="switch">
                                                  <input type="checkbox" checked="" name="active" id="active">
                                                  <span class="switch-state"></span>
                                                </label>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-0">
                                            <label class="col-sm-3 col-form-label"><b>Catatan</b></label>
                                            <div class="col-sm-8">
                                              <textarea class="form-control" name="catatan" id="catatan" rows="8" cols="8"></textarea>
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
                        </div>










            </div>
        </div>
    </div>

    @include('DataManagement.uploadshpmodal')
@endsection

@push('js')
<script>
$(document).ready(function(){

  $("#jenisDataBatasWilayahOptions").change(function(){
    var JenisDataId_value = $("#jenisDataBatasWilayahOptions option:selected").val();
    $("#updateData").attr("data-id", JenisDataId_value)
  }).trigger("change");

  $("#updateData").click(function(){
    var jenisDataId = $(this).attr('data-id');
    $(".modal-body #jenisDataId").val( jenisDataId );
  });
});
</script>
@endpush
