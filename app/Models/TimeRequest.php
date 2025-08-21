<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TimeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'donor_id',       // added donor
        'title',
        'description',
        'requested_time',
        'status',
    ];

    // Relation to Seeker
    public function seeker() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation to Donor
    public function donor() {
        return $this->belongsTo(User::class, 'donor_id');
    }
}
