@extends('layouts.app')

@section('content')
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-page box-layout">
        @include('NavigationBar.index')
        <div class="page-body-wrapper sidebar-hover">
            @include('MenuBar.index')
            @include('ControlBar.advance')
            <div class="page-body">
              @include('MainMap.map')
            </div>
        </div>
    </div>
    @include('ControlBar.index')
@endsection
