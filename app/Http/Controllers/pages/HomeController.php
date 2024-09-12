<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\PelaporanRequest;
use App\Libraries\Template;
use App\Models\Agen;
use App\Models\Marketing;
use App\Models\Pelaporan;
use App\Models\Petambak;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public $marketing;

    public function __construct()
    {
        parent::__construct();

        $this->marketing = Marketing::all();
    }

    public function index()
    {
        return Template::pages('Home', 'home', 'view');
    }

    public function agen()
    {
        $data = [
            'marketing' => $this->marketing,
        ];

        return Template::pages('Agen', 'home', 'agen', $data);
    }

    public function petambak()
    {
        $data = [
            'marketing' => $this->marketing,
        ];

        return Template::pages('Petambak', 'home', 'petambak', $data);
    }

    public function store(PelaporanRequest $request)
    {
        // dd('berhasil!', $request->all());

        DB::beginTransaction();
        try {
            // $gambar = add_picture($request->gambar, 'informasi/');

            $pelaporan              = new Pelaporan();
            $pelaporan->id_marketing = $request->id_marketing;
            $pelaporan->tgl          = date('Y-m-d');
            $pelaporan->jenis        = $request->jenis;
            $pelaporan->save();

            if ($request->jenis == 'agen') {
                $agen = new Agen();
                $agen->id_pelaporan      = $pelaporan->id_pelaporan;
                $agen->nama              = $request->nama;
                $agen->alamat            = $request->alamat;
                $agen->no_hp             = $request->no_hp;
                $agen->metode_pembayaran = $request->metode_pembayaran;
                $agen->keluhan           = $request->keluhan;
                $agen->keterangan        = $request->keterangan;
                $agen->target            = $request->target;
                $agen->market            = $request->market;
                $agen->jumlah_ton        = $request->jumlah_ton;
                $agen->brand_kompetitor  = $request->brand_kompetitor;
                $agen->harga_kompetitor  = $request->harga_kompetitor;
                $agen->save();
            } else {
                $petambak = new Petambak();
                $petambak->id_pelaporan      = $pelaporan->id_pelaporan;
                $petambak->nama              = $request->nama;
                $petambak->alamat            = $request->alamat;
                $petambak->no_hp             = $request->no_hp;
                $petambak->metode_pembayaran = $request->metode_pembayaran;
                $petambak->keluhan           = $request->keluhan;
                $petambak->keterangan        = $request->keterangan;
                $petambak->keterangan        = $request->keterangan;
                $petambak->komoditi          = $request->komoditi;
                $petambak->jumlah_kolam      = $request->jumlah_kolam;
                $petambak->luas              = $request->luas;
                $petambak->jumlah_ton        = $request->jumlah_ton;
                $petambak->pakan             = $request->pakan;
                $petambak->harga_pakan       = $request->harga_pakan;
                $petambak->jumlah_terpakai   = $request->jumlah_terpakai;
                $petambak->save();
            }

            DB::commit();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            DB::rollBack();

            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
