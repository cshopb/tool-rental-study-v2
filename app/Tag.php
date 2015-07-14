<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = [
        'name'
    ];

    /**
     * get the tools associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tools()
    {
        return $this->belongsToMany('App\Tool');
    }
}
