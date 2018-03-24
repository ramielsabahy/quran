<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastIslamic extends Model
{
	protected $table = 'fast_islamics';
    protected $fillable = ['text','language'];
}
