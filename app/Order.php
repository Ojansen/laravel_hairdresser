<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function scopeCheckAvail($query, $hairdresser, $date)
    {
        return $query->where([$hairdresser, 'hairdresser_id'], [$date, 'date'])->get();
    }

}
