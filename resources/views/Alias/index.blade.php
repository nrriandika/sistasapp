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
                    <h3>Penamaan Kolom Tabel Spasial</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Alias</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-2">
                      <select id="DaftarLayerOptions" class="js-example-basic-single col-sm-12">
                        <option>Pilih Jenis Batas...</option>
                        @foreach($dataBatas as $key => $data)
                        <optgroup label="{{ $key }}">
                          @foreach($data as $value)
                          <option {{ $tableName == $value->nama_tabel_spasial ? "selected" : "" }} data-nama="{{ $value->nama_tabel_spasial }}">
                          {{$value->nama}}
                          </option>
                          @endforeach
                        </optgroup>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <form action="{{ route('save_alias') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="tablename" id="tablename" value="{{ $tableName }}"/>
                      <table class="table table-hover" id="tableAlias">
                        <thead>
                          <tr>
                            <th>Nama Kolom</th>
                            <th>Alias</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tableHeader as $header)
                            @if($header->column_name != 'wkb_geom')
                            <tr>
                              <td>
                                <span>
                                  {{ $header->column_name }}
                                </span>
                                <input type="hidden" name="fieldname[{{ $header->column_name }}]" id="fieldname" value="{{ $header->column_name }}"/>
                              </td>
                              <td>
                                <input class="form-control" name="alias[{{ $header->column_name }}]" id="alias" type="text" value="{{ isset($aliasFieldname[trim($header->column_name)]) ? $aliasFieldname[trim($header->column_name)]['alias'] : null }}">
                              </td>
                              <td>
                                <div class="media-body icon-state">
                                  <label class="switch">
                                    <input type="checkbox" class="checkbox"  {{ isset($aliasFieldname[trim($header->column_name)]) && $aliasFieldname[trim($header->column_name)]['status'] == true ? 'checked' : '' }} name="status[{{ $header->column_name }}]" id="status">
                                    <span class="switch-state"></span>
                                  </label>
                                </div>
                              </td>
                            </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
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
<script src="{{ asset('js/endless/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/endless/datatable/datatables/datatable.custom.js') }}"></script>
<script>
$('#DaftarLayerOptions').change(function(){
  var nama_tabel_spasial = $(this).find(':selected').attr('data-nama');
  var url = location.protocol + '//' + location.host + location.pathname;
  url += '?tbl_name=' + nama_tabel_spasial;
  window.location.href = url;
});
$('#tableAlias').DataTable({
  dom: '<"top"f>rt'
});
</script>
@endpush
