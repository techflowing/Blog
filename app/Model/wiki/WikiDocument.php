<?php

namespace App\Model\wiki;

use Illuminate\Database\Eloquent\Model;

/**
 * Wiki Document Model
 * Class WikiDocument
 * @package App\Model\wiki
 */
class WikiDocument extends Model
{
    public static $TYPE_FILE = 0;
    public static $TYPE_DIR = 1;

    protected $table = 'wiki_document';

    /**
     * 获取项目的文档目录结构
     * @param integer $projectId 项目Id
     * @return array 目录结构数组
     */
    public static function getDocumentCatalog($projectId)
    {
        if (empty($projectId)) {
            return [];
        }

        $tree = WikiDocument::where('project_id', '=', $projectId)
            ->select('id', 'name', 'type', 'parent_id')
            ->orderBy('sort', 'ASC')
            ->get();
        $catalog = [];

        if (!empty($tree)) {
            foreach ($tree as $item) {
                $temp['id'] = $item->id . '';
                $temp['name'] = $item->name;
                $temp['type'] = $item->type . '';
                $temp['parentId'] = $item->parent_id;
                $temp['isParent'] = $item->type == self::$TYPE_DIR;

                $catalog[] = $temp;
            }
        }
        return $catalog;
    }
}
