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
                <h3>Informasi Detail Pengguna</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Informasi Detail Pengguna</li>
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
                    <div class="col-lg-4">
                      <div class="my-gallery" id="aniimated-thumbnials-3" itemscope="" data-pswp-uid="3">
                        <figure itemprop="associatedMedia" itemscope="">
                          <a href="{{ isset($userProfile->avatar_path) ? $userProfile->avatar_path : asset('images/endless/avtar/3.jpg')}}">
                            <img class="img-fluid rounded" width="300" src="{{ isset($userProfile->avatar_path) ? $userProfile->avatar_path : asset('images/endless/avtar/3.jpg')}}" itemprop="thumbnail" alt="gallery">
                          </a>
                        </figure>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <h5>{{ isset($user) ? $user->name : null}}</h5>
                      <span class="f-14">{{ isset($userProfile->nip) ? $userProfile->nip : null}}</span><br>
                      <span class="f-12 text-muted">{{ isset($userProfile->telepon) ? $userProfile->telepon : null}} | {{ isset($user->email) ? $user->email : null}} | {{ isset($user->kode_kab) ? $user->getKabupaten($user->kode_kab) : null}}</span>
                      <a href="{{ route('edit_profile') }}" type="button" class="btn btn-info btn-sm float-right"><i class="icofont icofont-edit-alt"></i> Sunting</a>
                      <hr>
                      <strong class="f-14">{{ isset($userProfile->instansi) ? $userProfile->instansi : null}}</strong><br>
                      <strong class="f-14">{{ isset($userProfile->jabatan) ? $userProfile->jabatan : null}}</strong><br>
                      <p class="f-14">{{ isset($userProfile->bio) ? $userProfile->bio : null}}</p>
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
</div>
@endsection

@push('js')
<script>
</script>
@endpush
