<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Interfaces\GaleriInterface;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    private GaleriInterface $galeriRepo;
    public function __construct(GaleriInterface $galeriRepo)
    {
        $this->galeriRepo = $galeriRepo;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->galeriRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(GaleriRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "path"  => $request->path
        );

        $data = $this->galeriRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->galeriRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->galeriRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
