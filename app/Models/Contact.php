<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "on_type",
        "on_id",
        "type",
        "is_primary",
        "phone",
        "address",
        "city",
        "state",
        "zip",
        "notes"
    ];

    public function contactable() : MorphTo {
        return $this->morphTo("contacts", "on_type", "on_id");
    }
}
