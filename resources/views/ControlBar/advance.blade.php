@push('css')
<style>
.right-sidebar {
    z-index: 100;
}
</style>
@endpush
<div class="right-sidebar" id="right_side_bar">
  <div class="container p-0">
    <div class="modal-header p-l-20 p-r-20">
      <div class="col-sm-12 p-0">
        <h6 class="modal-title font-weight-bold"><i class="icon-map-alt"></i> Penambahan Layer</h6>
      </div>
    </div>
    <div class="card">
      <div class="card-body btn-showcase">
        <button class="btn btn-big" type="button" data-toggle="modal" data-target="#addWmsModal"><i class="icofont icofont-ui-add"></i> WMS/WMTS</button>
        <button class="btn btn-big" type="button" data-toggle="modal" data-target="#addArcGisMapModal"><i class="icofont icofont-ui-add"></i> ArcGIS MapServer</button>
        <hr>
        <!-- Daftar layer2 yang sudah simpan -->
      </div>
    </div>
  </div>
</div>

@include('ControlBar.addwms')
@include('ControlBar.addarcgismap')
