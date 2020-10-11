<?php

namespace App\Http\Controllers\Admin\Wiki;

use App\Http\Controllers\BaseController;
use App\Http\ErrorDesc;
use App\Model\Wiki\WikiDocument;
use App\Model\Wiki\WikiProject;
use Illuminate\Support\Facades\DB;
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
     * 保存文档
     * @param $projectId
     * @return \Illuminate\Http\Response
     */
    public function save($projectId)
    {
        if ($this->isPost()) {
            $data = $this->request->all();
            if (empty($data)) {
                return $this->buildResponse(ErrorDesc::REQUEST_BODY_EMPTY);
            }

            if (empty(WikiProject::find($projectId))) {
                return $this->buildResponse(ErrorDesc::WIKI_PROJECT_NOT_EXIST);
            }
            $content = $this->request->input('editormd-markdown-doc', null);
            $docId = $this->request->input('doc_id', '');
            $result = WikiDocument::where('project_id', '=', $projectId)
                ->where('id', '=', $docId)
                ->update(['content' => $content]);

            if ($result) {
                return $this->buildResponse(ErrorDesc::SUCCESS);
            } else {
                return $this->buildResponse(ErrorDesc::DB_ERROR);
            }
        }
        return $this->buildResponse(ErrorDesc::METHOD_NOT_ALLOWED);
    }

    /**
     * 创建文件夹、文档
     * @param $projectId
     * @return \Illuminate\Http\Response
     */
    public function create($projectId)
    {
        if ($this->isPost()) {
            $parentId = $this->request->input('parent_id', 0);
            $parentTId = $this->request->input('parent_t_id', '');
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

            // 开启事务
            DB::beginTransaction();
            if (!$document->save()) {
                DB::rollback();
                return $this->buildResponse(ErrorDesc::DB_ERROR);
            }
            // 更新 WikiProject 内文档数目信息
            if ($type == WikiDocument::$TYPE_FILE) {
                $docCount = WikiDocument::where('project_id', '=', $projectId)
                    ->where('type', '=', WikiDocument::$TYPE_FILE)
                    ->count();
                $result = WikiProject::where('id', '=', $projectId)
                    ->update(['doc_count' => $docCount]);
                if (!$result) {
                    DB::rollback();
                    return $this->buildResponse(ErrorDesc::DB_ERROR);
                }
            }
            DB::commit();

            // 构造要返回的节点数据，key 值不能变，符合 Ztree 数据格式
            $data['id'] = $document->id . '';
            $data['name'] = $document->name;
            $data['type'] = $document->type . '';
            $data['parentId'] = $document->parent_id;
            $data['parentTId'] = $parentTId;
            $data['isParent'] = strcmp($document->type, WikiDocument::$TYPE_DIR) == 0;

            return $this->buildResponse(ErrorDesc::SUCCESS, $data);
        }
        return $this->buildResponse(ErrorDesc::METHOD_NOT_ALLOWED);
    }

    /**
     * 目录排序
     * @param integer $projectId 项目Id
     * @return \Illuminate\Http\Response
     */
    public function sort($projectId)
    {
        $data = $this->request->getContent();
        if (empty($data)) {
            return $this->buildResponse(ErrorDesc::REQUEST_BODY_EMPTY);
        }
        $data = json_decode($data);

        if (empty(WikiProject::find($projectId))) {
            return $this->buildResponse(ErrorDesc::WIKI_PROJECT_NOT_EXIST);
        }

        DB::transaction(function () use ($projectId, $data) {
            // 更新parent_id
            $document = ['parent_id' => $data->parentId];
            WikiDocument::where('id', '=', $data->id)
                ->where('project_id', '=', $projectId)
                ->update($document);
            // 更新顺序
            $sibling = $data->sibling;
            foreach ($sibling as $item) {
                $data = ['sort' => $item->sort];
                WikiDocument::where('id', '=', $item->id)
                    ->where('project_id', '=', $projectId)
                    ->where('parent_id', '=', $item->parentId)
                    ->update($data);
            }
        });
        return $this->buildResponse(ErrorDesc::SUCCESS);
    }

    /**
     * 文档重命名
     * @param integer $projectId 项目Id
     * @param integer $docId 文档Id
     * @return \Illuminate\Http\Response
     */
    public function rename($projectId, $docId)
    {
        $data = $this->request->getContent();
        if (empty($data)) {
            return $this->buildResponse(ErrorDesc::REQUEST_BODY_EMPTY);
        }
        $data = json_decode($data);

        if (empty(WikiProject::find($projectId))) {
            return $this->buildResponse(ErrorDesc::WIKI_PROJECT_NOT_EXIST);
        }

        WikiDocument::where('project_id', '=', $projectId)
            ->where('id', '=', $docId)
            ->update(['name' => $data->newName]);
        return $this->buildResponse(ErrorDesc::SUCCESS);
    }

    /**
     * 删除文档
     * @param $projectId
     * @return \Illuminate\Http\Response
     */
    public function delete($projectId)
    {
        $data = $this->request->getContent();
        if (empty($data)) {
            return $this->buildResponse(ErrorDesc::REQUEST_BODY_EMPTY);
        }
        $data = json_decode($data);

        if (empty(WikiProject::find($projectId))) {
            return $this->buildResponse(ErrorDesc::WIKI_PROJECT_NOT_EXIST);
        }
        // 开启事务
        DB::beginTransaction();
        $result = WikiDocument::where('project_id', '=', $projectId)
            ->whereIn('id', $data)
            ->delete();
        if (!$result) {
            DB::rollBack();
            return $this->buildResponse(ErrorDesc::DB_ERROR);
        }
        // 更新文档数目
        $docCount = WikiDocument::where('project_id', '=', $projectId)
            ->where('type', '=', WikiDocument::$TYPE_FILE)
            ->count();
        $result = WikiProject::where('id', '=', $projectId)
            ->update(['doc_count' => $docCount]);
        if (!$result) {
            DB::rollback();
            return $this->buildResponse(ErrorDesc::DB_ERROR);
        }
        DB::commit();

        return $this->buildResponse(ErrorDesc::SUCCESS);
    }
}
