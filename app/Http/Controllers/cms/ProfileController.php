<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Interfaces\ProfileInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private ProfileInterface $profileRepo;
    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->profileRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(ProfileRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "visi"      => $request->visi      ,
            "misi"      => $request->misi      ,
            "deskripsi" => $request->deskripsi ,
        );

        $data = $this->profileRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->profileRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->profileRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
