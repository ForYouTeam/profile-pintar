<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\KomentarRequest;
use App\Interfaces\KomentarInterface;
use App\Interfaces\PostinganInterface;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    private KomentarInterface $komentarRepo;
    private PostinganInterface $postinganRepo;
    public function __construct(KomentarInterface $komentarRepo, PostinganInterface $postinganRepo)
    {
        $this->komentarRepo  = $komentarRepo ;
        $this->postinganRepo = $postinganRepo;
    }

    public function getView()
    {
        $data = array(
            'postingan' => $this->postinganRepo->getAllPayload([])['data']
        );

        return view('pages.Komentar')->with('data', $data);
    }

    public function getAllData()
    {
        $params = array(
            'postingan_id' => request('postingan_id')
        );

        $data = $this->komentarRepo->getAllPayload($params);
        return response()->json($data, $data['code']);
    }

    public function upsertData(KomentarRequest $request)
    {
        $id = $request->id | null;

        $payload = array(
            "postingan_id" => $request ->postingan_id ,
            "alias"        => $request ->alias        ,
            "_komentar"    => $request ->_komentar    ,
            "asal"         => $request ->asal         ,
            "mac_address"  => $request ->mac_address  ,
            "tag"          => $request ->tag          ,
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
