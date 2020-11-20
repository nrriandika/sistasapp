<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DetailDokumenAsistensi;
use App\FormAsistensi;
use App\FileAsistensi;
use App\SuratAsistensi;
use App\JenisPengajuan;
use App\StatusFileAsistensi;
use App\IndeksDelineasiDesa;
use Storage;
use DataTables;
use Redirect;
use Carbon\Carbon;

class AsistensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        return view('Asistensi.daftar', compact('user'));
    }

    public function permohonanAsistensi(Request $request)
    {
        $user = $request->user();
        $jenisPengajuan = JenisPengajuan::all();
        return view('Asistensi.permohonan', compact('user', 'jenisPengajuan'));
    }

    public function dokumenAsistensi(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        return view('Asistensi.dokumenasistensi', compact('user'));
    }

    public function newAsistensi(Request $request)
    {
        $user = $request->user();
        $detailDokumenAsistensi = DetailDokumenAsistensi::all();
        $formAsistensi = FormAsistensi::find($request->form_id);
        $fileAsistensi = FileAsistensi::where('id_form_asistensi', $formAsistensi->id)->get();
        $fileAsistensi = count($fileAsistensi) == 0 ? [null] : $fileAsistensi;
        $suratAsistensi = SuratAsistensi::where("form_id", $formAsistensi->id)->first();
        $jenisPengajuan = JenisPengajuan::find($suratAsistensi->id_jenis_pengajuan);
        $indeksDelineasiDesa = IndeksDelineasiDesa::where('kode_kab', $user->kode_kab)->get();
        return view('Asistensi.newasistensi', compact(
          'user',
          'detailDokumenAsistensi',
          'formAsistensi',
          'jenisPengajuan',
          'fileAsistensi',
          'indeksDelineasiDesa'
        ));
    }

    public function detilDokumen(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        $idDokumen = $request->idDokumen;
        $detailDokumenAsistensi = DetailDokumenAsistensi::find($idDokumen);
        return view('Asistensi.detildokumen', compact('user', 'idDokumen', 'detailDokumenAsistensi'));
    }

    public function detilFormAsistensi(Request $request)
    {
        $user = $request->user();
        $idForm = $request->idForm;
        $formAsistensi = FormAsistensi::find($idForm);
        $suratAsistensi = SuratAsistensi::where("form_id", $formAsistensi->id)->first();
        $jenisPengajuan = JenisPengajuan::find($suratAsistensi->id_jenis_pengajuan);
        $fileAsistensi = FileAsistensi::where("id_form_asistensi", $formAsistensi->id)
            ->join('detail_dokumen_asistensi', 'file_asistensi.id_doc_asistensi', '=', 'detail_dokumen_asistensi.id')
            ->select('*', 'file_asistensi.id as id', 'file_asistensi.name as nama_file', 'detail_dokumen_asistensi.name as jenis_dokumen')
            ->get();
        return view('Asistensi.formasistensi', compact(
            'user',
            'idForm',
            'formAsistensi',
            'fileAsistensi',
            'suratAsistensi',
            'jenisPengajuan'
        ));
    }

    public function getDokumenAsistensiData(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        $detailDokumenAsistensi = DetailDokumenAsistensi::orderBy('id', 'desc');
        return Datatables::of($detailDokumenAsistensi)
            ->addColumn('status', function ($data) {
                $active = "<i class='icofont icofont-check-circled' style='color:green;' title='Aktif'></i>";
                $unActive = "<i class='icofont icofont-close-circled' style='color:red;' title='Tidak Aktif'></i>";
                return $data->status ? $active : $unActive;
            })
            ->addColumn('action', function ($data) {
                return "<a href=" . route('detildokumen_asistensi', ['idDokumen' => $data->id]) . " class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a>" .
                "<a href='#' class='btn btn-xs btn-danger delete-dokumen' role='button' nama-dokumen='" . $data->name . "' dokumen-id='" . $data->id . "' data-toggle='modal' data-target='#deleteDokumenModal'><i class='fa fa-trash'></i> Hapus</a>";
            })
            ->addColumn('date', function ($data) {
              return date('d-m-Y, H:i:s', strtotime($data->updated_at));
            })
            ->rawColumns(['status', 'action'])
            ->make(true);


    }

    public function getAsistensiData(Request $request)
    {
        $user = $request->user();
        if(!$user->hasAnyRole(['admin','user_big'])){
          $formAsistensi = FormAsistensi::where("user_id",$user->id);
        } else {
          $formAsistensi = FormAsistensi::all();
        }
        return Datatables::of($formAsistensi)
            ->addColumn('username', function ($data) {
                return User::find($data->user_id)->name;
            })
            ->addColumn('verifikator', function ($data) {
                $verifikatorUser = User::find($data->verifikator_user_id);
                return $verifikatorUser != null ? $verifikatorUser->name : "-";
            })
            ->addColumn('status', function ($data) {
                $verified = "<i class='icofont icofont-check-circled' style='color:green;'></i> Terverifikasi";
                $unVerified = "<i class='icofont icofont-close-circled' style='color:red;'></i> Belum Diverifikasi";
                return $data->verified ? $verified : $unVerified;
            })
            ->addColumn('status_data', function ($data) {
                $statusData = "<b style='color:green;'>Seluruh Data Sudah Sesuai</b>";
                foreach($data->getAllFiles() as $fileAsistensi){
                  if(!$fileAsistensi->getStatusAndCatatan() OR $fileAsistensi->getStatusAndCatatan()->status == false){
                    $statusData = "<b style='color:red;'>Masih ada data yang belum sesuai</b>";
                  }
                };
                return $statusData;
            })
            ->addColumn('action', function ($data) {
                return "<a href='" . route('pengajuan_asistensi', ["form_id" => $data->id]) . "' class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a><br>" .
                "<a href='" . route('detil_formasistensi', ["idForm" => $data->id]) . "' class='btn btn-xs btn-info' role='button'><i class='fa fa-eye'></i> Lihat</a><br>" .
                "<a href='#' class='btn btn-xs btn-danger delete-asistensi' role='button' nama-asistensi='" . $data->name . "' asistensi-id='" . $data->id . "' data-toggle='modal' data-target='#deleteAsistensiModal'><i class='fa fa-trash'></i> Hapus</a>";
            })
            ->addColumn('date', function ($data) {
              return date('d-m-Y, H:i:s', strtotime($data->updated_at));
            })
            ->rawColumns(['status', 'status_data', 'action'])
            ->make(true);
    }

    public function saveAsistensi(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'form_id' => 'required'
        ]);

        $allFiles = $request->all();
        $name = $request->input("name");
        $description = $request->input("description");

        $formAsistensi = FormAsistensi::find($request->form_id);
        $formAsistensi->user_id =  $user->id;
        $formAsistensi->name = $name;
        $formAsistensi->description = $description;
        $formAsistensi->save();

        foreach($allFiles['jenis_detail_dokumen'] as $key => $id_doc){
            if(isset($allFiles['idFileAsistensi'][$key])){
              $fileAsistensi = FileAsistensi::find($allFiles['idFileAsistensi'][$key]);
            } else {
              $fileAsistensi = new FileAsistensi;
            }
            $fileAsistensi->id_form_asistensi = $formAsistensi->id;
            $fileAsistensi->id_doc_asistensi = $id_doc;
            $fileAsistensi->name = $allFiles['nama_dokumen'][$key];
            $fileAsistensi->catatan = $allFiles['catatan'][$key];
            $fileAsistensi->indeks_desa_id = $allFiles['indeks_desa_id'][$key];
            if(isset($allFiles['asistensi'][$key])){
              $file = $allFiles['asistensi'][$key];
              $fileName = $file->getClientOriginalName();
              $fileAsistensi->file_name = $fileName;
              $storageFile = 'dokumenasistensi/'.$formAsistensi->id.'/'.$fileName;
              Storage::disk('uploads')->put($storageFile, file_get_contents($file));
              $fileAsistensi->file_path = asset('uploads/'. $storageFile);
            }
            $fileAsistensi->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $fileAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $fileAsistensi->save();
        }
        return redirect()->route('daftar_asistensi');
    }

    public function saveAsistensiDokumen(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        $this->validate($request, [
            'name' => 'required|string',
            'format' => 'required|string',
        ]);
        if(isset($request->idDokumen)){
          $detailDokumenAsistensi = DetailDokumenAsistensi::find($request->idDokumen);
          $detailDokumenAsistensi->name = $request->name;
          $detailDokumenAsistensi->description = $request->description;
          $detailDokumenAsistensi->format = $request->format;
          $detailDokumenAsistensi->status = isset($request->status) ? 1 : 0;
          $detailDokumenAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $detailDokumenAsistensi->save();
        } else {
          $detailDokumenAsistensi = new DetailDokumenAsistensi;
          $detailDokumenAsistensi->name = $request->name;
          $detailDokumenAsistensi->description = $request->description;
          $detailDokumenAsistensi->format = $request->format;
          $detailDokumenAsistensi->status = isset($request->status) ? 1 : 0;
          $detailDokumenAsistensi->created_at = Carbon::now()->format('Y-m-d H:i:s');
          $detailDokumenAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $detailDokumenAsistensi->save();
        };

        return redirect()->route('dokumen_asistensi');
    }

    public function uploadPermohonanAsistensi(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'surat_permohonan' => 'required|mimes:pdf',
            'jenis_pengajuan' => 'required|string'
        ]);
        $surat_permohonan = $request->surat_permohonan;
        if($surat_permohonan) {
          $formAsistensi = new FormAsistensi;
          $formAsistensi->user_id =  $user->id;
          $formAsistensi->name = '';
          $formAsistensi->save();
          $suratAsistensi = new SuratAsistensi;
          $suratAsistensi->form_id = $formAsistensi->id;
          $suratAsistensi->status = false;
          $fileExt = $surat_permohonan->getClientOriginalExtension();
          $suratAsistensi->file_name = 'surat_permohonan_' . $formAsistensi->id . '.' . $fileExt;
          $storageFile = 'surat_permohonan/' . $suratAsistensi->file_name;
          Storage::disk('uploads')->put($storageFile, file_get_contents($surat_permohonan));
          $suratAsistensi->file_path = asset('uploads/'. $storageFile);
          $jenisPengajuan = JenisPengajuan::where('id', $request->jenis_pengajuan)->first();
          $suratAsistensi->id_jenis_pengajuan = $jenisPengajuan->id;
          $suratAsistensi->created_at = Carbon::now()->format('Y-m-d H:i:s');
          $suratAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $suratAsistensi->save();
        }
        return redirect()->route('pengajuan_asistensi', ['form_id' => $formAsistensi->id]);
    }

    public function deleteAsistensiDokumen(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $detailDokumenAsistensi = DetailDokumenAsistensi::find($request->dokumenId);
      dd($detailDokumenAsistensi);
    }

    public function deleteAsistensiForm(Request $request)
    {
      $user = $request->user();
      $formAsistensi = FormAsistensi::find($request->formId);
      dd($formAsistensi);
    }

    public function verifyAsistensi(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      if($request->is_verifying == "true"){
        $formAsistensi = FormAsistensi::find($request->idForm);
        $formAsistensi->verified = true;
        $formAsistensi->verifikator_user_id = $user->id;
        $formAsistensi->save();
      } else {
        $formAsistensi = FormAsistensi::find($request->idForm);
        $formAsistensi->verified = false;
        $formAsistensi->verifikator_user_id = $user->id;
        $formAsistensi->save();
      }
      return redirect()->route('daftar_asistensi');
    }

    public function verifyStatusFile(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $statusFileAsistensi = StatusFileAsistensi::where('file_asistensi_id', $request->id_file)->first();
      if(isset($statusFileAsistensi)){
        $statusFileAsistensi->checker_id = $user->id;
        $statusFileAsistensi->status = $request->status_file == 'sudah_sesuai' ? true : false;
        $statusFileAsistensi->catatan = $request->note_file;
        $statusFileAsistensi->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $statusFileAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $statusFileAsistensi->save();
      } else {
        $statusFileAsistensi = new StatusFileAsistensi;
        $statusFileAsistensi->file_asistensi_id = $request->id_file;
        $statusFileAsistensi->checker_id = $user->id;
        $statusFileAsistensi->status = $request->status_file == 'sudah_sesuai' ? true : false;
        $statusFileAsistensi->catatan = $request->note_file;
        $statusFileAsistensi->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $statusFileAsistensi->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $statusFileAsistensi->save();
      }
      return redirect()->route('detil_formasistensi', ["idForm" => $request->idForm]);

    }

    public function approveRequestAsistensi(Request $request)
    {
      $user = $request->user();
      if(isset($request->requestId)){
        $suratAsistensi = UserAsistensi::find($request->requestId);
        $suratAsistensi->status = $suratAsistensi->status == true ? false : true;
        $suratAsistensi->save();
      }
      return redirect()->route('daftar_pemohon_asistensi');
    }

}
