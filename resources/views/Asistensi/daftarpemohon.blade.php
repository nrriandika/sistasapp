@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/endless/datatables.css') }}">
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
                    <h3>Daftar Pemohon Asistensi</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Daftar Pemohon Asistensi</li>
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
                    <div class="row">
                      <table id="tableDaftarPemohon" class="display" style="width:100%">
                      <thead>
                          <tr>
                              <th>Pengguna</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                  </table>
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

  <div class="modal fade" id="approveRequestAsistensiModal" tabindex="-1" role="dialog" aria-labelledby="deleteAsistensiModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('approve_request_asistensi') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="requestId" id="requestId" value=""/>
                <p id="requestContent"></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btn-approve-request"></button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script src="{{ asset('js/endless/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/endless/datatable/datatables/datatable.custom.js') }}"></script>
<script>
$('#tableDaftarPemohon').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_pemohonasistensi') }}",
     order: [[ 0, "desc" ]],
     columns: [
         { data: 'username', name: 'username' },
         { data: 'date', name: 'date' },
         { data: 'status', name: 'status' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".request-asistensi").click(function(){
         var requestId = $(this).attr('request-id');
         var namaPengguna = $(this).attr('nama-pengguna');
         $(".modal-body #requestId").val( requestId );
         $("#btn-approve-request").removeClass();
         $("#btn-approve-request").addClass("btn btn-success");
         $("#btn-approve-request").text("Setujui");
         var content = "Setujui Permohonan Fitur Asistensi yang diajukan oleh " + namaPengguna.bold() + " ?";
         $(".modal-body #requestContent").html( content );
       });
       $(".unrequest-asistensi").click(function(){
         var requestId = $(this).attr('request-id');
         var namaPengguna = $(this).attr('nama-pengguna');
         $(".modal-body #requestId").val( requestId );
         $("#btn-approve-request").removeClass();
         $("#btn-approve-request").addClass("btn btn-warning");
         $("#btn-approve-request").text("Tidak Setujui");
         var content = "Tidak Setujui Permohonan Fitur Asistensi yang diajukan oleh " + namaPengguna.bold() + " ?";
         $(".modal-body #requestContent").html( content );
       });
     }
 });
</script>
@endpush
