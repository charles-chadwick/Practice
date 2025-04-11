<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discussion extends Base
{
    protected $fillable = [
        "on_type",
        "on_id",
        "user_id",
        "type",
        "title",
        "content"
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
