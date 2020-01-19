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
    protected $table = 'title';

    protected $fillable = [
        'title_name',
        'title_image'
    ];
}
