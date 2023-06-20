<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class BookChildCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'book_sub_category_id',
        'slug',
        'title',
        'description',
        'image',
        'status',
    ];

    public $translatable = ['title', 'description'];

    public function sub_category()
    {
        return $this->belongsTo(BookSubCategory::class, 'book_sub_category_id', 'id')->withTrashed();
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'book_child_category_id', 'id')->withTrashed();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}