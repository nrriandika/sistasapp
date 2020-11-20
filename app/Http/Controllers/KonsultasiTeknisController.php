<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KonsultasiTeknis;
use App\PembimbingTeknis;
use App\KonsultasiTeknisPembimbingTeknis;
use Storage;
use DataTables;
use Redirect;
use Carbon\Carbon;

class KonsultasiTeknisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        return view('KonsultasiTeknis.daftar', compact('user'));
    }

    public function getKonsultasiTeknisData(Request $request)
    {
        $user = $request->user();
        if(!$user->hasAnyRole(['admin','user_big'])){
          $konsultasiTeknis = KonsultasiTeknis::where("submitter_id",$user->id);
        } else {
          $konsultasiTeknis = KonsultasiTeknis::all();
        }
        return Datatables::of($konsultasiTeknis)
            ->addColumn('username', function ($data) {
                return User::find($data->submitter_id)->name;
            })
            ->addColumn('verifikator', function ($data) {
                $verifikatorUser = User::find($data->verifikator_id);
                return $verifikatorUser != null ? $verifikatorUser->name : "-";
            })
            ->addColumn('pembimbing', function ($data) {
                $pembimbingList = $data->getAllSupervisors();
                $contentList = "<ul>";
                foreach($pembimbingList as $pembimbing){
                  $contentList = $contentList . "<li>" . $pembimbing->nama . "</li>";
                }
                $contentList = $contentList . "<ul>";
                return !$pembimbingList->isEmpty() != null ? $contentList : "-";
            })
            ->addColumn('status', function ($data) {
                $verified = "<i class='icofont icofont-check-circled' style='color:green;'></i> Disetujui";
                $unVerified = "<i class='icofont icofont-close-circled' style='color:red;'></i> Belum Disetujui";
                return $data->status ? $verified : $unVerified;
            })
            ->addColumn('action', function ($data) {
                return "<a href='" . route('pengajuan_konsultasiteknis', ["konsultasi_id" => $data->id]) . "' class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a><br>" .
                "<a href='" . route('detil_konsultasiteknis', ["konsultasi_id" => $data->id]) . "' class='btn btn-xs btn-info' role='button'><i class='fa fa-eye'></i> Lihat</a><br>" .
                "<a href='#' class='btn btn-xs btn-danger delete-konsultasi' role='button' nama-konsultasi='" . $data->judul . "' konsultasi-id='" . $data->id . "' data-toggle='modal' data-target='#deleteKonsultasiModal'><i class='fa fa-trash'></i> Hapus</a>";
            })
            ->addColumn('date', function ($data) {
              return date('d-m-Y, H:i:s', strtotime($data->updated_at));
            })
            ->editColumn('tanggal', function ($data) {
              return date('d-m-Y, H:i:s A', strtotime($data->tanggal));
            })
            ->rawColumns(['status', 'action', 'pembimbing'])
            ->make(true);
    }

    public function pengajuanKonsultasiTeknis(Request $request)
    {
      $user = $request->user();
      if(isset($request->konsultasi_id)){
        $konsultasiTeknis = KonsultasiTeknis::find($request->konsultasi_id);
      } else {
        $konsultasiTeknis = null;
      }
      return view('KonsultasiTeknis.pengajuan', compact('user', 'konsultasiTeknis'));
    }

    public function detilKonsultasiTeknis(Request $request)
    {
      $user = $request->user();
      if(isset($request->konsultasi_id)){
        $konsultasiTeknis = KonsultasiTeknis::find($request->konsultasi_id);
      } else {
        $konsultasiTeknis = null;
      }
      $pembimbingTeknis = PembimbingTeknis::all();
      return view('KonsultasiTeknis.view', compact('user', 'konsultasiTeknis', 'pembimbingTeknis'));
    }

    public function unggahDokumenNotulensi(Request $request)
    {
      $user = $request->user();
      if(isset($request->konsultasi_id)){
        $konsultasiTeknis = KonsultasiTeknis::find($request->konsultasi_id);
      } else {
        $konsultasiTeknis = null;
      }
      return view('KonsultasiTeknis.dokumennotulensi', compact('user', 'konsultasiTeknis'));
    }

    public function saveKonsultasiTeknis(Request $request)
    {
      $user = $request->user();
      $this->validate($request, [
          'judul' => 'required|string',
          'tanggal' => 'required|date',
      ]);

      $judul = $request->input("judul");
      $keterangan = $request->input("keterangan");
      $tanggal = date('d-m-Y h:i:s A', strtotime($request->input("tanggal")));
      $konsultasi_id = $request->input("konsultasi_id");

      if(isset($konsultasi_id)){
        $konsultasiTeknis = KonsultasiTeknis::find($konsultasi_id);
        $konsultasiTeknis->judul = $judul;
        $konsultasiTeknis->keterangan = $keterangan;
        $konsultasiTeknis->tanggal = $tanggal;
        $konsultasiTeknis->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->save();
      } else {
        $konsultasiTeknis = new KonsultasiTeknis;
        $konsultasiTeknis->submitter_id = $user->id;
        $konsultasiTeknis->judul = $judul;
        $konsultasiTeknis->keterangan = $keterangan;
        $konsultasiTeknis->tanggal = $tanggal;
        $konsultasiTeknis->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->save();
      }

      return redirect()->route('detil_konsultasiteknis', ["konsultasi_id" => $konsultasiTeknis->id]);
    }

    public function deleteKonsultasiTeknis(Request $request)
    {
      $user = $request->user();
      $detailKonsultasiTeknis = KonsultasiTeknis::find($request->konsultasiId);
      dd($detailKonsultasiTeknis);
    }

    public function approveKonsultasiTeknis(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $this->validate($request, [
          'tautanOnlineMeeting' => 'required|string',
          'pembimbingOnlineMeeting' => 'required',
      ]);

      $tautanOnlineMeeting = $request->input("tautanOnlineMeeting");
      $passwordOnlineMeeting = $request->input("passwordOnlineMeeting");
      $pembimbingOnlineMeeting = $request->input("pembimbingOnlineMeeting");
      $konsultasi_id = $request->input("konsultasi_id");

      $konsultasiTeknis = KonsultasiTeknis::find($konsultasi_id);
      $konsultasiTeknis->verifikator_id = $user->id;
      $konsultasiTeknis->status = true;
      $konsultasiTeknis->room_url = $tautanOnlineMeeting;
      $konsultasiTeknis->room_password = $passwordOnlineMeeting;
      $konsultasiTeknisPembimbingTeknis = KonsultasiTeknisPembimbingTeknis::where(
        "konsultasi_teknis_id", $konsultasiTeknis->id
      )->delete();
      foreach($pembimbingOnlineMeeting as $pembimbingId){
          $konsultasiTeknisPembimbingTeknis = new KonsultasiTeknisPembimbingTeknis;
          $konsultasiTeknisPembimbingTeknis->konsultasi_teknis_id = $konsultasiTeknis->id;
          $konsultasiTeknisPembimbingTeknis->pembimbing_teknis_id = $pembimbingId;
          $konsultasiTeknisPembimbingTeknis->save();
      };
      $konsultasiTeknis->created_at = Carbon::now()->format('Y-m-d H:i:s');
      $konsultasiTeknis->updated_at = Carbon::now()->format('Y-m-d H:i:s');
      $konsultasiTeknis->save();

      return redirect()->route('detil_konsultasiteknis', ["konsultasi_id" => $konsultasiTeknis->id]);
    }

    public function saveDokumenNotulensi(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $this->validate($request, [
          'dokumen_notulensi' => 'required'
      ]);

      $dokumen_notulensi = $request->dokumen_notulensi;
      $konsultasi_id = $request->input("konsultasi_id");

      $konsultasiTeknis = KonsultasiTeknis::find($konsultasi_id);
      $fileExt = $dokumen_notulensi->getClientOriginalExtension();
      $konsultasiTeknis->dokumen_notulensi_format = $fileExt;
      $file_name = 'dokumen_notulensi' . $konsultasi_id . '.' . $fileExt;
      $storageFile = 'dokumen_notulensi/' . $file_name;
      Storage::disk('uploads')->put($storageFile, file_get_contents($dokumen_notulensi));
      $konsultasiTeknis->dokumen_notulensi = asset('uploads/'. $storageFile);
      $konsultasiTeknis->save();

      return redirect()->route('detil_konsultasiteknis', ["konsultasi_id" => $konsultasiTeknis->id]);
    }

    public function jadwalKonsultasiTeknis(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        return view('KonsultasiTeknis.jadwal', compact('user'));
    }

    public function daftarPembimbing(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      return view('KonsultasiTeknis.daftarpembimbing', compact('user'));
    }

    public function formPembimbing(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      if(isset($request->pembimbing_id)){
        $pembimbingTeknis = PembimbingTeknis::find($request->pembimbing_id);
      } else {
        $pembimbingTeknis = null;
      }
      return view('KonsultasiTeknis.formpembimbing', compact('user', 'pembimbingTeknis'));
    }

    public function saveFormPembimbing(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $this->validate($request, [
          'nama' => 'required|string',
      ]);

      $nama = $request->input("nama");
      $posisi = $request->input("posisi");
      $instansi = $request->input("instansi");
      $keterangan = $request->input("keterangan");
      $pembimbing_id = $request->input("pembimbing_id");

      if(isset($pembimbing_id)){
        $konsultasiTeknis = PembimbingTeknis::find($pembimbing_id);
        $konsultasiTeknis->nama = $nama;
        $konsultasiTeknis->posisi = $posisi;
        $konsultasiTeknis->instansi = $instansi;
        $konsultasiTeknis->keterangan = $keterangan;
        $konsultasiTeknis->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->save();
      } else {
        $konsultasiTeknis = new PembimbingTeknis;
        $konsultasiTeknis->nama = $nama;
        $konsultasiTeknis->posisi = $posisi;
        $konsultasiTeknis->instansi = $instansi;
        $konsultasiTeknis->keterangan = $keterangan;
        $konsultasiTeknis->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $konsultasiTeknis->save();
      }

      return redirect()->route('daftar_pembimbing');
    }

    public function deletePembimbingTeknis(Request $request)
    {
      $user = $request->user();
      $user->authorizeRoles(['admin', 'user_big']);
      $detailPembimbing = PembimbingTeknis::find($request->pembimbingId);
      dd($detailPembimbing);
    }

    public function getPembimbingTeknisData(Request $request)
    {
        $user = $request->user();
        $user->authorizeRoles(['admin', 'user_big']);
        $pembimbingTeknis = PembimbingTeknis::all();

        return Datatables::of($pembimbingTeknis)
            ->addColumn('nama', function ($data) {
                return $data->nama;
            })
            ->addColumn('posisi', function ($data) {
                return isset($data->posisi) ? $data->posisi : "-";
            })
            ->addColumn('instansi', function ($data) {
                return isset($data->instansi) ? $data->instansi : "-";
            })
            ->addColumn('action', function ($data) {
                return "<a href='" . route('form_pembimbing', ["pembimbing_id" => $data->id]) . "' class='btn btn-xs btn-primary' role='button'><i class='fa fa-gear'></i> Sunting</a><br>" .
                "<a href='#' class='btn btn-xs btn-danger delete-pembimbing' role='button' nama-pembimbing='" . $data->nama . "' pembimbing-id='" . $data->id . "' data-toggle='modal' data-target='#deletePembimbingModal'><i class='fa fa-trash'></i> Hapus</a>";
            })
            ->addColumn('date', function ($data) {
              return date('d-m-Y, H:i:s', strtotime($data->updated_at));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
