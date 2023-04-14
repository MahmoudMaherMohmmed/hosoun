<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
	use HasTranslations;
    
    public $translatable = ['heading', 'sub_heading', 'search_text', 'detail', 'button_text', 'button_url'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
      $attributes = parent::toArray();
      
      foreach ($this->getTranslatableAttributes() as $name) {
          $attributes[$name] = $this->getTranslation($name, app()->getLocale());
      }
      
      return $attributes;
    } 

    protected $table = 'sliders';

    protected $fillable = ['heading', 'sub_heading', 'search_text', 'detail', 'button_text', 'button_url', 'status', 'image', 'position', 'left'];
}
