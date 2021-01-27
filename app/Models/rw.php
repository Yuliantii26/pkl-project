<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;
    protected $fillable = ['nama_rw','id_kel'];
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo('App/Models/rw','id_prov');
    }
    public function tracking(){
        return $this->hasMany('App/Models/rw','id_prov');
    }
}
