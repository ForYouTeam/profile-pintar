<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\DevisiRequest;
use App\Interfaces\DevisiInterface;
use Illuminate\Http\Request;

class DevisiController extends Controller
{
    private DevisiInterface $devisiRepo;
    public function __construct(DevisiInterface $devisiRepo)
    {
        $this->devisiRepo = $devisiRepo;
    }

    public function getView()
    {
        return view('pages.Devisi');
    }

    public function getAllData()
    {
        $data = $this->devisiRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(DevisiRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "_devisi"  => $request->_devisi
        );

        $data = $this->devisiRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->devisiRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->devisiRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
