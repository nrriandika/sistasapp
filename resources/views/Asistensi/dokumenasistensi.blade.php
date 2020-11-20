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
                      <h3>Daftar Dokumen Asistensi</h3>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Daftar Dokumen Asistensi</li>
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
                        <a href="{{ route('detildokumen_asistensi') }}" class="btn btn-info" role="button"><i class="icofont icofont-ui-add"></i> Buat Jenis Dokumen Baru</a>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h5>Daftar Dokumen</h5>
                      <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <table id="tableDokumenAsistensi" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Format</th>
                                <th>Status</th>
                                <th>Tanggal Diperbaharui</th>
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

    <div class="modal fade" id="deleteDokumenModal" tabindex="-1" role="dialog" aria-labelledby="deleteDokumenModalCenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="{{ route('delete_dokumen_asistensi') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="card service-card">
                <div class="card-body">
                  <input type="hidden" name="dokumenId" id="dokumenId" value=""/>
                  <p>Apakah anda yakin akan menghapus jenis data ini ?</p>
                  <strong id="namaDokumen"></strong>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" id="deleteDokumen">Hapus</button>
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
$('#tableDokumenAsistensi').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_dokumenasistensi') }}",
     columns: [
         { data: 'name', name: 'name' },
         { data: 'format', name: 'format' },
         { data: 'status', name: 'status' },
         { data: 'date', name: 'date' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-dokumen").click(function(){
         var dokumenId = $(this).attr('dokumen-id');
         var namaDokumen = $(this).attr('nama-dokumen');
         $(".modal-body #dokumenId").val( dokumenId );
          $(".modal-body #namaDokumen").text( namaDokumen );
       });
     }
 });


</script>
@endpush
