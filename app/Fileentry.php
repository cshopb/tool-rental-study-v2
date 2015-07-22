<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    protected $fillable = [
        'filename',
        'mime',
    ];

    public function tool()
    {
        return $this->belongsTo('App\Tool');
    }
}
