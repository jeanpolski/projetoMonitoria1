<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; FAZER DEPOIS
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
        'course',
        'role',
        'subject_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function
    monitoriasComoMonitor()
    {
        return
            $this->hasMany(Session::class, 'monitor_id');
    }

    public function
    monitoriasComoAluno()
    {
        return
            $this->hasMany(Session::class, 'aluno_id');
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'aluno_id');
    }
}
