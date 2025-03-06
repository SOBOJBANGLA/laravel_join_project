<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CricketGame extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'match_id',
        'title',
        'competition', 
        'match_date',
        'match_time',
        'status',
        'teams',
        'scores',
        'odds_team1',
        'odds_team2',
        'odds_draw'
    ];

    protected $casts = [
        'teams' => 'array',
        'scores' => 'array',
        'match_date' => 'date',
        'match_time' => 'datetime',
        'odds_team1' => 'float',
        'odds_team2' => 'float',
        'odds_draw' => 'float'
    ];
}
