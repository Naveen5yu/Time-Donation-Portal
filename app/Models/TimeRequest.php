<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;

class TimeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'donor_id',
        'title',
        'description',
        'requested_time',
        'status',
    ];

    public function seeker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'time_request_id');
    }

    public function rejectedDonors()
    {
        return $this->belongsToMany(User::class, 'donor_time_request', 'time_request_id', 'donor_id')
                    ->withPivot('action')
                    ->withTimestamps();
    }
}