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
                    <h3>Sunting Profil Pengguna</h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item"><a href="{{ route('user_profile') }}">Informasi Detail Pengguna</a></li>
                      <li class="breadcrumb-item active">Sunting Profil Pengguna</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ route('save_profile') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <a href="{{ isset($userProfile->avatar_path) ? $userProfile->avatar_path : asset('images/endless/avtar/3.jpg')}}" id="avatarImageLink">
                              <img class="img-thumbnail" id="avatarImage" width="250" height="250" src="{{ isset($userProfile->avatar_path) ? $userProfile->avatar_path : asset('images/endless/avtar/3.jpg')}}" itemprop="thumbnail" alt="Image description">
                            </a>
                          </div>
                          <div class="form-group">
                            <input accept=".jpg, .jpeg, .png" class="form-control" name="avatar_path" id="avatar_path" type="file" onchange="readUploadedAvatar(this);">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Nama Pengguna :</label>
                            <input required class="form-control" name="name" id="name" type="text" placeholder="Nama Pengguna" value="{{ isset($user) ? $user->name : null}}">
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="form-label">Alamat Email :</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <input required class="form-control" name="email" id="email" type="text" placeholder="your-email@domain.com" value="{{ isset($user->email) ? $user->email : null}}">
                                  </div>
                                  <div class="col-md-6">
                                    <a href="#" type="button" class="btn btn-light">
                                      <i class="icofont icofont-ui-password"></i>
                                      Ubah Password
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">NIP :</label>
                            <input required class="form-control" name="nip" id="nip" type="text" maxlength="18" placeholder="18 digit NIP" value="{{ isset($userProfile->nip) ? $userProfile->nip : null}}">
                          </div>
                          <div class="form-group">
                            <label class="form-label">No. Telepon :</label>
                            <input required class="form-control" name="telepon" id="telepon" type="text" maxlength="14" placeholder="Nomor Telepon" value="{{ isset($userProfile->telepon) ? $userProfile->telepon : null}}">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Jabatan :</label>
                            <input required class="form-control" name="jabatan" id="jabatan" type="text" placeholder="Jabatan" value="{{ isset($userProfile->jabatan) ? $userProfile->jabatan : null}}">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Instansi :</label>
                            <input required class="form-control" name="instansi" id="instansi" type="text" placeholder="Instansi" value="{{ isset($userProfile->instansi) ? $userProfile->instansi : null}}">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Deskripsi :</label>
                            <textarea required name="bio" id="bio" class="form-control" rows="6">{{ isset($userProfile->bio) ? $userProfile->bio : null }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                      </div>
                    </form>
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
  function readUploadedAvatar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#avatarImage')
              .attr('src', e.target.result)
              .width(250)
              .height(250);
          $('#avatarImageLink')
              .attr('href', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

</script>
@endpush
