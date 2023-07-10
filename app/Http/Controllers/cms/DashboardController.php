<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\AnggotaModel;
use App\Models\KomentarModel;
use App\Models\PostinganModel;
use App\Models\SektorModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    
    public function getView()
    {
        $data = [
            'anggota'   => AnggotaModel  ::count(),
            'postingan' => PostinganModel::count(),
            'komentar'  => KomentarModel ::count(),
            'sektor'    => SektorModel   ::count(),
        ];
        return view('pages.Dashboard')->with('data', $data);
    }
}
