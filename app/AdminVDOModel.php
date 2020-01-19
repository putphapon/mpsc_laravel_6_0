<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVDOModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vdo';

    protected $fillable = [
        'vdo_name',
        'vdo_detail',
        'vdo_link'
    ];
}
