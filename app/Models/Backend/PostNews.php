<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostNews extends Model
{
    use HasFactory;

    protected $primaryKey  = 'news_id';

    protected $fillable = [

        'news_id',
        'news_headline',
        'news_shoulder',
        'news_keywords',
        'news_highlights',
        'news_body',
        'category_slug',
        'news_title_image',
        'title_image_courtecy',
        'inner_news_image',
        'inner_image_courtecy',
        'inner_image_para_no',
        'author_id',
        'news_status',
        'elected_status',
        'tot_status',
        'lead_news_status',
        'slug',
        'auth_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id','category_id');
    // }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_slug','category_slug');
    }
}



