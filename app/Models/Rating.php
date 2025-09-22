<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'aluno_id',
        'rate',
        'note'
    ];

    public function session()
    {
        return
        $this->belongsTo(Session::class);
    }

    public function aluno()
    {
        return
        $this->belongsTo(User::class, 'aluno_id');
    }
}