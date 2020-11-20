@push('css')
<style>
.customizer-links .nav-link .settings i,
.customizer-links .nav-link.active .settings i {
    color: #fff;
    background-color: #07112e;
}
.btn-tool {
    padding: 0.3rem 0.8rem;
}
#bufferOptions p, #measureOptions p {
  margin: 1.5px;
}
.customizer-contain .customizer-header {
  padding: 15px 35px;
  border-bottom: 1.5px solid #f6f7fb;
}
.dd-input {
  height: calc(1.8rem + 2px);
  font-size: 0.8rem;
  margin-bottom: 4px;
}
.coordinate-form {
    margin-bottom: 0rem;
}
.nav-big .nav-link.active, .nav-big .show>.nav-link, .nav-pills.nav-big .nav-link.active, .nav-pills.nav-big .show>.nav-link {
    background-color: #223051;
    color: #fff;
}
a, a:hover {
    text-decoration: none;
    color: #223051;
}
.coord-card {
    left:0px;
}
.margin-zr {
  margin: 0px;
}
.padding-zr {
  padding: 0px;
}
.dms-input {
  width: 50px;
  display: inline;
  height: 30px;
  padding: 5px;
  font-size: 13px;
}
.dms-grup {
  margin-bottom: 5px;
}
</style>
@endpush
<div class="customizer-links">
  <div class="nav flex-column nac-pills" id="c-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="c-pills-home-tab" data-toggle="pill" href="#c-pills-home" role="tab" aria-controls="c-pills-home" aria-selected="false">
          <div class="settings"> <i class="icofont icofont-ui-settings"></i> </div>
      </a>
  </div>
