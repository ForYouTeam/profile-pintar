<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\PostinganModel;
use App\Models\ProfileModel;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $anggotaModel = new AnggotaModel;
        $data = array(
            "aboutUs"   => ProfileModel::first(),
            "postingan" => PostinganModel::take(9)->joinList()->get(),
            "anggota"   => [
                "manager"   => $anggotaModel->joinList()->where('a._jabatan', 'LIKE', '%manager%'  )->first(),
                "konsultan" => $anggotaModel->joinList()->where('a._jabatan', 'LIKE', '%konsultan%')->get(),
                "pengurus"  => $anggotaModel->joinList()->where('a._jabatan', 'LIKE', '%pengurus%' )->get(),
                "pengawas"  => $anggotaModel->joinList()->where('a._jabatan', 'LIKE', '%pengawas%' )->get(),
            ]
        );
        return view('pages.Web')->with('data', $data);
    }
}
