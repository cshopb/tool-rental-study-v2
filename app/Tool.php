<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model {

    protected $fillable = [
        'name',
        'description',
        'price',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    /**
     * this is scope building. We can now use the word after scope as
     * a 'command' when interacting with our model.
     *
     * to name the scope: scopeNameWeWant($query)
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * this section would set the published_at field to have the current
     * time as well when we set the date. If we omit this it will put the
     * time as 00:00:00 because we have it set as a $timestamp.
     *
     * the naming is: setNameOfFieldAttribute($param)
     *
     * I want the midnight for now.
     *
     * @param $date
     */
//    public function setPublishedAtAttribute($date)
//    {
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
//    }

    /**
     * The tool is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
