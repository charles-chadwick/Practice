<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model {
    use SoftDeletes;

    protected $fillable = [
        "on_type",
        "on_id",
        "user_id",
        "title",
        "content"
    ];


    public function contactable() : MorphTo {
        return $this->morphTo("notable", "on_type", "on_id");
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
