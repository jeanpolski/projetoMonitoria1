<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Availability;
use App\Models\Rating;

class Session extends Model
{
    use HasFactory;

    protected $table = 'monitor_sessions';
    protected $fillable = [
        'monitor_id',
        'aluno_id',
        'data',
        'hora_inicio',
        'hora_fim',
        'status'
    ];

    public function monitor()
    {
        return
            $this->belongsTo(User::class, 'monitor_id');
    }

    public function aluno()
    {
        return
            $this->belongsTo(User::class, 'aluno_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
