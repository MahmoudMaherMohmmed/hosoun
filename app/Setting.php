<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';

    protected $fillable = ['logo', 'favicon', 'paytm_enable', 'project_title', 'project_description', 'promo_text'];

    protected $casts = [
        'ipblock' => 'array'
    ];
}
