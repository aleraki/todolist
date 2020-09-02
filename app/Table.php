<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = [
        'id', 'content', 'status','due_date','create_at','updated_at'
    ];
}
