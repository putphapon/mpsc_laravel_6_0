<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminEventsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    protected $fillable = [
        'events_name',
        'events_image',
        'events_date',
        'events_where',
        'events_linkReg',
        'events_linkImage'
    ];
}
