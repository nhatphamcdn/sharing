<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Relationship with user. one-many
     * 1 user - n comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
