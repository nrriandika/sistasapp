@push('css')
<style>
.page-wrapper .page-body-wrapper .page-sidebar .main-header-left {
    padding: 5px;
    padding-top: 10px;
}
.page-wrapper .page-body-wrapper .page-sidebar {
    width: 265px;
}
.box-layout.page-wrapper .page-body-wrapper.sidebar-hover .page-sidebar:hover {
    width: 265px;
}
.logo-big {
    width:150px;
    height:50px;
}
.title-text {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 9px;
    position: absolute;
    top: 25px;
    left: 70px;
    text-shadow: 0px 0px 7px #FFFFFF;
    color: #ffffff;
}
.big-text {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 11px;
    position: absolute;
    top: 40px;
    left: 70px;
    text-shadow: 0px 0px 7px #FFFFFF;
    color: #ffffff;
}
.profile-edit {
    position: relative;
    top: 75px;
}
</style>
@endpush

@if (Route::has('login'))
<div class="page-sidebar">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper">
      <a href="{{ route('map') }}">
        <img src="{{ asset('images/endless/main-logo.png') }}" alt="" class="logo-big">
        <span class="title-text">
          Sistem Informasi Batas Wilayah
        </span>
        <span class="big-text">
          Badan Informasi Geospasial
        </span>
        <!-- <span class="pull-right" style="position:absolute;top:1;">
          Badan Informasi Geospasial
        </span> -->
      </a>


    </div>
  </div>
  <div class="sidebar custom-scrollbar">
    @auth
    <div class="sidebar-user text-center">
      <div><img class="img-60 rounded-circle" src="{{ isset($user->getProfile()->avatar_path) ?  $user->getProfile()->avatar_path : asset('images/endless/user/1.jpg') }}">
        <div class="profile-edit"><a href="{{ route('edit_profile') }}"><i data-feather="edit"></i></a></div>
      </div>
      <h6 class="mt-3 f-14">{{ $user->name }}</h6>
      <p>{{ isset($user->getProfile()->instansi) ? $user->getProfile()->instansi : null }}</p>
      <p>{{ isset($user->getProfile()->jabatan) ? $user->getProfile()->jabatan : null }}</p>
    </div>
    @endauth
    <ul class="sidebar-menu">
      <li><a class="sidebar-header" href="{{ route('map') }}"><i data-feather="map"></i><span>Peta Utama</span></a></li>

      @if(Auth::check())
      @if($user->hasAnyRole(["admin","user_big" ]))
      <li><a class="sidebar-header" href="{{ route('data_management') }}"><i data-feather="database"></i><span>Manajemen Data</span></a></li>
      @endif

      <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Dashboard</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('main_dashboard') }}"><i class="fa fa-circle"></i><span>Statistik Batas Wilayah</span></a></li>
          <li><a href="dashboard-ecommerce.html"><i class="fa fa-circle"></i><span>Statistik Pengguna</span></a></li>
          <li><a href="dashboard-university.html"><i class="fa fa-circle"></i><span>Cetak Statistik Data</span></a></li>
          <li><a href="{{ route('map') }}"><i class="fa fa-circle"></i><span>WebGIS Batas Wilayah</span></a></li>
        </ul>
      </li>

      @if($user->hasAnyRole(["user_big", "admin"]))
      <li><a class="sidebar-header" href="{{ route('data_layer') }}"><i data-feather="database"></i><span>Daftar Layer</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="file"></i><span>Publikasi</span><i class="fa fa-angle-right pull-right"></i></a>
      <ul class="sidebar-submenu">
          <li><a href="{{ route('daftar_publikasi') }}"><i class="fa fa-circle"></i><span>Daftar Publikasi</span></a></li>
          <li><a href="{{ route('upload_publikasi') }}"><i class="fa fa-circle"></i><span>Tambah Dokumen</span></a></li>
      </ul>
      @endif


      @if($user->hasAnyRole(["user_kemenkeu", "user_big", "admin"]))
      <li><a class="sidebar-header" href="{{ route('data_lpl') }}"><i data-feather="database"></i><span>Wilayah Pengelolaan Laut</span></a></li>
      @endif

      @if($user->hasAnyRole(["user_kemenkeu", "user_big", "admin"]))
      <li><a class="sidebar-header" href="{{ route('alias') }}"><i data-feather="database"></i><span>Penamaan Kolom Spasial</span></a></li>
      @endif

      <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Profil Pengguna</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('user_profile') }}"><i class="fa fa-circle"></i><span>Informasi Detail</span></a></li>
          <li><a href="{{ route('edit_profile') }}"><i class="fa fa-circle"></i><span>Ubah Data Profil</span></a></li>
        </ul>
      </li>

      <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Daftar Pengguna</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('user_list') }}"><i class="fa fa-circle"></i><span>List Pengguna</span></a></li>
          <li><a href="dashboard-ecommerce.html"><i class="fa fa-circle"></i><span>Edit Pengguna</span></a></li>
        </ul>
      </li>

      <li><a class="sidebar-header" href="#"><i data-feather="file"></i><span>Asistensi Batas Desa</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('daftar_asistensi') }}"><i class="fa fa-circle"></i><span>Daftar Asistensi</span></a></li>
          <li><a href="{{ route('permohonan_asistensi') }}"><i class="fa fa-circle"></i><span>Pengajuan Asistensi</span></a></li>
            @if($user->hasAnyRole(["admin","user_big"]))
            <li><a href="{{ route('dokumen_asistensi') }}"><i class="fa fa-circle"></i><span>Dokumen Asistensi</span></a></li>
            @endif
        </ul>
      </li>

      <li><a class="sidebar-header" href="#"><i data-feather="file"></i><span>Peraturan Daerah</span><i class="fa fa-angle-right pull-right"></i></a>
      <ul class="sidebar-submenu">
          <li><a href="{{ route('daftar_peraturan') }}"><i class="fa fa-circle"></i><span>Daftar Peraturan</span></a></li>
          <li><a href="{{ route('upload_peraturan') }}"><i class="fa fa-circle"></i><span>Unggah Peraturan</span></a></li>
      </ul>

      <li><a class="sidebar-header" href="#"><i data-feather="monitor"></i><span>Konsultasi Teknis</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('daftar_konsultasiteknis') }}"><i class="fa fa-circle"></i><span>Daftar Konsultasi Teknis</span></a></li>
          <li><a href="{{ route('pengajuan_konsultasiteknis') }}"><i class="fa fa-circle"></i><span>Pengajuan Konsultasi</span></a></li>
            @if($user->hasAnyRole(["admin","user_big"]))
            <li><a href="{{ route('daftar_pembimbing') }}"><i class="fa fa-circle"></i><span>Daftar Pembimbing</span></a></li>
            <li><a href="{{ route('date_konsultasiteknis') }}"><i class="fa fa-circle"></i><span>Jadwal Konsultasi</span></a></li>
            @endif
        </ul>
      </li>

      <li><a class="sidebar-header" href="{{ route('map') }}"><i data-feather="map"></i><span>Kotak Pesan</span></a></li>

      @endif
