<?php /** @noinspection LaravelFunctionsInspection */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Str;

class Patient extends Authenticatable implements HasMedia {
    use Notifiable, SoftDeletes, InteractsWithMedia, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first',
        'middle',
        'last',
        'dob',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts() : array {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'created_at'        => 'datetime',
        ];
    }

    /**
     * Get the patient's full name
     * @return string
     */
    public function getFullNameAttribute() : string {
        return preg_replace("/\s{2,}/", " ", "{$this->first} {$this->middle} {$this->last}");
    }

    /**
     * Get the patient's date of birth
     * @return string
     */
    public function getDobAttribute() : string {
        return Carbon::parse($this->attributes['dob'])->format('m/d/Y');
    }

    /**
     * Calculate the patient's age
     * @return string
     */
    public function getAgeAttribute() : string {
        return Carbon::parse($this->dob)->diff(Carbon::now())->format('%y years %m months');
    }

    /**
     * Get the avatar URL
     * @return array|string
     */
    public function getAvatarAttribute() : array|string {
        return $this->getFirstMediaUrl('avatars');
    }

    /***
     * Relationships
     */
    public function contacts() : MorphMany {
        return $this->morphMany(Contact::class, 'contacts', 'on_type', 'on_id');
    }

    public function notes() : MorphMany {
        return $this->morphMany(Note::class, 'notes', 'on_type', 'on_id');
    }

    public function appointments() : Patient|HasMany {
        return $this->hasMany(Appointment::class);
    }
}
