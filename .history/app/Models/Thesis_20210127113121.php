<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'thesis_code',
        'title',
        'state'
    ];

    public function thesisFile()
    {
        return $this->hasMany(ThesisFile::class);
    }
}
