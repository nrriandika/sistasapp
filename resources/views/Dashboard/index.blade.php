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
                <h3>Dashboard Utama</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Dashboard Utama</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">



















        <div class="row">
            <div class="col-sm-12 theme-tab">
              <ul class="tabs tab-title">
                <li class="current"><a href="tab-1" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>Home</a></li>
                <li class=""><a href="tab-2" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>Budget Summary</a></li>
                <li class=""><a href="tab-3" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>Team Members</a></li>
              </ul>
              <div class="tab-content-cls">
                <div class="tab-content active default visiable" id="tab-1">
                  <div class="row">
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="media">
                            <div class="select2-drpdwn-project select-options">
                              <select class="form-control form-control-primary btn-square" name="select">
                                <option value="opt1">Today</option>
                                <option value="opt2">Yesterday</option>
                                <option value="opt3">Tomorrow</option>
                                <option value="opt4">Monthly</option>
                                <option value="opt5">Weekly</option>
                              </select>
                            </div>
                          </div>
                          <div class="project-widgets text-center">
                            <h1 class="font-primary counter">45</h1>
                            <h6 class="mb-0">Due Tasks</h6>
                          </div>
                        </div>
                        <div class="card-footer project-footer">
                          <h6 class="mb-0">Completed:<span class="counter">14</span></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="media">
                            <h5 class="mb-0">Features</h5>
                          </div>
                          <div class="project-widgets text-center">
                            <h1 class="font-primary counter">80</h1>
                            <h6 class="mb-0">Proposals</h6>
                          </div>
                        </div>
                        <div class="card-footer project-footer">
                          <h6 class="mb-0">Implemented:<span class="counter">14</span></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="media">
                            <h5 class="mb-0">Issues</h5>
                          </div>
                          <div class="project-widgets text-center">
                            <h1 class="font-primary counter">34</h1>
                            <h6 class="mb-0">Open</h6>
                          </div>
                        </div>
                        <div class="card-footer project-footer">
                          <h6 class="mb-0">Closed today:<span class="counter">10</span></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="media">
                            <h5 class="mb-0">Overdue</h5>
                          </div>
                          <div class="project-widgets text-center">
                            <h1 class="font-primary counter">7</h1>
                            <h6 class="mb-0">Tasks</h6>
                          </div>
                        </div>
                        <div class="card-footer project-footer">
                          <h6 class="mb-0">Task Solved:<span class="counter">4</span></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="card">
                        <div class="card-header project-header">
                          <div class="row">
                            <div class="col-sm-8">
                              <h5>Task Distribution</h5>
                            </div>
                            <div class="col-sm-4">
                              <div class="select2-drpdwn-project select-options">
                                <select class="form-control form-control-primary btn-square" name="select">
                                  <option value="opt1">Today</option>
                                  <option value="opt2">Yesterday</option>
                                  <option value="opt3">Tomorrow</option>
                                  <option value="opt4">Monthly</option>
                                  <option value="opt5">Weekly</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body chart-block chart-vertical-center project-charts">
                          <canvas id="myDoughnutGraph" width="598" height="397" style="width: 399px; height: 265px;"></canvas>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="card">
                        <div class="card-header project-header">
                          <div class="row">
                            <div class="col-sm-8">
                              <h5>Schedule</h5>
                            </div>
                            <div class="col-sm-4">
                              <div class="select2-drpdwn-project select-options">
                                <select class="form-control form-control-primary btn-square" name="select">
                                  <option value="opt1">Today</option>
                                  <option value="opt2">Yesterday</option>
                                  <option value="opt3">Tomorrow</option>
                                  <option value="opt4">Monthly</option>
                                  <option value="opt5">Weekly</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="schedule">
                            <div class="media">
                              <div class="media-body">
                                <h6>Group Meeting</h6>
                                <p>30 minutes</p>
                              </div>
                              <div class="dropdown schedule-dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#" data-original-title="" title="">Project</a><a class="dropdown-item" href="#" data-original-title="" title="">Requirements</a><a class="dropdown-item" href="#" data-original-title="" title="">Discussion</a><a class="dropdown-item" href="#" data-original-title="" title="">Planning</a></div>
                              </div>
                            </div>
                            <div class="media">
                              <div class="media-body">
                                <h6>Public Beta Release</h6>
                                <p>10:00 PM</p>
                              </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </div>
                            <div class="media">
                              <div class="media-body">
                                <h6>Lunch</h6>
                                <p>12:30 PM</p>
                              </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </div>
                            <div class="media">
                              <div class="media-body">
                                <h6>Clients Timing</h6>
                                <p>2:00 PM to 6:00 PM</p>
                              </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h5>Github Isuues</h5>
                          <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                              <li><i class="icofont icofont-simple-left"></i></li>
                              <li><i class="view-html fa fa-code"></i></li>
                              <li><i class="icofont icofont-maximize full-card"></i></li>
                              <li><i class="icofont icofont-minus minimize-card"></i></li>
                              <li><i class="icofont icofont-refresh reload-card"></i></li>
                              <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-xl-6 xl-100">
                              <div class="row more-projects">
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Created</h6>
                                      <h5 class="counter mb-0">27</h5>
                                    </div>
                                    <div class="project-small-chart-1 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M0,85L0,71C27.607,71,27.607,15,55.215,15C82.822,15,82.822,57,110.429,57C138.036,57,138.036,15,165.644,15C193.251,15,193.251,29,220.858,29C248.466,29,248.466,43,276.073,43L276.073,85Z" class="ct-area"></path><path d="M0,71C27.607,71,27.607,15,55.215,15C82.822,15,82.822,57,110.429,57C138.036,57,138.036,15,165.644,15C193.251,15,193.251,29,220.858,29C248.466,29,248.466,43,276.073,43" class="ct-line"></path><line x1="0" y1="71" x2="0.01" y2="71" class="ct-point" ct:value="1"></line><line x1="55.21458740234375" y1="15" x2="55.22458740234375" y2="15" class="ct-point" ct:value="5"></line><line x1="110.4291748046875" y1="57" x2="110.43917480468751" y2="57" class="ct-point" ct:value="2"></line><line x1="165.64376220703127" y1="15" x2="165.65376220703126" y2="15" class="ct-point" ct:value="5"></line><line x1="220.858349609375" y1="29" x2="220.868349609375" y2="29" class="ct-point" ct:value="4"></line><line x1="276.07293701171875" y1="43" x2="276.08293701171874" y2="43" class="ct-point" ct:value="3"></line></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient5" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Fixed</h6>
                                      <h5 class="counter mb-0">8</h5>
                                    </div>
                                    <div class="project-small-chart-2 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M5,85L5,15C22.072,29,39.143,57,56.215,57C73.286,57,90.358,43,107.429,43C124.501,43,141.572,71,158.644,71C175.715,71,192.787,43,209.858,43C226.93,43,244.001,52.333,261.073,57L261.073,85Z" class="ct-area"></path><path d="M5,15C22.072,29,39.143,57,56.215,57C73.286,57,90.358,43,107.429,43C124.501,43,141.572,71,158.644,71C175.715,71,192.787,43,209.858,43C226.93,43,244.001,52.333,261.073,57" class="ct-line"></path></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient6" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Re-opened</h6>
                                      <h5 class="counter mb-0">2</h5>
                                    </div>
                                    <div class="project-small-chart-3 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M5,85L5,71C22.072,66.333,39.143,64,56.215,57C73.286,50,90.358,15,107.429,15C124.501,15,141.572,71,158.644,71C175.715,71,192.787,29,209.858,29C226.93,29,244.001,38.333,261.073,43L261.073,85Z" class="ct-area"></path><path d="M5,71C22.072,66.333,39.143,64,56.215,57C73.286,50,90.358,15,107.429,15C124.501,15,141.572,71,158.644,71C175.715,71,192.787,29,209.858,29C226.93,29,244.001,38.333,261.073,43" class="ct-line"></path></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient7" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Closed</h6>
                                      <h5 class="counter mb-0">10</h5>
                                    </div>
                                    <div class="project-small-chart-4 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M5,85L5,67.5C22.072,61.667,39.143,57.778,56.215,50C73.286,42.222,90.358,15,107.429,15C124.501,15,141.572,26.667,158.644,32.5C175.715,38.333,192.787,50,209.858,50C226.93,50,244.001,38.333,261.073,32.5L261.073,85Z" class="ct-area"></path><path d="M5,67.5C22.072,61.667,39.143,57.778,56.215,50C73.286,42.222,90.358,15,107.429,15C124.501,15,141.572,26.667,158.644,32.5C175.715,38.333,192.787,50,209.858,50C226.93,50,244.001,38.333,261.073,32.5" class="ct-line"></path></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient8" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Wont'fix</h6>
                                      <h5 class="counter mb-0">25</h5>
                                    </div>
                                    <div class="project-small-chart-5 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M5,85L5,85C22.072,61.667,39.143,15,56.215,15C73.286,15,90.358,57,107.429,57C124.501,57,141.572,43,158.644,43C175.715,43,192.787,71,209.858,71C226.93,71,244.001,52.333,261.073,43L261.073,85Z" class="ct-area"></path><path d="M5,85C22.072,61.667,39.143,15,56.215,15C73.286,15,90.358,57,107.429,57C124.501,57,141.572,43,158.644,43C175.715,43,192.787,71,209.858,71C226.93,71,244.001,52.333,261.073,43" class="ct-line"></path></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient9" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                                <div class="col-sm-6 xl-4">
                                  <div class="projects-main">
                                    <div class="project-content">
                                      <h6>Need's test</h6>
                                      <h5 class="counter mb-0">5</h5>
                                    </div>
                                    <div class="project-small-chart-6 project-small"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M5,85L5,61.667C22.072,53.889,39.143,46.111,56.215,38.333C73.286,30.556,90.358,15,107.429,15C124.501,15,141.572,61.667,158.644,61.667C175.715,61.667,192.787,46.111,209.858,38.333C226.93,30.556,244.001,22.778,261.073,15L261.073,85Z" class="ct-area"></path><path d="M5,61.667C22.072,53.889,39.143,46.111,56.215,38.333C73.286,30.556,90.358,15,107.429,15C124.501,15,141.572,61.667,158.644,61.667C175.715,61.667,192.787,46.111,209.858,38.333C226.93,30.556,244.001,22.778,261.073,15" class="ct-line"></path></g></g><g class="ct-labels"></g><defs><linearGradient id="gradient10" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#4466f2"></stop><stop offset="1" stop-color="#1ea6ec"></stop></linearGradient></defs></svg></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-6 xl-100 github-lg">
                              <div class="show-value-top d-flex">
                                <div class="value-left d-inline-block">
                                  <div class="square bg-primary d-inline-block"></div><span>Closed Issues</span>
                                </div>
                                <div class="value-right d-inline-block">
                                  <div class="square d-inline-block bg-smooth-chart"></div><span>Issues</span>
                                </div>
                              </div>
                              <div class="github-chart">
                                <div class="flot-chart-placeholder" id="github-issues" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="448" version="1.1" width="889" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="19.859375" y="409.65625" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M32.359375,409.5H863.333" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.859375" y="313.4921875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2</tspan></text><path fill="none" stroke="#aaaaaa" d="M32.359375,313.5H863.333" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.859375" y="217.328125" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">4</tspan></text><path fill="none" stroke="#aaaaaa" d="M32.359375,217.5H863.333" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.859375" y="121.1640625" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">6</tspan></text><path fill="none" stroke="#aaaaaa" d="M32.359375,121.5H863.333" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="19.859375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">8</tspan></text><path fill="none" stroke="#aaaaaa" d="M32.359375,25.5H863.333" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="803.9777410714286" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Sun</tspan></text><text x="685.2672232142858" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Sat</tspan></text><text x="566.5567053571428" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Fri</tspan></text><text x="447.8461875" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Thu</tspan></text><text x="329.1356696428571" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Wed</tspan></text><text x="210.42515178571426" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Tue</tspan></text><text x="91.71463392857143" y="422.15625" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6719)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mon</tspan></text><rect x="47.19818973214286" y="265.41015625" width="89.03288839285713" height="144.24609375" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="47.19818973214286" y="169.24609375" width="89.03288839285713" height="96.1640625" rx="0" ry="0" fill="#1ea6ec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="165.9087075892857" y="265.41015625" width="89.03288839285713" height="144.24609375" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="284.6192254464286" y="409.65625" width="89.03288839285713" height="0" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="284.6192254464286" y="337.533203125" width="89.03288839285713" height="72.123046875" rx="0" ry="0" fill="#1ea6ec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="403.3297433035714" y="313.4921875" width="89.03288839285713" height="96.1640625" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="522.0402611607143" y="409.65625" width="89.03288839285713" height="0" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="522.0402611607143" y="241.369140625" width="89.03288839285713" height="168.287109375" rx="0" ry="0" fill="#1ea6ec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="640.7507790178571" y="265.41015625" width="89.03288839285713" height="144.24609375" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="640.7507790178571" y="169.24609375" width="89.03288839285713" height="96.1640625" rx="0" ry="0" fill="#1ea6ec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="759.4612968749999" y="409.65625" width="89.03288839285713" height="0" rx="0" ry="0" fill="#4466f2" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="759.4612968749999" y="313.4921875" width="89.03288839285713" height="96.1640625" rx="0" ry="0" fill="#1ea6ec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 784.894px; top: 187px;"><div class="morris-hover-row-label">Sun</div><div class="morris-hover-point" style="color: #4466f2">
