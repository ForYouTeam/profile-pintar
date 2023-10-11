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
	public function getPostCount()
	{
		$komentarModel = new KomentarModel;
		$data = PostinganModel::take(5)->orderBy('created_at', "DESC")->select('id', 'judul')->get();
		$koment = [];
		foreach ($data as $value) {
		  $countKoment = $komentarModel->where('postingan_id', $value['id'])->get()->count();
			array_push($koment, [
				'judul'  => $value['judul'],
				'koment' => $countKoment
			]);
		}
		return response()->json($koment, 200);
	}
    
    
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
