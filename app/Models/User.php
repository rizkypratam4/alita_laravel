<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'company',
        'password',
        'job_title',
        'direct_superior',
        'departement_id',
        'area_id',
        'work_place_id',
        'division_id',
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function departement() {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function division() {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function workPlace() {
        return $this->belongsTo(WorkPlace::class, 'work_place_id');
    }

    public function area() {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
