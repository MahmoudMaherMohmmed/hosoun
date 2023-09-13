<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranPath extends Model
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
        'sub_path',
        'old_memorized',
        'telawa_amount',
        'old_ejazat',
        'required_ejazat',
        'required_qeraa',
        'start_date',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

}
