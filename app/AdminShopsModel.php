<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminShopsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';

    protected $fillable = [
        'shops_name',
        'shops_image',
        'shops_link'
    ];
}
