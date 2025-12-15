<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Experiment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'owner_user_id',
        'preset_id',
        'start_time',
        'end_time',
        'tick_interval_seconds',
        'initial_cash',
        'settings',
        'status',
    ];

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class)
            ->using(ExperimentInstrument::class)
            ->withPivot(['enabled', 'overrides'])
            ->withTimestamps();
    }
}
