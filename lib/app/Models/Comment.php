<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'tbl_comments';
    protected $primaryKey = 'comment_id';
    protected $guarded = []; //khong co truong du lieu nao duoc bao ve, co the tuong dac duoc voi tat ca
}
