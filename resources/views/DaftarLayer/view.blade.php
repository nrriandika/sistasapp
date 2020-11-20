@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/datatables.css') }}">
<style>
.large-table-container-3 {
  max-width: 100%;
  overflow-x: scroll;
  overflow-y: auto;
}
.large-table-fake-top-scroll-container-3 {
  max-width: 100%;
  overflow-x: scroll;
  overflow-y: auto;
}
.large-table-fake-top-scroll-container-3 div {
  font-size:1px;
  line-height:1px;
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



            <div class="container-fluid">
              <div class="page-header">
                <div class="row">
                  <div class="col">
                    <div class="page-header-left">
                      <h3>Daftar Layer</h3>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Daftar Layer</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
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
                        <div class="col-lg-4">
                          <div class="mb-2">
                            <select id="DaftarLayerOptions" class="js-example-basic-single col-sm-12">
                              <option>Pilih Jenis Batas...</option>
                              @foreach($dataBatas as $key => $data)
                              <optgroup label="{{ $key }}">
                                @foreach($data as $value)
                                <option data-nama="{{ $value->nama_tabel_spasial }}">
                                {{$value->nama}}
                                </option>
                                @endforeach
                              </optgroup>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <!-- download button starts -->
                        <div class="btn-group btn-group-sm col-sm-2">
                            <a href="{{$wfs_url .$SHP}}"><button class="btn btn-danger btn-sm ml-1 px-3" download>Download SHP</button></a>
                            <a href="{{$wfs_url .$KML}}"><button class="btn btn-primary btn-sm ml-2 px-3" download>Download KML</button></a>
                            <a href="{{$wfs_url .$CSV}}"><button class="btn btn-success btn-sm ml-2 px-3" download>Download CSV</button></a>
                            <a href="{{$wfs_url .$GeoJSON}}"><button class="btn btn-warning btn-sm ml-2 px-3" download>Download GeoJSON</button></a>
                        </div>

                      </div>
                    </div>
                  </div>


                  <div class="card" >
                    <div class="card-header">
                      <h5>Tabel Data {{$tableTitle}}</h5>
                      <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                          <li><i class="icofont icofont-simple-left icofont-simple-right"></i></li>
                          <li><i class="icofont icofont-maximize full-card"></i></li>
                          <li><i class="icofont icofont-minus minimize-card"></i></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body" >
                      <div class="row"  >
                        <!-- table starts-->
                        <div class="large-table-fake-top-scroll-container-3">
                          <div>&nbsp;</div>
                        </div>
                        <div class="large-table-container-3">
                          <table id="tableDaftarLayer" class="display" style="width:100%">
                            <thead >
                              <tr>
                                @foreach($tableHeader as $header)
                                  @if($header->column_name != 'wkb_geom')
                                    <th>
                                      {{ GlobalHelper::getAlias($tableName, $header->column_name) }}
                                    </th>
                                  @endif
                                @endforeach
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>





            </div>
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

function GetUrlParameter(sParam){
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++){
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam){
            return sParameterName[1];
        }
    }
}

var tbl_name = GetUrlParameter('tbl_name');
if(tbl_name){
  var ajax_url = "{{ route('daftar_layer') }}?tbl_name="+tbl_name;
} else {
  var ajax_url = "{{ route('daftar_layer') }}";
}

$('#tableDaftarLayer').DataTable({
     processing: true,
     serverSide: true,
     lengthMenu: [[25, 100, 250, 500, -1], [25, 100, 250, 500, "All"]],
     ajax: ajax_url,
     columns: [
         @foreach($tableHeader as $header)
          @if($header->column_name != 'wkb_geom')
          { data: '{{$header->column_name}}', name: '{{$header->column_name}}' },
          @endif
         @endforeach
     ]
 });

 $(function() {
   var tableContainer = $(".large-table-container-3");
   var table = $(".large-table-container-3 table");
   var fakeContainer = $(".large-table-fake-top-scroll-container-3");
   var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");

   var tableWidth = table.width();
   fakeDiv.width(tableWidth);

   fakeContainer.scroll(function() {
     tableContainer.scrollLeft(fakeContainer.scrollLeft());
   });
 })
</script>
@endpush
