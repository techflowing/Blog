<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use App\Model\Admin\HomeNavMenu;
use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;
use Illuminate\Database\Eloquent\Collection;

/**
 * 博客站
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends BaseController
{
    /**
     * @var int 分页，每页的数量
     */
    private static $PAGE_SIZE = 30;

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        $document = $this->getBlogArticle(1, self::$PAGE_SIZE);

        if (empty($document)) {
            abort(404);
        }

        $documentCount = $this->getBlogArticleCount();
        $pageCount = ceil($documentCount / self::$PAGE_SIZE);

        return view('blog.index')
            ->with('navMenu', $navMenu)
            ->with('blogArticle', $document)
            ->with("blogCount", $documentCount)
            ->with('pageCount', $pageCount);
    }

    /**
     * 获取指定页的数据
     * @param int $page 页码
     * @return \Illuminate\Http\Response
     */
    public function getPageList($page)
    {
        $document = $this->getBlogArticle($page, self::$PAGE_SIZE);
        if (empty($document)) {
            abort(404);
        }
        return $this->buildResponse(ErrorDesc::SUCCESS, $document);
    }

    /**
     * 获取指定文章的详情页
     * @param String $title 文章标题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleDetail($title)
    {
        $doc = WikiDocument::where('name', '=', $title)->first();
        if (empty($doc)) {
            abort(404);
        }
        $project = WikiProject::where('id', '=', $doc->project_id)->first();
        if (empty($project) || $project->type == WikiProject::$TYPE_PRIVATE) {
            abort(403);
        }
        return view('blog.detail.index')
            ->with('article', $doc);
    }

    /**
     * 分页查询数据
     * @param int $page 当前页数
     * @param int $size 每页的数量
     * @return Collection 分页查询结果
     */
    private function getBlogArticle($page, $size)
    {
        $document = WikiDocument::where('wiki_document.type', '=', WikiDocument::$TYPE_FILE)
            ->whereIn('project_id', function ($query) {
                $query->select('id')
                    ->from('wiki_project')
                    ->where('type', '=', WikiProject::$TYPE_PUBLIC);
            })
            ->join('wiki_project', 'wiki_project.id', '=', 'wiki_document.project_id')
            ->select('wiki_document.name as title', 'wiki_project.name as category', 'wiki_document.created_at')
            ->orderBy('created_at', "DESC")
            ->offset(($page - 1) * $size)
            ->limit($size)
            ->get();
        if (!empty($document)) {
            foreach ($document as &$item) {
                // 直接截取
                $item->date = substr($item->created_at, 0, 10);
                // 访问文章链接
                $item->link = "/blog/detail/$item->title";
            }
            unset($item);
        }
        return $document;
    }

    /**
     * 所有文章数量
     * @return int 所有文章数量
     */
    private function getBlogArticleCount()
    {
        return WikiDocument::where('wiki_document.type', '=', WikiDocument::$TYPE_FILE)
            ->whereIn('project_id', function ($query) {
                $query->select('id')
                    ->from('wiki_project')
                    ->where('type', '=', WikiProject::$TYPE_PUBLIC);
            })
            ->join('wiki_project', 'wiki_project.id', '=', 'wiki_document.project_id')
            ->select('wiki_document.name as title', 'wiki_project.name as category', 'wiki_document.created_at')
            ->count();
    }
}
