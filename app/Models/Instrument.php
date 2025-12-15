<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instrument extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'symbol',
        'name',
        'asset_type',
        'currency',
        'metadata',
    ];

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class)
            ->using(ExperimentInstrument::class)
            ->withPivot(['enabled', 'overrides'])
            ->withTimestamps();
    }

    public function presets()
    {
        return $this->belongsToMany(Preset::class)
            ->using(PresetInstrument::class)
            ->withPivot(['enabled'])
            ->withTimestamps();
    }
}
