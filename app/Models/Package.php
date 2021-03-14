<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
