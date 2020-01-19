<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminScholarCategoryModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scholar_category';

    protected $fillable = [
        'scholar_category_name'
    ];
}
