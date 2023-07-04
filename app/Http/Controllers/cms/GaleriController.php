<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Interfaces\GaleriInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    private GaleriInterface $galeriRepo;
    public function __construct(GaleriInterface $galeriRepo)
    {
        $this->galeriRepo = $galeriRepo;
    }

    public function getView()
    {
        $data = $this->galeriRepo->getAllPayload([]);
        return view('pages.Galeri')->with('data', $data['data']);
    }

    public function getAllData()
    {
        $data = $this->galeriRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(GaleriRequest $request)
    {
        $date = Carbon::now();
        $fileUpload = $request->file('path');
        $nameFile = 'photo' . '_'. $date . '.' . $fileUpload->getClientOriginalExtension();

        $data = $request->except('_token');
        $data['path'] = $nameFile;

        $id = $request->id | null;
        $payload = $this->galeriRepo->upsertPayload($id, $data);

        if ($payload) {

            $filePath = public_path('storage/gambar/');
            $fileUpload->move($filePath, $nameFile);
        }

        return response()->json($payload, $payload['code']);
    }

    public function getDataById($id)
    {
        $data = $this->galeriRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->galeriRepo->getPayloadById($id);
		$payload = $this->galeriRepo->deletePayload($id);
		$foto = $data['data']['path'];

		File::delete(public_path('storage/gambar/' . $foto));

		return response()->json($payload, $payload['code']);
    }
}
