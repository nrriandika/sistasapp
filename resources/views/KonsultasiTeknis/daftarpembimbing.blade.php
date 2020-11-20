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
                    <h3>Pembimbing Konsultasi Teknis</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item active">Pembimbing Konsultasi Teknis</li>
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
                      <a href="{{ route('form_pembimbing') }}" class="btn btn-info" role="button">
                        <i class="icofont icofont-man-in-glasses"></i>
                        Buat Pembimbing Baru
                      </a>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Pembimbing Konsultasi Teknis</h5>
                    <span>Using the <a href="#" data-original-title="" title="">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <table id="tableDaftarKonsultasiTeknis" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Posisi</th>
                              <th>Instansi</th>
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

  <div class="modal fade" id="deletePembimbingModal" tabindex="-1" role="dialog" aria-labelledby="deletePembimbingModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('delete_pembimbing_teknis') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="card service-card">
              <div class="card-body">
                <input type="hidden" name="pembimbingId" id="pembimbingId" value=""/>
                <p>Apakah anda yakin akan menghapus pembimbing ini ?</p>
                <strong id="namaPembimbing"></strong>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="deletePembimbing">Hapus</button>
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
     ajax: "{{ route('data_pembimbingteknis') }}",
     columns: [
         { data: 'nama', name: 'nama' },
         { data: 'posisi', name: 'posisi' },
         { data: 'instansi', name: 'instansi' },
         { data: 'action', name: 'action' }
     ],
     initComplete : function(settings, json) {
       $(".delete-pembimbing").click(function(){
         var pembimbingId = $(this).attr('pembimbing-id');
         var namaPembimbing = $(this).attr('nama-pembimbing');
         $(".modal-body #pembimbingId").val( pembimbingId );
         $(".modal-body #namaPembimbing").text( namaPembimbing );
       });
     }
 });
</script>
@endpush