</div>
<div class="customizer-contain">
  <div class="tab-content" id="c-pills-tabContent">
      <div class="customizer-header">
          <div id="toolsButtons">
            <button class="btn btn-outline-big btn-sm btn-tool" id="btn-feature-info" type="button" data-original-title="Info" title="">
              <i class="icofont icofont-info"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool collapsed" id="btn-measure" type="button"  data-toggle="collapse" data-target="#measureOptions" aria-expanded="false" aria-controls="collapseOne" data-original-title="Pengukuran" title="">
              <i class="icofont icofont-ruler-compass"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool collapsed" id="btn-buffer" type="button"  data-toggle="collapse" data-target="#bufferOptions" aria-expanded="false" aria-controls="collapseOne" data-original-title="Analisis Buffer" title="">
              <i class="icofont icofont-zigzag"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool collapsed" id="btn-coordinate" type="button"  data-toggle="collapse" data-target="#coordinateOptions" aria-expanded="false" aria-controls="collapseOne" data-original-title="Koordinat Titik" title="">
              <i class="icofont icofont-map-pins"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool" id="btn-search-feature" type="button"  data-original-title="Cari objek spasial" title="">
              <i class="icofont icofont-map-search"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool" id="btn-spasial-filter" type="button"  data-original-title="Spasial Filter" title="">
              <i class="icofont icofont-map"></i>
            </button>
          </div>
          <div class="collapse" id="bufferOptions" class="collapse" data-parent="#accordion">
            <p>Pilihan analisis buffer:</p>
            <button class="btn btn-outline-big btn-tool btn-sm" id="buffer-polyline" type="button" data-original-title="Bedasarkan Polyline" title="">
              <i class="icofont icofont-vector-path"></i>
            </button>
            <button class="btn btn-outline-big btn-tool btn-sm" id="buffer-polygon" type="button" data-original-title="Bedasarkan Polygon" title="">
              <i class="icofont icofont-golf-field"></i>
            </button>
            <button class="btn btn-outline-big btn-tool btn-sm" id="buffer-point" type="button" data-original-title="Bedasarkan Point" title="">
              <i class="icofont icofont-location-pin"></i>
            </button>
          </div>
          <div class="collapse" id="measureOptions" class="collapse" data-parent="#accordion">
            <p>Pengukuran:</p>
            <button class="btn btn-outline-big btn-sm btn-tool" id="btn-measure-distance" type="button" data-original-title="Ukur Jarak" title="">
              <i class="icofont icofont-ruler-alt-1"></i>
            </button>
            <button class="btn btn-outline-big btn-sm btn-tool" id="btn-measure-area" type="button" data-original-title="Ukur Luas" title="">
              <i class="icofont icofont-rulers-alt"></i>
            </button>
          </div>
          <div class="collapse" id="coordinateOptions" class="collapse" data-parent="#accordion">
              <p class="margin-zr">Masukan Angka Koordinat:</p>
              <div class="card margin-zr">
                  <div class="card-header"></div>
                  <div class="card-body" style="padding:0px;padding-top:8px;">
                      <div class="tabbed-card">
                          <ul class="coord-card pull-left nav nav-pills nav-big" id="pills-clrtabinfo" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" id="pills-clrdd-tabinfo" data-toggle="pill" href="#pills-clrddinfo" role="tab" aria-controls="pills-clrdd" aria-selected="false" data-original-title="" title="">DD</a></li>
                            <li class="nav-item"><a class="nav-link" id="pills-clrdms-tabinfo" data-toggle="pill" href="#pills-clrdmsinfo" role="tab" aria-controls="pills-clrdms" aria-selected="true" data-original-title="" title="">DMS</a></li>
                          </ul>
                          <div class="tab-content" id="pills-clrtabContentinfo">
                            <div class="tab-pane fade" id="pills-clrdmsinfo" role="tabpanel" aria-labelledby="pills-clrdms-tabinfo">
                                <div class="form-group coordinate-form row">
                                  <label class="col-sm-3 col-form-label padding-zr">Latitude</label>
                                  <div class="col-sm-9 dms-grup">
                                    <input class="digits form-control dms-input" id="lat-deg" type="number"><span style="font-size:20px">&deg;</span>
                                    <input class="digits form-control dms-input" id="lat-min" type="number"><span style="font-size:20px">&#39;</span>
                                    <input class="digits form-control dms-input" id="lat-sec" type="number"><span style="font-size:20px">&#34;</span>
                                  </div>
                                  <label class="col-sm-3 col-form-label padding-zr">Longitude</label>
                                  <div class="col-sm-9 dms-grup">
                                    <input class="digits form-control dms-input" id="lng-deg" type="number"><span style="font-size:20px">&deg;</span>
                                    <input class="digits form-control dms-input" id="lng-min" type="number"><span style="font-size:20px">&#39;</span>
                                    <input class="digits form-control dms-input" id="lng-sec" type="number"><span style="font-size:20px">&#34;</span>
                                  </div>
                                  <button class="btn btn-big" id="addDMSCoord" type="button">Add Coordinate</button>
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="pills-clrddinfo" role="tabpanel" aria-labelledby="pills-clrdd-tabinfo">
                                <div class="form-group coordinate-form row">
                                  <label class="col-sm-3 col-form-label padding-zr">Latitude</label>
                                  <div class="col-sm-9">
                                    <input class="digits form-control dd-input" id="lat-dd" type="number" placeholder="Derajat Desimal">
                                  </div>
                                  <label class="col-sm-3 col-form-label padding-zr">Longitude</label>
                                  <div class="col-sm-9">
                                    <input class="digits form-control dd-input" id="lng-dd" type="number" placeholder="Derajat Desimal">
                                  </div>
                                  <button class="btn btn-big" id="addDDCoord" type="button">Add Coordinate</button>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="customizer-body custom-scrollbar">
          <div class="tab-pane fade show active" id="c-pills-home" role="tabpanel" aria-labelledby="c-pills-home-tab">
              <h6 class="controller-title">Peta Dasar</h6>
              <div id="basemapControl"></div>
              <h6 class="controller-title">Batas Wilayah</h6>
              <div id="layerControl"></div>
          </div>

      </div>
  </div>
</div>
