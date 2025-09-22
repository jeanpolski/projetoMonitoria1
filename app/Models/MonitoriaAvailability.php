<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoriaAvailability extends Model{
    use HasFactory;

    protected $table = 'monitoria_subject';

    protected $fillable = [
        'monitor_id',
        'subject_id'
    ];
}