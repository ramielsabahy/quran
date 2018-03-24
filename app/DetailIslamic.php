<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailIslamic extends Model
{
    protected $table = 'detail_islamics';
    protected $fillable = ['text','language'];
}
