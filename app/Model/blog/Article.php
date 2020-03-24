<?php

namespace App\Model\blog;

use Illuminate\Database\Eloquent\Model;

/**
 * 博客文章Model
 * Class Article
 * @package App\Model\blog
 */
class Article extends Model
{
    protected $table = 'blog_articles';

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ArticleTag::class, 'blog_r_article_tag', 'article_id', 'tag_id');
    }
}
