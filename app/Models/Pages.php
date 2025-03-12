<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_image',
        'is_public',
        'order'
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'order' => 'integer'
    ];

    public function sections()
    {
        return $this->hasMany(PageSections::class)->orderBy('order');
    }
}