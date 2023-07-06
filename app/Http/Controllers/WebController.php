<?php

namespace App\Http\Controllers;

use App\Models\PostinganModel;
use App\Models\ProfileModel;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $data = array(
            "aboutUs" => ProfileModel::first(),
            "postingan" => PostinganModel::take(9)->joinList()->get()
        );
        return view('pages.Web')->with('data', $data);
    }
}
