<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{	public $timestamps = false;
    protected $table='loaitin';
	protected $primaryKey='idLT';
	protected $fillable = [
        'idLT',
        'Ten',
        'ThuTu',
        'AnHien',
        'lang',
        'idTL'       
    ];

}
