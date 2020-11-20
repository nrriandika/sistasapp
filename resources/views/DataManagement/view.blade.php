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
                              @if($errors->any())
                                  <div class="alert alert-danger dark" role="alert">
                                    {{ implode('', $errors->all(':message')) }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title="">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                              @endif
                              <div class="card">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-2">
                                        <select id="jenisDataBatasWilayahOptions" class="js-example-basic-single col-sm-12">
                                          @foreach($dataBatas as $key => $data)
                                          <optgroup label="{{ $key }}">
                                            @foreach($data as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                            @endforeach
                                          </optgroup>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <button id="updateData" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-id="" data-target="#uploadSHPModal" title="">Perbaharui Data</button>
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
