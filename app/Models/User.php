<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'paid',
        'status',
        'billing_method',
        'company',
        'country',
        'role_id',
        'plan_id',
    ];

    protected $attributes = [
        'paid' => false,
        'password' => 'ASDFasdf!@#$1234',
        'billing_method' => 'auto_debit',
        'status' => 'pending'
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'country' => 'required|string|max:255',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plans::class);
    }
}
