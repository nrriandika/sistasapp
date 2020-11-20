@push('css')
<style>
  .service-card {
    margin-bottom: 0px;
  }
</style>
@endpush

<div class="modal fade" id="addWmsModal" tabindex="-1" role="dialog" aria-labelledby="addserviceWmsModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="{{ route('save_external_service') }}" class="form theme-form" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <div class="card service-card">
          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label pt-0" for="addServiceName">Nama Service</label>
              <input class="form-control" id="addServiceName" name="addServiceName" type="text" placeholder="Nama Service" data-original-title="" title="">
            </div>
            <div class="form-group">
              <label class="col-form-label pt-0" for="addWmsService">WMS URL</label>
              <input class="form-control" id="addWmsService" name="addWmsService" type="text" placeholder="http://hostname/geoserver/workspace/wms?" data-original-title="" title="">
            </div>
            <div class="form-group">
              <label for="addWmsLayer">Nama Layer</label>
              <input class="form-control" id="addWmsLayer" name="addWmsLayer" type="text" placeholder="LayerName" data-original-title="" title="">
            </div>
            <div class="form-group">
              <label for="addWmsType">Jenis Service</label>
              <input class="form-control" id="addWmsType" name="addWmsType" type="text" placeholder="Jenis Service" data-original-title="" title="">
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="saveWmsButton" type="submit">Add & Save WMS</button>
        <button class="btn btn-primary" id="addWmsButton" type="button" data-dismiss="modal">Add WMS</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Tooltips and popovers modal-->
