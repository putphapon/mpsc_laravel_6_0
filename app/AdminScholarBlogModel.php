<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminScholarBlogModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scholar_blog';

    protected $fillable = [
        'scholar_blog_name',
        'scholar_blog_author',
        'scholar_category_id',
        'scholar_blog_link'
    ];
}
