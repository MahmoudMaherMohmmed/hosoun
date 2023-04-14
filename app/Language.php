<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use SoftDeletes;
    
	protected $table = 'languages';
	
    protected $fillable = [
    	'local',
    	'name',
    	'def'
    ];
}
