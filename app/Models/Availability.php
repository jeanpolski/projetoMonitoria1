<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model{
    use HasFactory;
    protected $table = 'availability';
    protected $fillable = [
        'monitor_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim'
    ];

    public function monitor()
    {
        return
        $this->belongsTo(User::class, 'monitor_id');
    }
}