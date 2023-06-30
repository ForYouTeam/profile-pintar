<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostinganRequest;
use App\Interfaces\GaleriInterface;
use App\Interfaces\PostinganInterface;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    private PostinganInterface $postinganRepo;
    private GaleriInterface $galeriRepo;

    public function __construct(PostinganInterface $postinganRepo, GaleriInterface $galeriRepo)
    {
        $this->postinganRepo = $postinganRepo;
        $this->galeriRepo    = $galeriRepo   ;
    }

    public function getView()
    {

    }

    public function getAllData()
    {
        $data = $this->postinganRepo->getAllPayload([]);
        return response()->json($data, $data['code']);
    }

    public function upsertData(PostinganRequest $request)
    {
        $galeriId = $request->galeri_id | null;
        $path = array(
            'path' => $request->path
        );

        $galeri = $this->galeriRepo->upsertPayload($galeriId, $path);
        if ($galeri['code'] != 200) {
            return response()->json($galeri, $galeri['code']);
        } else {

            if (is_object($galeri['data'])) {
                $galeriId = $galeri['data']['id'];
            } else {
                $galeriId = $request->galeri_id;
            }
        }

        // POSTINGAN FUNCTION
        $id = $request->id | null;

        $payload = array(
            "judul"     => $request ->judul   ,
            "kontent"   => $request ->kontent ,
            "galeri_id" => $galeriId          ,
            "penulis"   => $request ->penulis ,
        );

        $data = $this->postinganRepo->upsertPayload($id, $payload);
        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->postinganRepo->getPayloadById($id);
        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $galeriId = $this->postinganRepo->getPayloadById($id);

        if ($galeriId['code'] != 200) {
            return response()->json($galeriId, $galeriId['code']);
        }

        $data = $this->postinganRepo->deletePayload($id);
        
        $galeri = $this->galeriRepo->deletePayload($galeriId['data']['galeri_id']);
        if ($galeri['code'] != 200) {
            return response()->json($galeri, $galeri['code']);
        }

        return response()->json($data, $data['code']);
    }
}
