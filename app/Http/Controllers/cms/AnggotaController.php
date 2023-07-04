<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnggotaRequest;
use App\Interfaces\AnggotaInterface;
use App\Interfaces\DevisiInterface;
use App\Interfaces\JabatanInterface;
use App\Interfaces\SektorInterface;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    private AnggotaInterface $anggotaRepo;
    private JabatanInterface $jabatanRepo;
    private DevisiInterface $devisiRepo;
    private SektorInterface $sektorRepo;
    public function __construct(AnggotaInterface $anggotaRepo, JabatanInterface $jabatanRepo, DevisiInterface $devisiRepo, SektorInterface $sektorRepo)
    {
        $this->anggotaRepo = $anggotaRepo;
        $this->jabatanRepo = $jabatanRepo;
        $this->devisiRepo = $devisiRepo;
        $this->sektorRepo = $sektorRepo;
    }

    public function getView()
    {
        $anggota = $this->anggotaRepo->getAllPayload([]);
        $jabatan = $this->jabatanRepo->getAllPayload([]);
        $devisi = $this->devisiRepo->getAllPayload([]);
        $sektor = $this->sektorRepo->getAllPayload([]);
        return view('pages.Anggota')->with([
            'anggota' => $anggota['data'],
            'jabatan' => $jabatan['data'],
            'devisi' => $devisi['data'],
            'sektor' => $sektor['data'],
        ]);
    }

    public function getAllData()
    {
        $data = $this->anggotaRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(AnggotaRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "nama"       => $request->nama,
            "sex"        => $request->sex,
            "agama"      => $request->agama,
            "alamat"     => $request->alamat,
            "telepon"    => $request->telepon,
            "jabatan_id" => $request->jabatan_id,
            "devisi_id"  => $request->devisi_id,
            "sektor_id"  => $request->sektor_id,
        );

        $data = $this->anggotaRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->anggotaRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->anggotaRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
