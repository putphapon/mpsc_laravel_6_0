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
    protected $table = 'admin_databases';

    protected $fillable = [
        'admin_databases_name',
        'admin_databases_image',
        'admin_databases_link'
    ];
}
