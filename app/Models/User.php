<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeRequests()
    {
        return $this->hasMany(TimeRequest::class, 'user_id');
    }

    public function donations()
    {
        return $this->hasMany(TimeRequest::class, 'donor_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function rejectedTimeRequests()
    {
        return $this->belongsToMany(TimeRequest::class, 'donor_time_request', 'donor_id', 'time_request_id')
                    ->withPivot('action')
                    ->withTimestamps();
    }
}