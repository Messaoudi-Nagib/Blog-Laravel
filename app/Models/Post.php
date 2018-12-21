<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ["titre", "contenu", "user_id"];


    // un article appartient à UN utilisateur [1, 1]
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);

    }
}
