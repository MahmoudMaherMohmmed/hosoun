<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectPath extends Model
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
        'class_id',
        'subject_id',
        'start_date',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
}