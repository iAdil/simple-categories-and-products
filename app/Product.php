<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        // перед обновлением удалить старое изображение
        self::updating(function($product){
            if(! is_null(request('image')) && Storage::disk('public')->exists($product->getOriginal('image'))){
                Storage::disk('public')->delete($product->getOriginal('image'));
            }
        });

        // при удалении удалить изображение
        self::deleting(function($product){
            if(Storage::disk('public')->exists($product->getOriginal('image'))){
                Storage::disk('public')->delete($product->getOriginal('image'));
            }
        });
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the image url
     *
     * @param  string  $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if(! is_null($value)){
            $imageUrl = Storage::url($value);
        }else{
            $imageUrl = "/images/noimg.png";
        }

        return $imageUrl;
    }
}
