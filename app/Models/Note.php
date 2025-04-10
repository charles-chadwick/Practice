<?php

namespace App\Models;

use Carbon\Carbon;
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
        "type",
        "title",
        "content"
    ];

    public static array $types = [
        "Admin"     => "Admin",
        "Personal"  => "Personal",
        "Financial" => "Financial",
    ];

    public function getCreatedAtAttribute( $value ) : string {
        return Carbon::parse($value)
                     ->format('m/d/y h:m A');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
