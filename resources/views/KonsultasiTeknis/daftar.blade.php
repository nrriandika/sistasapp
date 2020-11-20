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
                    <h3>Konsultasi Teknis</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Konsultasi Teknis</li>
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
                      <a href="{{ route('pengajuan_konsultasiteknis') }}" class="btn btn-info" role="button"><i class="icofont icofont-notepad"></i> Pengajuan Konsultasi Teknis</a>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Pengajuan Konsultasi Teknis</h5>
                    <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <table id="tableDaftarKonsultasiTeknis" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>Pengguna</th>
                              <th>Judul</th>
                              <th>Tanggal Konsultasi</th>
                              <th>Status</th>
                              <th>Verifikator</th>
                              <th>Pembimbing</th>
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

  <div class="modal fade" id="deleteKonsultasiModal" tabindex="-1" role="dialog" aria-labelledby="deleteKonsultasiModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('delete_konsultasi_teknis') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="konsultasiId" id="konsultasiId" value=""/>
                <p>Apakah anda yakin akan menghapus pengajuan konsultasi teknis ini ?</p>
                <strong id="namaKonsultasi"></strong>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="deleteKonsultasi">Hapus</button>
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
$('#tableDaftarKonsultasiTeknis').DataTable({
     processing: true,
     serverSide: true,
     ajax: "{{ route('data_konsultasiteknis') }}",
     order: [[ 0, "desc" ]],
     columns: [
         { data: 'username', name: 'username' },
         { data: 'judul', name: 'judul' },
         { data: 'tanggal', name: 'tanggal' },
         { data: 'status', name: 'status' },
         { data: 'verifikator', name: 'verifikator' },
         { data: 'pembimbing', name: 'pembimbing' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-konsultasi").click(function(){
         var konsultasiId = $(this).attr('konsultasi-id');
         var namaKonsultasi = $(this).attr('nama-konsultasi');
         $(".modal-body #konsultasiId").val( konsultasiId );
         $(".modal-body #namaKonsultasi").text( namaKonsultasi );
       });
     }
 });
</script>
@endpush
