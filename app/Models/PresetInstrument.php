<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class PresetInstrument extends Pivot
{
    use SoftDeletes;

    public $incrementing = true;


    protected $fillable = [
        'preset_id',
        'instrument_id',
        'enabled',
    ];

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }
}
