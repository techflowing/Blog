<?php

namespace App\Model\wiki;

use Illuminate\Database\Eloquent\Model;

/**
 * Wiki 项目Model
 * Class WikiProject
 * @package App\Model\wiki
 */
class WikiProject extends Model
{
    public static $TYPE_PRIVATE = 0;
    public static $TYPE_PUBLIC = 1;

    protected $table = 'wiki_project';


    /**
     * 获取项目的文档树
     * @param int id
     * @return array
     */
    public static function getProjectArrayTree($id)
    {
        if (empty($id)) {
            return [];
        }
        $tree = WikiDocument::where('project_id', '=', $id)
            ->select(['id', 'name', 'type', 'parent_id'])
            ->orderBy('doc_sort', 'ASC')
            ->get();

        $jsonArray = [];
        if (empty($tree) === false) {
            foreach ($tree as &$item) {
                $tmp['id'] = $item->id . '';
                $tmp['text'] = $item->name;
                $tmp['parent'] = ($item->parent_id == 0 ? '#' : $item->parent_id) . '';

                $jsonArray[] = $tmp;
            }
        }
        return $jsonArray;
    }
}
