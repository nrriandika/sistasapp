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
                    <h3>Asistensi Batas Desa</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Asistensi Batas Desa</li>
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
                      <a href="{{ route('permohonan_asistensi') }}" class="btn btn-info" role="button"><i class="icofont icofont-notepad"></i> Pengajuan Asistensi</a>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Pengajuan Asistensi</h5>
                    <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <table id="tableDaftarAsistensi" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>Pengguna</th>
                              <th>Verifikator</th>
                              <th>Nama Form Pengajuan</th>
                              <th>Tanggal Diperbaharui</th>
                              <th>Status Pengajuan</th>
                              <th>Status Data</th>
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

  <div class="modal fade" id="deleteAsistensiModal" tabindex="-1" role="dialog" aria-labelledby="deleteAsistensiModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('delete_form_asistensi') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="formId" id="formId" value=""/>
                <p>Apakah anda yakin akan menghapus jenis data ini ?</p>
                <strong id="namaAsistensi"></strong>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="deleteAsistensi">Hapus</button>
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
$('#tableDaftarAsistensi').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_formasistensi') }}",
     order: [[ 0, "desc" ]],
     columns: [
         { data: 'username', name: 'username' },
         { data: 'verifikator', name: 'verifikator' },
         { data: 'name', name: 'name' },
         { data: 'date', name: 'date' },
         { data: 'status', name: 'status' },
         { data: 'status_data', name: 'status_data' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-asistensi").click(function(){
         var formId = $(this).attr('asistensi-id');
         var namaAsistensi = $(this).attr('nama-asistensi');
         $(".modal-body #formId").val( formId );
         $(".modal-body #namaAsistensi").text( namaAsistensi );
       });
     }
 });
</script>
@endpush
