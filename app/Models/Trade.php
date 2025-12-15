<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'run_id',
        'order_id',
        'instrument_id',
        'price',
        'quantity',
        'commission',
        'executed_price',
        'meta',
    ];

    public function run()
    {
        return $this->belongsTo(Run::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }
}
