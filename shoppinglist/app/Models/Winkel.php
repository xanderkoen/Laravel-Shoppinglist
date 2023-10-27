<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winkel extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function lists() {
        return $this->hasMany(Lijst::class);
    }
}
