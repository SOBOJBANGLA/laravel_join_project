<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fund_transfer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
