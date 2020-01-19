<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminManuscriptsBlogModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manuscripts_blog';

    protected $fillable = [
        'manuscripts_blog_name',
        'manuscripts_blog_detail',
        'manuscripts_blog_image',
        'manuscripts_category_id',
        'manuscripts_blog_tag',
        'manuscripts_blog_link'
    ];
}
