<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageImage extends Model
{
    public function homepage()
    {
        return $this->belongsTo(Homepage::class, 'homepage_id');
    }
}
