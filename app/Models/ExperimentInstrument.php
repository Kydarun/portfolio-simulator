<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperimentInstrument extends Pivot
{
    use SoftDeletes;

    public $incrementing = true;


    protected $fillable = [
        'experiment_id',
        'instrument_id',
        'enabled',
        'overrides'
    ];

    public function experiment()
    {
        return $this->belongsTo(Experiment::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }
}
