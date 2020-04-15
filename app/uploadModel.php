<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uploadModel extends Model
{
    protected $table =   'tbl_jurnal';
    protected $fillable = ['id','penulis','judul','abstrak','namafile','path'];
}
