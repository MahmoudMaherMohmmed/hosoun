<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReligiousPath extends Model
{
    use HasFactory;

    const AKEDA = 1;
    const FEKH = 2;
    const TAFSIR = 3;
    const SEERAH = 4;
    const HADEETH = 5;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'birth_date',
        'mobile',
        'country_id',
        'instructor_gender',
        'subject_id',
        'preferred_book',
        'start_date',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }}
