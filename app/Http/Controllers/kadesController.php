<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

use Carbon\Carbon;

class kadesController extends Controller
{
  public function home()
  {
    return view('dashboardKades');
  }

    public function profil($id)
    {
      $prof= User::where('id',$id);
      return view('profilKades');
    }


    	public function updateProfil1(Request $request){

    		$prof=Auth::user();
    		$prof->name= $request->name;
    		$prof->email= $request->email;
    		$prof->kecamatan= $request->kecamatan;
    		$prof->kelurahan= $request->kelurahan;
    		$prof->noKTP= $request->noKTP;

      		$prof->save();
      		return view('dashboardKades', compact(Auth::user()->id));
    	}

}
