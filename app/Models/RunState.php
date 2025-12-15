<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RunState extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'run_id',
        'iteration',
        'simulated_time',
        'cash',
        'total_value',
        'positions',
        'metrics',
    ];

    public function run()
    {
        return $this->belongsTo(Run::class);
    }
}
