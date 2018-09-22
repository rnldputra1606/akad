<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\kecamatan;
use App\kelurahan;

use Carbon\Carbon;
/**
*
*/
class adminController extends Controller
{


	public function home()
	{
		return view('dashboardAdmin');
	}

	public function index()

    {
        $kecamatan = kecamatan::all();
        return view('registerKades',compact('kecamatan'));
    }

     public function getKelurahan($id) {
        $kelurahan = kelurahan::where("kecamatan",$id)->pluck("kelurahan","idKelurahan");
        return json_encode($kelurahan);
    }


public function buatKades(Request $request)
{
	$kecamatan = kecamatan::all();
	return view('registerKades',compact('kecamatan'));
}


public function insertKades(Request $request)
{

  $insert = ([
    $today = Carbon::now(),
    'created_at' => $today,
    'updated_at' => $today,
    'name' => $request->name,
    'email' => $request->email,
    'alamat' => $request->alamat,
    'kelurahan' => $request->kelurahan,
    'kecamatan' => $request->kecamatan,
    'noKTP' => $request->noKTP,
    'password' => bcrypt($request['password']),
    'level' => '2',

    ]);
  User::create($insert);
  return view ('dashboardAdmin');
}

public function profil($id)
{
  $prof= User::where('id',$id);
  return view('profilAdmin');
}


	public function updateProfil2(Request $request){

		$prof=Auth::user();
		$prof->name= $request->name;
		$prof->email= $request->email;
		$prof->kecamatan= $request->kecamatan;
		$prof->kelurahan= $request->kelurahan;
		$prof->noKTP= $request->noKTP;

  		$prof->save();
  		return view('dashboardAdmin', compact(Auth::user()->id));
	}



}
