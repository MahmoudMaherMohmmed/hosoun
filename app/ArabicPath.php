<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicPath extends Model
{
    use HasFactory;
    
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
        'arabic_native',
        'preferred_book',
        'speak_arabic',
        'spoken_lang',
        'start_date',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
}
