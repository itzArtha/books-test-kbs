<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected $casts = [
        'release_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }
}
