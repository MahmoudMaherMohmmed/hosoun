<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class SocialLink extends Model
{
    use HasFactory;
    use HasTranslations;
    
    public $translatable = ['title'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $title) {
          $attributes[$title] = $this->getTranslation($title, app()->getLocale());
      }
      
      return $attributes;
    } 

    protected $table = 'social_links';

    protected $fillable = ['title', 'link', 'icon', 'status'];
}
