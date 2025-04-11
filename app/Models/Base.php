<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model {
    use SoftDeletes;
    protected array $dates = [ 'deleted_at'];

    public function getCreatedAtAttribute($value) : string {
        return Carbon::parse($value)->format('m/d/Y h:i A');
    }
}
