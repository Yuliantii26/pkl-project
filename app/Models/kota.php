<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kota','nama_kota','id_provinsi'];
    protected $table = "kotas";
    public $timestamps = true;

    public function provinsi(){
        return $this->belongsTo('App\Models\provinsi','id_provinsi');
    }
    public function kecamatan(){
        return $this->hasMany('App\Models\kecamatan','id_kota');
    }
    use HasFactory;
}