<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'sitter_id', 'start_date', 'end_date', 'status',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function sitter()
    {
        return $this->belongsTo(User::class, 'sitter_id');
    }
}