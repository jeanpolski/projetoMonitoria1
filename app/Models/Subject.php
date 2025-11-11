<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = [
        'name',
        'description'
    ];

    public function monitores()
    {
        return $this->hasMany(User::class, 'subject_id', 'id');
    }
}
