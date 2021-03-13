<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
