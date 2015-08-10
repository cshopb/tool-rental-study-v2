<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renting extends Model
{
    protected $table = 'tool_user_rent';

    protected $dates = [
        'rented_at',
        'return_at',
    ];
}
