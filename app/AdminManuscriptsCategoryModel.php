<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminManuscriptsCategoryModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manuscripts_category';

    protected $fillable = [
        'manuscripts_category_name',
        'manuscripts_category_detail',
        'manuscripts_category_image'
    ];
}
