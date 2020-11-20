@push('css')
<style>
    .page-main-header .main-header-right .nav-right ul li svg {
      margin-top: 10px;
      width: 18px;
      height: 18px;
      color: #040239;
    }
    .page-main-header a {
        color: #040239;
    }
    .page-main-header .main-header-right .nav-right ul li .dot {
        width: 3px;
        height: 3px;
        border-radius: 30px;
        background-color: #040239;
        position: absolute;
        right: 17px;
        bottom: 6px;
        -webkit-animation: blink 1.5s infinite;
        animation: blink 1.5s infinite;
    }
    .page-main-header .main-header-right .nav-right>ul>li:nth-child(5) {
        border-left: none;
        border-right: none;
        padding-left: 0;
    }

    .page-main-header .main-header-right svg line {
        color: #07112e;
    }
</style>
@endpush

@if (Route::has('login'))
<div class="page-main-header">
  <div class="main-header-right row">
    <div class="main-header-left d-lg-none">
      <div class="logo-wrapper">
          <a href="index.html"><img src="{{ asset('images/endless/main-logo.png') }}" alt=""></a>
          Badan Informasi Geospasial
      </div>
    </div>
    <div class="mobile-sidebar d-block">
      <div class="media-body text-right switch-sm">
        <label class="switch"><a href="#" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left" id="sidebar-toggle">
          <line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg></a></label>
      </div>
    </div>
    <div class="nav-right col p-0">
      <ul class="nav-menus">
        <li>
          <form class="form-inline search-form" action="#" method="get">
            <div class="form-group">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search...">
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
        </li>
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li><a href="#"><i class="right_side_toggle" data-feather="layers"></i></span></a></li>
        @auth

        <li class="onhover-dropdown">
          <div class="media align-items-center">
            <img class="align-self-center pull-right img-50 rounded-circle" src="{{ isset($user->getProfile()->avatar_path) ? $user->getProfile()->avatar_path : asset('images/endless/dashboard/user.png') }}" alt="header-user">
            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
          </div>
          <ul class="profile-dropdown onhover-show-div p-20">
            <li>
              <a href="{{ route('edit_profile') }}"><i data-feather="user"></i> Edit Profil</a>
            </li>
            <li><a href="#"><i data-feather="mail"></i> Inbox</a></li>
            <!-- <li><a href="#"><i data-feather="lock"></i> Lock Screen</a></li> -->
            <li><a href="#"><i data-feather="settings"></i> Settings</a></li>
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i data-feather="log-out"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              <!-- <a href="#"><i data-feather="log-out"></i> Logout</a> -->
            </li>
          </ul>
        </li>
        @else
        <li><a href="{{ route('login') }}"><i data-feather="log-out"></i> Login</a></li>
        @if (Route::has('register'))
        <li><a href="{{ route('register') }}"><i data-feather="file-text"></i> Register</a></li>
        @endif

        @endauth

      </ul>
      <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName">{{'name'}}</div>
      </div>
      </div>
    </script>
    <script id="empty-template" type="text/x-handlebars-template">
      <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>

    </script>
  </div>
</div>
@endif
