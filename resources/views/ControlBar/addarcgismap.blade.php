@push('css')
<style>
  .service-card {
    margin-bottom: 0px;
  }
</style>
@endpush

<div class="modal fade" id="addArcGisMapModal" tabindex="-1" role="dialog" aria-labelledby="addserviceWmsModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card service-card">
          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label pt-0" for="addArgisMap">ArcGIS Map Server URL</label>
              <input class="form-control" id="addArgisMap" type="text" placeholder="http://hostnameurl/arcgis/rest/services/folder/service/MapServer" data-original-title="" title="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="addArcgisMapButton" type="button" data-dismiss="modal">Add Arcgis Service</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Tooltips and popovers modal-->
