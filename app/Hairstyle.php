<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hairstyle extends Model
{
    public function hairdresser()
    {
        return $this->belongsTo('App\Hairdresser', 'hairdresser_id');
    }

    public function hairlink()
    {
        return $this->hasMany('App\Hairlink', 'id', 'hairstyle_id');
    }
}
