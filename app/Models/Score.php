<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'scores';

    protected $fillable = ['player_id', 'room_id', 'score'];
}
