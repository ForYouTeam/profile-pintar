<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Interfaces\JabatanInterface;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    private JabatanInterface $jabatanRepo;
    public function __construct(JabatanInterface $jabatanRepo)
    {
        $this->jabatanRepo = $jabatanRepo;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->jabatanRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(Request $request)
    {
        $id = $request->id | null;

        $payload = array(
            "_jabatan"  => $request->_jabatan ,
            "deskripsi" => $request->deskripsi
        );

        $data = $this->jabatanRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->jabatanRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->jabatanRepo->deletePayload($id);
        return response()->json($data, $data['code']);
    }
}
