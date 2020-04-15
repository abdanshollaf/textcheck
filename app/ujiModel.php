<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujiModel extends Model
{
    protected $table = 'tbl_proses';
    protected $fillable = ['status','tokens','filter','stem','hasil'];
}
