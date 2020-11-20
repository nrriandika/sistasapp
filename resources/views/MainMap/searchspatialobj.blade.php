<div class="modal fade" id="searchSpatialObject" tabindex="-1" role="dialog" aria-labelledby="attributeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cari Objek Spasial</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="col-xl-12">
            <div class="card">
              <!-- <form class="form theme-form"> -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="allLayersName">Nama Layer</label>
                        <select class="form-control digits" id="allLayersName">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="allFieldsName">Nama Kolom</label>
                        <select class="form-control digits" id="allFieldsName">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input class="form-control" id="findValues" type="text" placeholder="Cari..">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit" id="searchObject" disabled>Cari</button>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- </form> -->
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
