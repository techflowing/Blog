<?php

namespace App\Http\Controllers\Admin\Wiki;

use App\Http\Controllers\BaseController;
use App\Http\ErrorDesc;
use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;
use Illuminate\View\View;

class WikiDocumentController extends BaseController
{
    /**
     * 编辑文档
     * @param int $id ProjectId
     * @return View
     */
    public function edit($id)
    {
        if (empty($id) || $id <= 0) {
            abort(404);
        }
        $wikiProject = WikiProject::find($id);
        if (empty($wikiProject)) {
            abort(404);
        }
        $this->data['wiki_project'] = $wikiProject;

        $catalog = WikiDocument::getDocumentCatalog($wikiProject->id);
        $this->data['doc_catalog'] = json_encode($catalog, JSON_UNESCAPED_UNICODE);

        $this->data['project_id'] = $wikiProject->id;

        return view('admin.wiki.edit.index', $this->data);
    }

    /**
     * 创建文件夹、文档
     */
    public function create()
    {
        if ($this->isPost()) {
            $projectId = $this->request->input('project_id', 0);
            $parentId = $this->request->input('parent_id', 0);
            $name = $this->request->input('name', '');
            $type = $this->request->input('type', 0);

            if (empty($name)) {
                return $this->buildResponse(ErrorDesc::WIKI_NAME_EMPTY);
            }
            // 父级目录不是根目录，要判断父级目录是否存在
            if (strcmp('0', $parentId) != 0) {
                $parentDoc = WikiDocument::where('project_id', '=', $projectId)
                    ->where('id', '=', $parentId)
                    ->first();
                if (empty($parentDoc)) {
                    return $this->buildResponse(ErrorDesc::WIKI_PARENT_DOC_EMPTY);
                }
            }
            $document = new WikiDocument();
            $document->project_id = $projectId;
            $document->name = $name;
            $document->type = $type;
            $document->parent_id = $parentId;
            $maxSort = WikiDocument::where('parent_id', '=', $parentId)
                ->orderBy('sort', 'DESC')
                ->first();
            $document->sort = ($maxSort ? $maxSort['sort'] + 1 : 0);
            if (!$document->save()) {
                return $this->buildResponse(ErrorDesc::DB_ERROR);
            }

            // 构造要返回的节点数据
            $data['id'] = $document->id . '';
            $data['name'] = $document->name;
            $data['type'] = $document->type . '';
            $data['parent_id'] = $document->parent_id;
            $data['is_parent'] = strcmp($document->type, WikiDocument::$TYPE_DIR) == 0;

            return $this->buildResponse(ErrorDesc::SUCCESS, $data);
        }
        return $this->buildResponse(ErrorDesc::METHOD_NOT_ALLOWED);
    }
}
