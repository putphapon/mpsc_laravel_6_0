<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTitleModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_titles';

    protected $fillable = [
        'admin_titles_name',
        'admin_titles_image'
    ];
}
