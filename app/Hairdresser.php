<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\Presets\None;
use PhpParser\Builder;

class Hairdresser extends Model
{
    public function hairstyle()
    {
        return $this->hasMany('App\Hairstyle', 'hairdresser_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function hairlink()
    {
        return $this->hasMany('App\Hairlink', 'hairdresser_id', 'id');
    }
}
