<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\{
    Role, Job, Proposal, Conversation
};

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'level_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Job::class)->withTimestamps()->orderByDesc('job_user.created_at');
    }

    public function conversations()
    {
        return Conversation::where(function ($q) {
            $q->where('to', $this->id)
                ->orWhere('from', $this->id);
        });
    }

    public function getConversationsAttribute()
    {
        return $this->conversations()->get();
    }

}
