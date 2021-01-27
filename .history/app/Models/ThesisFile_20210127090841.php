<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesisFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'thesis_id',
        'url',
        'state'
    ];
}
