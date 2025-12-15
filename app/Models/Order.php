<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'run_id',
        'instrument_id',
        'type',
        'side',
        'quantity',
        'price',
        'simulated_time',
        'status',
        'meta',
    ];

    public function run()
    {
        return $this->belongsTo(Run::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
