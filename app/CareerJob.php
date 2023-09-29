<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class CareerJob extends Model
{

    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'requirements',
        'responsibilities',
        'apply_method',
        'tags',
        'image',
        'file',
        'status',
    ];

    public $translatable = ['title', 'description'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('description', 'like', '%' .json_encode($searchTerm, JSON_UNESCAPED_UNICODE). '%');
    }
    
}
