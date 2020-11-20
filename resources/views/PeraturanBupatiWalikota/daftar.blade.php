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
                    <h3>Peraturan Bupati Walikota</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Peraturan Bupati Walikota</li>
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
                      <a href="{{ route('upload_peraturan') }}" class="btn btn-info" role="button"><i class="icofont icofont-notepad"></i>Unggah Peraturan</a>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Peraturan Bupati Walikota</h5>
                    <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <table id="tableDaftarPeraturan" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Desa</th>
                              <th>Tanggal diperbaharui</th>
                              <th>Dokumen</th>
                              <th>Data SHP</th>
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

  <div class="modal fade" id="deletePeraturanModal" tabindex="-1" role="dialog" aria-labelledby="deletePeraturanModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('delete_peraturan') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="peraturan_id" id="peraturan_id" value=""/>
                <p>Apakah anda yakin akan menghapus peraturan ini ?</p>
                <strong id="namaPeraturan"></strong>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="deletePeraturan">Hapus</button>
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
$('#tableDaftarPeraturan').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_peraturan') }}",
     columns: [
         { data: 'nama', name: 'nama' },
         { data: 'desa', name: 'desa' },
         { data: 'date', name: 'date' },
         { data: 'link_pdf', name: 'link_pdf' },
         { data: 'link_shp', name: 'link_shp' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-peraturan").click(function(){
         var peraturan_id = $(this).attr('peraturan-id');
         var namaPeraturan = $(this).attr('nama-peraturan');
         $(".modal-body #peraturan_id").val( peraturan_id );
         $(".modal-body #namaPeraturan").text( namaPeraturan );
       });
     }
 });
</script>
@endpush