<!--
      <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span> Base</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="state-color.html"><i class="fa fa-circle"></i>State color</a></li>
          <li><a href="typography.html"><i class="fa fa-circle"></i>Typography</a></li>
          <li><a href="avatars.html"><i class="fa fa-circle"></i>Avatars</a></li>
          <li><a href="helper-classes.html"><i class="fa fa-circle"></i>helper classes</a></li>
          <li><a href="grid.html"><i class="fa fa-circle"></i>Grid</a></li>
          <li><a href="tag-pills.html"><i class="fa fa-circle"></i>Tag & pills</a></li>
          <li><a href="progress-bar.html"><i class="fa fa-circle"></i>Progress</a></li>
          <li><a href="modal.html"><i class="fa fa-circle"></i>Modal</a></li>
          <li><a href="alert.html"><i class="fa fa-circle"></i>Alert</a></li>
          <li><a href="popover.html"><i class="fa fa-circle"></i>Popover</a></li>
          <li><a href="tooltip.html"><i class="fa fa-circle"></i>Tooltip</a></li>
          <li><a href="loader.html"><i class="fa fa-circle"></i>Spinners</a></li>
          <li><a href="dropdown.html"><i class="fa fa-circle"></i>Dropdown</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Tabs<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="tab-bootstrap.html"><i class="fa fa-circle"></i>Bootstrap Tabs</a></li>
              <li><a href="tab-material.html"><i class="fa fa-circle"></i>Line Tabs</a></li>
            </ul>
          </li>
          <li><a href="according.html"><i class="fa fa-circle"></i>Accordion</a></li>
          <li><a href="navs.html"><i class="fa fa-circle"></i>Navs</a></li>
          <li><a href="box-shadow.html"><i class="fa fa-circle"></i>Shadow</a></li>
          <li><a href="list.html"><i class="fa fa-circle"></i>Lists</a></li>
        </ul>
      </li>

      <li><a class="sidebar-header" href="maintenance.html" target="_blank"><i data-feather="settings"></i><span> Maintenance</span></a></li> -->

    </ul>
  </div>
</div>
@endif
