<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\KomentarRequest;
use App\Interfaces\KomentarInterface;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    private KomentarInterface $komentarRepo;
    public function __construct(KomentarInterface $komentarRepo)
    {
        $this->komentarRepo = $komentarRepo;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->komentarRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(KomentarRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "_jabatan"  => $request->_jabatan ,
            "deskripsi" => $request->deskripsi
        );

        $data = $this->komentarRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->komentarRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->komentarRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
