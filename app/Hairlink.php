<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hairlink extends Model
{
    public function hairdresser()
    {
        return $this->hasMany('App\Hairdresser', 'id', 'hairdresser_id');
    }

    public function hairstyle()
    {
        return $this->hasMany('App\Hairstyle', 'id', 'hairstyle_id');
    }
}
