@extends('layouts.app')

@push('css')
<style>
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
                <h3>Daftar Pengguna</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Daftar Pengguna</li>
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
                    <table id="tableDaftarAsistensi" class="display" style="width:100%">
                        <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Tanggal Dibuat</th>
                              <th>Tanggal Diperbaharui</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userAll as $userItem)
                            <tr>
                              <td>{{ $userItem->name }}</td>
                              <td>{{ $userItem->email }}</td>
                              <td>{{ $userItem->created_at }}</td>
                              <td>{{ $userItem->updated_at }}</td>
                              <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>

                </div>
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
<script>
</script>
@endpush