Y:
0
</div><div class="morris-hover-point" style="color: #1ea6ec">
Z:
2
</div></div></div>
                              </div>
                            </div>
                          </div>
                          <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head"><span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy begin --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>row<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-lg-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>row more-projects<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Created<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>27<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-1 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Fixed<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>8<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-2 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Re-opened<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-3 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Closed<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>10<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-4 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Wont'fix<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>25<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-5 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-sm-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>projects-main<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-content<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Need's test<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h5</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>counter mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>5<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h5</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>project-small-chart-6 project-small<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col-lg-6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>show-value-top d-flex<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>value-left d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>square bg-primary d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span><span class="token punctuation">&gt;</span></span>Closed Issues<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>value-right d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>square d-inline-block bg-smooth-chart<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span><span class="token punctuation">&gt;</span></span>Issues<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>github-chart<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>github-issues<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>flot-chart-placeholder<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy end --&gt;</span></code></pre>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-content" id="tab-2">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h5>Current Progress</h5>
                          <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                              <li><i class="icofont icofont-simple-left"></i></li>
                              <li><i class="view-html fa fa-code"></i></li>
                              <li><i class="icofont icofont-maximize full-card"></i></li>
                              <li><i class="icofont icofont-minus minimize-card"></i></li>
                              <li><i class="icofont icofont-refresh reload-card"></i></li>
                              <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive current-progress">
                            <table class="table table-bordernone">
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <h6>Web application</h6>
                                        <p>Design &amp; development</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-inline-block align-middle"><span>Latest Updated Today at 1:30 PM</span><span class="ml-current"><i class="fa fa-clock-o"></i>10:32</span><span class="ml-current"><i class="fa fa-comment"></i>540</span></div>
                                  </td>
                                  <td>
                                    <div class="progress sm-progress-bar">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/4.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <h6>Login module</h6>
                                        <p>Development</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-inline-block align-middle"><span>Latest Updated Today at 4:00 PM</span><span class="ml-current"><i class="fa fa-clock-o"></i>1:32</span><span class="ml-current"><i class="fa fa-comment"></i>700</span></div>
                                  </td>
                                  <td>
                                    <div class="progress sm-progress-bar">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/7.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <h6>Module testing</h6>
                                        <p>Testing</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-inline-block align-middle"><span>Latest Updated Today at 5:45 PM</span><span class="ml-current"><i class="fa fa-clock-o"></i>11:40</span><span class="ml-current"><i class="fa fa-comment"></i>425</span></div>
                                  </td>
                                  <td>
                                    <div class="progress sm-progress-bar">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head1"><span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy begin --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>table-responsive current-progress<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>table</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>table table-bordernone<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tbody</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/1.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Web application<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Design &amp; development<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span><span class="token punctuation">&gt;</span></span>Latest Updated Today at 1:30 PM<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-clock-o<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>10:32<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-comment<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>540<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress sm-progress-bar<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress-bar bg-primary<span class="token punctuation">"</span></span> <span class="token attr-name">role</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progressbar<span class="token punctuation">"</span></span><span class="token style-attr language-css"><span class="token attr-name"> <span class="token attr-name">style</span></span><span class="token punctuation">="</span><span class="token attr-value"><span class="token property">width</span><span class="token punctuation">:</span> 60%</span><span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuenow</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>60<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemin</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>0<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemax</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>100<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/4.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Login module<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Development<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span><span class="token punctuation">&gt;</span></span>Latest Updated Today at 4:00 PM<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-clock-o<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>1:32<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-comment<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>700<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress sm-progress-bar<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress-bar bg-primary<span class="token punctuation">"</span></span> <span class="token attr-name">role</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progressbar<span class="token punctuation">"</span></span><span class="token style-attr language-css"><span class="token attr-name"> <span class="token attr-name">style</span></span><span class="token punctuation">="</span><span class="token attr-value"><span class="token property">width</span><span class="token punctuation">:</span> 50%</span><span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuenow</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>50<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemin</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>0<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemax</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>100<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/7.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h6</span><span class="token punctuation">&gt;</span></span>Module testing<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h6</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Testing<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span><span class="token punctuation">&gt;</span></span>Latest Updated Today at 5:45 PM<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-clock-o<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>11:40<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ml-current<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>fa fa-comment<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>425<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress sm-progress-bar<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progress-bar bg-primary<span class="token punctuation">"</span></span> <span class="token attr-name">role</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>progressbar<span class="token punctuation">"</span></span><span class="token style-attr language-css"><span class="token attr-name"> <span class="token attr-name">style</span></span><span class="token punctuation">="</span><span class="token attr-value"><span class="token property">width</span><span class="token punctuation">:</span> 90%</span><span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuenow</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>90<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemin</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>0<span class="token punctuation">"</span></span> <span class="token attr-name">aria-valuemax</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>100<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tbody</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>table</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy end --&gt;</span></code></pre>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-12 xl-100">
                      <div class="card">
                        <div class="card-header">
                          <h5>Budget Distribution</h5>
                          <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                              <li><i class="icofont icofont-simple-left"></i></li>
                              <li><i class="view-html fa fa-code"></i></li>
                              <li><i class="icofont icofont-maximize full-card"></i></li>
                              <li><i class="icofont icofont-minus minimize-card"></i></li>
                              <li><i class="icofont icofont-refresh reload-card"></i></li>
                              <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-body chart-block">
                          <div class="flot-chart-container budget-chart">
                            <div class="flot-chart-placeholder" id="default-pie-flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1332" height="618" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 888.333px; height: 412px;"></canvas><canvas class="flot-overlay" width="1332" height="618" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 888.333px; height: 412px;"></canvas><div class="legend"><div style="position: absolute; width: 61.3333px; height: 108px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(68,102,242);overflow:hidden"></div></div></td><td class="legendLabel">Series1</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(30,166,236);overflow:hidden"></div></div></td><td class="legendLabel">Series2</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(34,175,71);overflow:hidden"></div></div></td><td class="legendLabel">Series3</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(0,123,255);overflow:hidden"></div></div></td><td class="legendLabel">Series4</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(255,83,112);overflow:hidden"></div></div></td><td class="legendLabel">Series5</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(34,175,71);overflow:hidden"></div></div></td><td class="legendLabel">Series6</td></tr></tbody></table></div></div>
                          </div>
                          <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head3"><span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy begin --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-body chart-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>flot-chart-container budget-chart<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>default-pie-flot-chart<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>flot-chart-placeholder<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy end --&gt;</span></code></pre>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-12 xl-100">
                      <div class="card">
                        <div class="card-header project-header">
                          <div class="row">
                            <div class="col-sm-8">
                              <h5>Spent</h5>
                            </div>
                            <div class="col-sm-4">
                              <div class="select2-drpdwn-project select-options">
                                <select class="form-control form-control-primary btn-square" name="select">
                                  <option value="opt1">Today</option>
                                  <option value="opt2">Yesterday</option>
                                  <option value="opt3">Tomorrow</option>
                                  <option value="opt4">Monthly</option>
                                  <option value="opt5">Weekly</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body spent">
                          <div class="spent-graph">
                            <div class="d-flex">
                              <div class="project-budget">
                                <h6>Weekly spent</h6>
                                <h2 class="mb-0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>12,5000</span></h2>
                              </div>
                              <div class="projects-main mb-0">
                                <div class="xm-mb-peity"><span class="bar-colours-1" style="display: none;">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="50" width="500"><rect fill="#4466f2" x="1.6666666666666667" y="22.22222222222222" width="13.333333333333334" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="18.333333333333332" y="33.333333333333336" width="13.333333333333336" height="16.666666666666664"></rect><rect fill="#22af47" x="35" y="0" width="13.333333333333336" height="50"></rect><rect fill="#4466f2" x="51.666666666666664" y="16.66666666666667" width="13.333333333333336" height="33.33333333333333"></rect><rect fill="#1ea6ec" x="68.33333333333333" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#22af47" x="85" y="0" width="13.333333333333329" height="50"></rect><rect fill="#4466f2" x="101.66666666666667" y="11.111111111111107" width="13.333333333333329" height="38.88888888888889"></rect><rect fill="#1ea6ec" x="118.33333333333333" y="33.333333333333336" width="13.333333333333329" height="16.666666666666664"></rect><rect fill="#22af47" x="135" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="151.66666666666666" y="38.888888888888886" width="13.333333333333343" height="11.111111111111114"></rect><rect fill="#1ea6ec" x="168.33333333333334" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#22af47" x="185" y="33.333333333333336" width="13.333333333333343" height="16.666666666666664"></rect><rect fill="#4466f2" x="201.66666666666666" y="0" width="13.333333333333343" height="50"></rect><rect fill="#1ea6ec" x="218.33333333333334" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#22af47" x="235" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="251.66666666666666" y="0" width="13.333333333333343" height="50"></rect><rect fill="#1ea6ec" x="268.33333333333337" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#22af47" x="285" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#4466f2" x="301.6666666666667" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="318.3333333333333" y="38.888888888888886" width="13.333333333333371" height="11.111111111111114"></rect><rect fill="#22af47" x="335" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#4466f2" x="351.6666666666667" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#1ea6ec" x="368.3333333333333" y="0" width="13.333333333333371" height="50"></rect><rect fill="#22af47" x="385" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#4466f2" x="401.6666666666667" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="418.3333333333333" y="0" width="13.333333333333371" height="50"></rect><rect fill="#22af47" x="435" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#4466f2" x="451.6666666666667" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#1ea6ec" x="468.3333333333333" y="22.22222222222222" width="13.333333333333371" height="27.77777777777778"></rect><rect fill="#22af47" x="485" y="38.888888888888886" width="13.333333333333314" height="11.111111111111114"></rect></svg></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body spent">
                          <div class="spent-graph">
                            <div class="d-flex">
                              <div class="project-budget">
                                <h6>Total spent</h6>
                                <h2 class="mb-0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>15,7452</span></h2>
                              </div>
                              <div class="projects-main mb-0">
                                <div class="xm-mb-peity"><span class="bar-colours-2" style="display: none;">5,7,3,5,2,3,9,6,5,9,5,3,5,2,5,3,3,9,6,5,9,7,9,6,5,9,7,3,5,2</span><svg class="peity" height="50" width="500"><rect fill="#4466f2" x="1.6666666666666667" y="22.22222222222222" width="13.333333333333334" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="18.333333333333332" y="11.111111111111107" width="13.333333333333336" height="38.88888888888889"></rect><rect fill="#22af47" x="35" y="33.333333333333336" width="13.333333333333336" height="16.666666666666664"></rect><rect fill="#4466f2" x="51.666666666666664" y="22.22222222222222" width="13.333333333333336" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="68.33333333333333" y="38.888888888888886" width="13.333333333333343" height="11.111111111111114"></rect><rect fill="#22af47" x="85" y="33.333333333333336" width="13.333333333333329" height="16.666666666666664"></rect><rect fill="#4466f2" x="101.66666666666667" y="0" width="13.333333333333329" height="50"></rect><rect fill="#1ea6ec" x="118.33333333333333" y="16.66666666666667" width="13.333333333333329" height="33.33333333333333"></rect><rect fill="#22af47" x="135" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="151.66666666666666" y="0" width="13.333333333333343" height="50"></rect><rect fill="#1ea6ec" x="168.33333333333334" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#22af47" x="185" y="33.333333333333336" width="13.333333333333343" height="16.666666666666664"></rect><rect fill="#4466f2" x="201.66666666666666" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="218.33333333333334" y="38.888888888888886" width="13.333333333333314" height="11.111111111111114"></rect><rect fill="#22af47" x="235" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="251.66666666666666" y="33.333333333333336" width="13.333333333333343" height="16.666666666666664"></rect><rect fill="#1ea6ec" x="268.33333333333337" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#22af47" x="285" y="0" width="13.333333333333314" height="50"></rect><rect fill="#4466f2" x="301.6666666666667" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#1ea6ec" x="318.3333333333333" y="22.22222222222222" width="13.333333333333371" height="27.77777777777778"></rect><rect fill="#22af47" x="335" y="0" width="13.333333333333314" height="50"></rect><rect fill="#4466f2" x="351.6666666666667" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#1ea6ec" x="368.3333333333333" y="0" width="13.333333333333371" height="50"></rect><rect fill="#22af47" x="385" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#4466f2" x="401.6666666666667" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="418.3333333333333" y="0" width="13.333333333333371" height="50"></rect><rect fill="#22af47" x="435" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#4466f2" x="451.6666666666667" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#1ea6ec" x="468.3333333333333" y="22.22222222222222" width="13.333333333333371" height="27.77777777777778"></rect><rect fill="#22af47" x="485" y="38.888888888888886" width="13.333333333333314" height="11.111111111111114"></rect></svg></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body spent">
                          <div class="spent-graph">
                            <div class="d-flex">
                              <div class="project-budget">
                                <h6>Remaining</h6>
                                <h2 class="mb-0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>18,5438</span></h2>
                              </div>
                              <div class="projects-main mb-0">
                                <div class="xm-mb-peity"><span class="bar-colours-3" style="display: none;">9,7,3,5,2,5,3,5,3,9,6,5,9,3,5,2,5,3,6,5,9,7,9,2,5,3,7,9,5,6</span><svg class="peity" height="50" width="500"><rect fill="#4466f2" x="1.6666666666666667" y="0" width="13.333333333333334" height="50"></rect><rect fill="#1ea6ec" x="18.333333333333332" y="11.111111111111107" width="13.333333333333336" height="38.88888888888889"></rect><rect fill="#22af47" x="35" y="33.333333333333336" width="13.333333333333336" height="16.666666666666664"></rect><rect fill="#4466f2" x="51.666666666666664" y="22.22222222222222" width="13.333333333333336" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="68.33333333333333" y="38.888888888888886" width="13.333333333333343" height="11.111111111111114"></rect><rect fill="#22af47" x="85" y="22.22222222222222" width="13.333333333333329" height="27.77777777777778"></rect><rect fill="#4466f2" x="101.66666666666667" y="33.333333333333336" width="13.333333333333329" height="16.666666666666664"></rect><rect fill="#1ea6ec" x="118.33333333333333" y="22.22222222222222" width="13.333333333333329" height="27.77777777777778"></rect><rect fill="#22af47" x="135" y="33.333333333333336" width="13.333333333333343" height="16.666666666666664"></rect><rect fill="#4466f2" x="151.66666666666666" y="0" width="13.333333333333343" height="50"></rect><rect fill="#1ea6ec" x="168.33333333333334" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#22af47" x="185" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="201.66666666666666" y="0" width="13.333333333333343" height="50"></rect><rect fill="#1ea6ec" x="218.33333333333334" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#22af47" x="235" y="22.22222222222222" width="13.333333333333343" height="27.77777777777778"></rect><rect fill="#4466f2" x="251.66666666666666" y="38.888888888888886" width="13.333333333333343" height="11.111111111111114"></rect><rect fill="#1ea6ec" x="268.33333333333337" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#22af47" x="285" y="33.333333333333336" width="13.333333333333314" height="16.666666666666664"></rect><rect fill="#4466f2" x="301.6666666666667" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect><rect fill="#1ea6ec" x="318.3333333333333" y="22.22222222222222" width="13.333333333333371" height="27.77777777777778"></rect><rect fill="#22af47" x="335" y="0" width="13.333333333333314" height="50"></rect><rect fill="#4466f2" x="351.6666666666667" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#1ea6ec" x="368.3333333333333" y="0" width="13.333333333333371" height="50"></rect><rect fill="#22af47" x="385" y="38.888888888888886" width="13.333333333333314" height="11.111111111111114"></rect><rect fill="#4466f2" x="401.6666666666667" y="22.22222222222222" width="13.333333333333314" height="27.77777777777778"></rect><rect fill="#1ea6ec" x="418.3333333333333" y="33.333333333333336" width="13.333333333333371" height="16.666666666666664"></rect><rect fill="#22af47" x="435" y="11.111111111111107" width="13.333333333333314" height="38.88888888888889"></rect><rect fill="#4466f2" x="451.6666666666667" y="0" width="13.333333333333314" height="50"></rect><rect fill="#1ea6ec" x="468.3333333333333" y="22.22222222222222" width="13.333333333333371" height="27.77777777777778"></rect><rect fill="#22af47" x="485" y="16.66666666666667" width="13.333333333333314" height="33.33333333333333"></rect></svg></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer spent">
                          <div class="spent-graph">
                            <div class="d-flex">
                              <div class="project-budget m-0">
                                <h6>Total Budget</h6>
                                <h2 class="mb-0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>34,5812</span></h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-content" id="tab-3">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h5>Team Members</h5>
                          <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                              <li><i class="icofont icofont-simple-left"></i></li>
                              <li><i class="view-html fa fa-code"></i></li>
                              <li><i class="icofont icofont-maximize full-card"></i></li>
                              <li><i class="icofont icofont-minus minimize-card"></i></li>
                              <li><i class="icofont icofont-refresh reload-card"></i></li>
                              <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive sellers team-members">
                            <table class="table table-bordernone">
                              <thead>
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Position</th>
                                  <th scope="col">Office</th>
                                  <th scope="col">E-Mail</th>
                                  <th scope="col">Phone</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/6.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Jerry Patterson</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Design Manager</p>
                                  </td>
                                  <td>
                                    <p>Integer</p>
                                  </td>
                                  <td>
                                    <p>jerry13@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+91 264 570 4611</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/2.png" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Rosa Matthews</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Director of Sales</p>
                                  </td>
                                  <td>
                                    <p>Ipsum</p>
                                  </td>
                                  <td>
                                    <p>ros456@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+01 967 487 1873</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Alvaro Aguirre</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Office Assistant</p>
                                  </td>
                                  <td>
                                    <p>Praesent</p>
                                  </td>
                                  <td>
                                    <p>alvar76@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+48 724 585 0012</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/15.png" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Jerry Patterson</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Programmer Analyst</p>
                                  </td>
                                  <td>
                                    <p>Ipsum</p>
                                  </td>
                                  <td>
                                    <p>jerry13@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+91 264 570 4611</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/4.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Anne Snyder</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Social Worker</p>
                                  </td>
                                  <td>
                                    <p>Donec</p>
                                  </td>
                                  <td>
                                    <p>annsny@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+61 480 087 1175</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="d-inline-block align-middle"><img class="img-radius img-50 align-top m-r-15 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title="">
                                      <div class="d-inline-block">
                                        <p>Alana Slacker</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p>Systems Engineer</p>
                                  </td>
                                  <td>
                                    <p>Etiam</p>
                                  </td>
                                  <td>
                                    <p>alana82@gmail.com</p>
                                  </td>
                                  <td>
                                    <p>+75 483 761 4680</p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head2"><span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy begin --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>table-responsive sellers team-members<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>table</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>table table-bordernone<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>thead</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Name<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Position<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Office<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>E-Mail<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Phone<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>thead</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tbody</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/6.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Jerry Patterson<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Design Manager<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Integer<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>jerry13@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+91 264 570 4611<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/2.png<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Rosa Matthews<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Director of Sales<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Ipsum<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>ros456@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+01 967 487 1873<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/3.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Alvaro Aguirre<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Office Assistant<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Praesent<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>alvar76@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+48 724 585 0012<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/15.png<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Jerry Patterson<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Programmer Analyst<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Ipsum<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>jerry13@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+91 264 570 4611<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/4.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Anne Snyder<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Social Worker<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Donec<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>annsny@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+61 480 087 1175<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img</span> <span class="token attr-name">src</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>../assets/images/user/5.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>img-radius img-50 align-top m-r-15 rounded-circle<span class="token punctuation">"</span></span> <span class="token attr-name">alt</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>d-inline-block<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Alana Slacker<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
          <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Systems Engineer<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>Etiam<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>alana82@gmail.com<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span><span class="token punctuation">&gt;</span></span>+75 483 761 4680<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tbody</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>table</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token comment" spellcheck="true">&lt;!-- Cod Box Copy end --&gt;</span></code></pre>
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
  </div>
</div>
@endsection

@push('js')
<script>
</script>
@endpush
