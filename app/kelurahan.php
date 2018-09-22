<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class kelurahan extends Model
{

    protected $table = 'kelurahan';
    protected $primaryKey = 'idKelurahan';
    protected $fillable = ['idKelurahan','kelurahan','kecamatan'];

    public function kecamatan() {

    return  $this->belongsTo('App\kecamatan','kecamatan');
    }

    public function user() {

    return  $this->hasMany('App\User');
    }
    public $timestamps = false;
}
