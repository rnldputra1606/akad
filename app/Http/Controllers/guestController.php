<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\kecamatan;
use App\kelurahan;


use Carbon\Carbon;
/**
*
*/
class guestController extends Controller
{

  public function home()
  {
    return view('dashboardGuest');
  }



public function profil($id)
{
  $prof= User::where('id',$id);
  return view('profilGuest');
}


	public function updateProfil(Request $request){

		$prof=Auth::user();
		$prof->name= $request->name;
		$prof->email= $request->email;
		$prof->kecamatan= $request->kecamatan;
		$prof->kelurahan= $request->kelurahan;
		$prof->noKTP= $request->noKTP;

  		$prof->save();
  		return view('dashboardGuest', compact(Auth::user()->id));
	}
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|string|max:50',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'alamat'=> 'required|string|max:80',
          'kecamatan'=> 'required',
          'kelurahan'=> 'required',
          'noKTP'=> 'required|string|max:16',


      ]);
  }


  protected function create(array $data)
  {
      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'alamat' => $data['alamat'],
          'kelurahan' => $data['kelurahan'],
          'kecamatan' => $data['kecamatan'],
          'noKTP' => $data['noKTP'],
          'level' => '3',
      ]);
  }

  public function getRegister()
{
  $kecamatan=kecamatan::all();
  return view('auth.register',compact('kecamatan'));
}



public function getKelurahan($id) {
 $kelurahan = kelurahan::where("kecamatan",$id)->pluck("kelurahan","idKelurahan");
 return json_encode($kelurahan);
}



}
