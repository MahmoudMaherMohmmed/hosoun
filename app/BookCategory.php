<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class BookCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image',
        'status',
    ];

    public $translatable = ['title', 'description'];

    public function sub_categories()
    {
        return $this->hasMany(BookSubCategory::class, 'book_category_id', 'id')->withTrashed();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}