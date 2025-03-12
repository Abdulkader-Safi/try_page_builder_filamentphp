<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSections extends Model
{
    protected $fillable = [
        'type',
        'title',
        'content',
        'is_public',
        'order',
    ];

    protected $casts = [
        'content' => 'array',
        'is_public' => 'boolean',
        'order' => 'integer',
    ];

    public function page()
    {
        return $this->belongsTo(Pages::class);
    }
}
