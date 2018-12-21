<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    //authorise la création 'un utilisateur
    protected $fillable = ["lastname", "firstname", "email", "password", "role_id"];



    // plusieur post peuvent appartenir à un user
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
