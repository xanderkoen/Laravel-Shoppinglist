<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['lijst_id', 'user_id', 'comment'];

    public function list() {
        return $this->belongsTo(Lijst::class, 'lijst_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
