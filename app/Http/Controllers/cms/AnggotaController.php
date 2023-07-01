<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnggotaRequest;
use App\Interfaces\AnggotaInterface;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    private AnggotaInterface $anggotaRepo;
    public function __construct(AnggotaInterface $anggotaRepo)
    {
        $this->anggotaRepo = $anggotaRepo;
    }

    public function getView()
    {

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
            "nama"       => $request->nama      ,
            "sex"        => $request->sex       ,
            "agama"      => $request->agama     ,
            "alamat"     => $request->alamat    ,
            "telepon"    => $request->telepon   ,
            "jabatan_id" => $request->jabatan_id,
            "devisi_id"  => $request->devisi_id ,
            "sektor_id"  => $request->sektor_id ,
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
