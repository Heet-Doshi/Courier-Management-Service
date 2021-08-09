<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function user()
    {
        return $this->belongsTO('App/role','role_id');
    }
}
