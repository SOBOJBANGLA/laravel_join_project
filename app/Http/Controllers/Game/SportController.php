<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\saba_game;
use App\Models\sport_bti;
use Illuminate\Http\Request;

class SportController extends Controller
{

    public function __construct()
    {
        $this->theme = template();
    }

    public function sport_cricket()
    {
        return view($this->theme . 'sports.cricket');
    }

    public function sport_saba()
    {
        $games = saba_game::all();
        return view($this->theme . 'sports.saba', compact('games'));
    }

    public function sport_bit()
    {
        $games = sport_bti::all();
        return view($this->theme . 'sports.bit', compact('games'));
    }

    public function sport_horse()
    {
        $games = saba_game::all();
        return view($this->theme . 'sports.horse', compact('games'));
    }

    public function sport_sbo()
    {
        $games = saba_game::all();
        return view($this->theme . 'sports.sbo', compact('games'));
    }

    public function sport_cmd()
    {
        $games = saba_game::all();
        return view($this->theme . 'sports.cmd', compact('games'));
    }
}
