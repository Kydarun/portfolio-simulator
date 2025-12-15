<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'author_user_id',
        'settings',
        'is_public',
    ];

    public function authorUser()
    {
        return $this->belongsTo(User::class, 'author_user_id');
    }

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class)
            ->using(PresetInstrument::class)
            ->withPivot(['enabled'])
            ->withTimestamps();
    }
}
