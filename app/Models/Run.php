<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Run extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'experiment_id',
        'status',
        'random_seed',
        'current_time',
        'iteration',
        'data_version',
    ];

    public function experiment()
    {
        return $this->belongsTo(Experiment::class);
    }

    public function runStates()
    {
        return $this->hasMany(RunState::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
