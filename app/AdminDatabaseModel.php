<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDatabaseModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'database';

    protected $fillable = [
        'database_name',
        'database_image',
        'database_link'
    ];
}
