<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function scopeCheckAvail($query, $hairdresser = null)
    {
        return $query->where('hairdresser_id', $hairdresser)->get();
    }

}
