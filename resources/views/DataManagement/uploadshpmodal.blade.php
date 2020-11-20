@push('css')
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    cursor: inherit;
    display: block;
}
</style>
@endpush
<div class="modal fade" id="uploadSHPModal" tabindex="-1" role="dialog" aria-labelledby="uploadSHPModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{ route('store_shp') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="card service-card">
            <div class="card-body">
              <input type="hidden" name="jenisDataId" id="jenisDataId" value=""/>
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="uploadedShpFile" name="uploadedShpFile">
                <label class="custom-file-label" for="customFile">Pilih File..</label>
              </div>
              <ul>
              <li>Pilih file shapefile dalam format ZIP</li>
              <li>Pastikan data dalam sistem referensi koordinat WGS'84 (ESPG:4326)</li>
              </ul>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="uploadSHPButton">Unggah</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Tooltips and popovers modal-->
@push('js')
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
