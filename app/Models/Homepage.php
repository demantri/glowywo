<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    public function images()
    {
        return $this->hasMany(HomepageImage::class, 'homepage_id')
                    ->orderBy('sort_order');
    }
}
