@extends('layouts.app')

@push('css')
<style>
#formUploadAsistensi{
  margin-top: 12px;
}
#formUploadAsistensi,
.table-bordered td,
.table-bordered th {
    border-color: #ededed;
}
#formUploadAsistensi .form-control{
    border-color: #7790a9;
    background-color: #fff;
    font-size: 14px;
    color: #898989;
    font-family: work-Sans,sans-serif;
}
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
            <!-- START SPECIFIC CONTENT-->
            <div class="container-fluid">
              <div class="page-header">
                <div class="row">
                  <div class="col">
                    <div class="page-header-left">
                      <h3>Pengajuan Asistensi</h3>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('daftar_asistensi') }}">Asistensi Batas Desa</a></li>
                        <li class="breadcrumb-item active">Pengajuan Asistensi</li>
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

                  <form action="{{ route('save_asistensi') }}" class="form theme-form" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <div class="form-group row">
                              <input class="form-control" name="form_id" id="form_id" type="hidden" value="{{ $formAsistensi->id }}">
                              <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                              <div class="col-sm-5">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Nama Pengajuan" value="{{ isset($formAsistensi->name) ? $formAsistensi->name : null }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"><b>Deskripsi</b></label>
                              <div class="col-sm-8">
                                <textarea class="form-control" name="description" id="description" rows="8" cols="8">{!! isset($formAsistensi->description) ? $formAsistensi->description : null !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h5>{{ $jenisPengajuan->nama }}</h5>
                      </div>
                      <div class="card-body">
                        <button type='button' class="btn btn-sm btn-primary add-row">
                          <i class="icofont icofont-ui-add"></i> Tambah
                        </button>
                        <button type="submit" class="btn btn-success float-right">Unggah Dokumen Asistensi</button>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="formUploadAsistensi">
                            @foreach($fileAsistensi as $item)
                            <input type="hidden" class="form-control" name="idFileAsistensi[]" value="{{ isset($item->id) ? $item->id : null }}">
                            <tr>
                              <td width="20%">
                                <select class="form-control jenis_detail_dokumen"  name="jenis_detail_dokumen[]">
                                  @foreach($detailDokumenAsistensi as $detailDokumen)
                                  <option {{ isset($item->id_doc_asistens) && $item->id_doc_asistensi == $detailDokumen->id ? 'selected' : '' }} value="{{ $detailDokumen->id }}" data-deskripsi="{{$detailDokumen->description}}" data-format="{{trim($detailDokumen->format)}}">
                                    {{ $detailDokumen->name }} ({{ trim($detailDokumen->format) }})
                                  </option>
                                  @endforeach
                                </select>
                                <span class="detailDokumenDeskripsi"></span>
                              </td>
                              <td width="20%">
                                <select class="form-control jenis_detail_dokumen"  name="indeks_desa_id[]">
                                  @foreach($indeksDelineasiDesa as $indeksDesa)
                                  <option {{ isset($item->indeks_desa_id) && $item->indeks_desa_id == $indeksDesa->id ? 'selected' : '' }} value="{{ $indeksDesa->id }}">
                                    {{ $indeksDesa->desa }}
                                  </option>
                                  @endforeach
                                </select>
                              </td>
                              <td width="30%">
                                <input accept="" class="form-control asistensi" type="file" onchange="readURL(this);" name="asistensi[]">
                                <hr>
                                @if(isset($item->file_path) && $item->getFormat() == 'jpg')
                                <img src="{{ $item->file_path }}" width="250">
                                <embed style="display:none;" src="" type="application/pdf">
                                @elseif(isset($item->file_path) && $item->getFormat() == 'pdf')
                                <img style="display:none;" src="{{ asset('images/endless/attachment-2.jpg') }}">
                                <embed src="{{ $item->file_path }}" type="application/pdf" width="250" height="300">
                                @elseif(isset($item->file_path) && $item->getFormat() == 'zip (shapefile)')
                                <img src="{{ asset('images/endless/defaultshp.jpg') }}" width="200" height="200">
                                <embed style="display:none;" src="" type="application/pdf">
                                @else
                                <img src="{{ asset('images/endless/attachment-2.jpg') }}">
                                <embed style="display:none;" src="" type="application/pdf">
                                @endif
                              </td>
                              <td>
                                <input required class="form-control" name="nama_dokumen[]" type="text" placeholder="Nama Dokumen" value="{{ isset($item->name) ? $item->name : null }}"><br>
                                <textarea class="form-control" name="catatan[]" rows="4" cols="8" placeholder="Catatan..">{!! isset($item->catatan) ? $item->catatan : null !!}</textarea>
                              </td>
                              <td>
                                <button type="button" class="btn btn-xs btn-danger remove-row">
                                  <i class="icofont icofont-ui-delete"></i>
                                </button>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- ./END SPECIFIC CONTENT -->
          </div>
        </div>
    </div>
@endsection

@push('js')
<script>
function readURL(input) {
  var selectedFormat = $(input).closest("tr").find('.jenis_detail_dokumen').find(':selected').attr("data-format");
    if(selectedFormat === 'jpg'){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
              $(input).closest("td").find('img').css('display','block');
              $(input).closest("td").find('embed').css('display','none');
              $(input).closest("td").find('img')
                .attr('src', e.target.result)
                .width(250);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    else if(selectedFormat === 'zip (shapefile)') {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(input).closest("td").find('img').css('display','block');
            $(input).closest("td").find('embed').css('display','none');
            $(input).closest("td").find('img')
                .attr('src', "{{ asset('images/endless/defaultshp.jpg') }}")
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    else if(selectedFormat === 'pdf') {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(input).closest("td").find('img').css('display','none');
            $(input).closest("td").find('embed').css('display','block');
            $(input).closest("td").find('embed')
                .attr('src', e.target.result)
                .css('display','block')
                .width(250)
                .height(300);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
}

function defaultEventChange(){
  $(".jenis_detail_dokumen").on('change', function(e) {
      var selectedFormat = $(this).find(':selected').attr("data-format");
      if(selectedFormat == 'jpg') {
        var fileFormat = '.jpg, .jpeg';
      } else if(selectedFormat == 'pdf') {
        var fileFormat = '.pdf';
      } else if(selectedFormat == 'zip (shapefile)') {
        var fileFormat = '.zip';
      } else {
        var fileFormat = '';
      }
      $(this).closest("tr").find(".asistensi").attr("accept", fileFormat);
  }).trigger("change");

  $(".remove-row").on('click', function(e) {
      var whichtr = $(this).closest("tr");
      whichtr.remove();
  });
}
defaultEventChange();

$(".add-row").on('click', function(e) {
    $("#formUploadAsistensi").each(function () {
        var tds = '<tr>';
        $.each($('tr:last td', this), function () {
            tds += '<td>' + $(this).html() + '</td>';
        });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append(tds);
        } else {
            $(this).append(tds);
        }
        var lastTr = $(this);
    });
    defaultEventChange();
});
</script>
@endpush
