<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = [
        'name',
        'description'
    ];

    public function monitores()
    {
        return
        $this->belongsToMany(User::class, 
        'monitoria_subject',
        'subject_id',
        'monitor_id');
    }
}