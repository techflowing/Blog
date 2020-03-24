<?php

namespace App\Model\blog;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章分类Model
 * Class ArticleCategory
 * @package App\Model\blog
 */
class ArticleTag extends Model
{
    protected $table = 'blog_tags';

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'blog_r_article_tag', 'tag_id', 'article_id');
    }
}
