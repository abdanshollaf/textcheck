<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monitoringModel extends Model
{
    protected $table =   'tbl_uji';
    protected $fillable = ['id','abstrak','katasalah','koreksi','created_at','update_at'];
}