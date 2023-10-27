<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lijst extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'winkel_id', 'day', 'accepted'];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function winkel() {
        return $this->belongsTo(Winkel::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
