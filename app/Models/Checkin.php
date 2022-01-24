<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'checkin';

    protected $fillable = ['player_id', 'room_id'];
}
