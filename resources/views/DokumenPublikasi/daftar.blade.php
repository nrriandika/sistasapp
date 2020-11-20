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
                    <h3>Dokumen Publikasi</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Dokumen Publikasi</li>
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
                      <a href="{{ route('upload_publikasi') }}" class="btn btn-info" role="button"><i class="icofont icofont-notepad"></i>Unggah Publikasi</a>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Dokumen Publikasi</h5>
                    <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <table id="tableDaftarPublikasi" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Tanggal diperbaharui</th>
                              <th>Dokumen</th>
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

  <div class="modal fade" id="deletePublikasiModal" tabindex="-1" role="dialog" aria-labelledby="deletePublikasiModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('delete_publikasi') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="publikasi_id" id="publikasi_id" value=""/>
                <p>Apakah anda yakin akan menghapus publikasi ini ?</p>
                <strong id="namaPublikasi"></strong>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="deletePublikasi">Hapus</button>
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
$('#tableDaftarPublikasi').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_publikasi') }}",
     order: [[ 0, "desc" ]],
     columns: [
         { data: 'nama', name: 'nama' },
         { data: 'date', name: 'date' },
         { data: 'link_pdf', name: 'link_pdf' },
         { data: 'status', name: 'status' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-publikasi").click(function(){
         var publikasi_id = $(this).attr('publikasi-id');
         var namaPublikasi = $(this).attr('nama-publikasi');
         $(".modal-body #publikasi_id").val( publikasi_id );
         $(".modal-body #namaPublikasi").text( namaPublikasi );
       });
     }
 });
</script>
@endpush
