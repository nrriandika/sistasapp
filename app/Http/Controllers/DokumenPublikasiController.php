<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DokumenPublikasi;
use Storage;
use DataTables;
use Redirect;
use Carbon\Carbon;

class DokumenPublikasiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
      $user = $request->user();
      return view('DokumenPublikasi.daftar', compact('user'));
  }

  public function uploadPublikasi(Request $request)
  {
      $user = $request->user();
      $dokumenPublikasi = DokumenPublikasi::find($request->publikasi_id);
      return view('DokumenPublikasi.uploadpublikasi', compact('user', 'dokumenPublikasi'));
  }

  public function savePublikasi(Request $request)
  {
      $user = $request->user();
      $this->validate($request, [
          'name' => 'required|string',
      ]);

      $name = $request->input("name");
      $keterangan = $request->input("keterangan");
      $active = $request->input("active");
      $dokumen_publikasi = $request->dokumen_publikasi;

      $dokumenPublikasi = DokumenPublikasi::find($request->publikasi_id);
      if($dokumenPublikasi){
        $dokumenPublikasi->nama = $name;
        $dokumenPublikasi->keterangan = $keterangan;
        $dokumenPublikasi->active = $active == 'on' ? true : false;
        # Save PDF
        if(isset($dokumen_publikasi)){
          $fileNamePdf = $dokumen_publikasi->getClientOriginalName();
          $storageFilePdf = 'publikasi/'.$dokumenPublikasi->id.'/'.$fileNamePdf;
          Storage::disk('uploads')->put($storageFilePdf, file_get_contents($dokumen_publikasi));
          $dokumenPublikasi->path_dokumen = asset('uploads/'. $storageFilePdf);
          # Save Peraturan
          $dokumenPublikasi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $dokumenPublikasi->save();
        }
      } else {
        $dokumenPublikasi = new DokumenPublikasi;
        $dokumenPublikasi->user_id =  $user->id;
        $dokumenPublikasi->nama = $name;
        $dokumenPublikasi->keterangan = $keterangan;
        $dokumenPublikasi->active = $active == 'on' ? true : false;
        # Save PDF
        $fileNamePdf = $dokumen_publikasi->getClientOriginalName();
        $storageFilePdf = 'publikasi/'.$dokumenPublikasi->id.'/'.$fileNamePdf;
        Storage::disk('uploads')->put($storageFilePdf, file_get_contents($dokumen_publikasi));
        $dokumenPublikasi->path_dokumen = asset('uploads/'. $storageFilePdf);
        # Save
        $dokumenPublikasi->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $dokumenPublikasi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $dokumenPublikasi->save();

      }
      return redirect()->route('daftar_publikasi');
  }

  public function getPublikasiData(Request $request)
  {
      $user = $request->user();
      if($user->hasAnyRole(['user_daerah'])){
        $peraturanBupatiWalikota = DokumenPublikasi::where("user_id",$user->id);
      } else {
        $peraturanBupatiWalikota = DokumenPublikasi::all();
      }
      return Datatables::of($peraturanBupatiWalikota)
          ->addColumn('username', function ($data) {
              return User::find($data->user_id)->name;
          })
          ->addColumn('date', function ($data) {
            return date('d-m-Y, H:i:s', strtotime($data->updated_at));
          })
          ->addColumn('link_pdf', function ($data){
            return "<a href='$data->path_dokumen' target='_blank' class='btn btn-xs btn-danger' role='button'><i class='fa fa-eye'></i> Lihat Dokumen</a>";
          })
          ->addColumn('status', function ($data) {
              $actived = "<i class='icofont icofont-check-circled' style='color:green;'></i> Aktif";
              $unactived = "<i class='icofont icofont-close-circled' style='color:red;'></i> Tidak Aktif";
              return $data->active ? $actived : $unactived;
          })
          ->addColumn('action', function ($data) {
             return "<a href='" . route('upload_publikasi', ["publikasi_id" => $data->id]) . "' class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a><br>" .
             "<a href='" . route('detail_publikasi', ["publikasi_id" => $data->id]) . "' class='btn btn-xs btn-info' role='button'><i class='fa fa-eye'></i> Lihat</a><br>" .
             "<a href='#' class='btn btn-xs btn-danger delete-publikasi' role='button' nama-publikasi='" . $data->nama . "' publikasi-id='" . $data->id . "' data-toggle='modal' data-target='#deletePublikasiModal'><i class='fa fa-trash'></i> Hapus</a>";
          })
          ->rawColumns(['action', 'link_pdf', 'status', 'date'])
          ->make(true);
  }
}
