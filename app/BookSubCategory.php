<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class BookSubCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'book_category_id',
        'slug',
        'title',
        'description',
        'image',
        'status',
    ];

    public $translatable = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id', 'id')->withTrashed();
    }

    public function child_categories()
    {
        return $this->hasMany(BookChildCategory::class, 'book_sub_category_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}