<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'tbl_categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = []; //khong co truong du lieu nao duoc bao ve, co the tuong dac duoc voi tat ca
}
