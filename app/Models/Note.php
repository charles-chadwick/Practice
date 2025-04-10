<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Note extends Base {

    protected $fillable = [
        "on_type",
        "on_id",
        "user_id",
        "type",
        "title",
        "content"
    ];

    public static array $types = [
        "Admin"     => "Admin",
        "Personal"  => "Personal",
        "Financial" => "Financial",
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function notable() : MorphTo {
        return $this->morphTo("notable", "on_type", "on_id");
    }
}
