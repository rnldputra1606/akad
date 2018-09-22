<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'alamat', 'kelurahan', 'kecamatan','noKTP','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lev() {
      return $this-> belongsTo('App\level','level');
    }

    public function kelurahanTinggal() {

    return  $this->belongsTo('App\kelurahan','kelurahan');
    }

    public function kecamatanTinggal() {

    return  $this->belongsTo('App\kecamatan','kecamatan');
    }


}
