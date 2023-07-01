<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\SektorRequest;
use App\Interfaces\SektorInterface;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    private SektorInterface $sektorRepo;
    public function __construct(SektorInterface $sektorRepo)
    {
        $this->sektorRepo = $sektorRepo;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->sektorRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(SektorRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "_sektor"   => $request->_sektor   ,
            "alamat"    => $request->alamat    ,
            "kontak"    => $request->kontak    ,
            "didirikan" => $request->didirikan ,
        );

        $data = $this->sektorRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->sektorRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->sektorRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
