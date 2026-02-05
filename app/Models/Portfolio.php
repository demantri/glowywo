<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function images()
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id')
                    ->orderBy('sort_order');
    }
}
