<?php


namespace App\Http\Controllers\Admin\Wiki;

use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;
use SmartWiki\Models\Document;
use SmartWiki\Models\Project;

class WikiDocumentController extends WikiBaseController
{

    /**
     * 编辑文档
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        $jsonArray = WikiProject::getProjectArrayTree($id);
        if (!empty($jsonArray)) {
            $jsonArray[0]['state']['selected'] = true;
            $jsonArray[0]['state']['opened'] = true;
        }
        $this->data['project_id'] = $id;
        $this->data['project'] = $wikiProject;
        $this->data['json'] = json_encode($jsonArray, JSON_UNESCAPED_UNICODE);

        return view('wiki.document', $this->data);
    }

    /**
     * 获取文档内容
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContent($id)
    {
        if (empty($id) or $id <= 0) {
            abort(404);
        }

        $doc = WikiDocument::find($id);
        if (empty($doc)) {
            return $this->jsonResult(40301);
        }
        $this->data['doc']['doc_id'] = $doc->id;
        $this->data['doc']['name'] = $doc->name;
        $this->data['doc']['project_id'] = $doc->project_id;
        $this->data['doc']['parent_id'] = $doc->parent_id;
        $this->data['doc']['content'] = $doc->content;

        return $this->jsonResult(0, $this->data);
    }

    public function save()
    {

        $project_id = $this->request->input('project_id');

        if ($this->isPost()) {
            $document = null;

            $content = $this->request->input('editormd-markdown-doc', null);
            //如果是保存文档内容
            if (empty($content) === false) {
                $doc_id = intval($this->request->input('doc_id'));
                if ($doc_id <= 0) {
                    return $this->jsonResult(40301);
                }
                $document = WikiDocument::find($doc_id);
                if (empty($document)) {
                    return $this->jsonResult(40301);
                }
                //如果文档内容没有变更
                if (strcasecmp(md5($content), md5($document->content)) === 0) {
                    return $this->jsonResult(0, ['doc_id' => $doc_id, 'parent_id' => $document->parent_id, 'name' => $document->name]);
                }
                $document->content = $content;
            } else {
                //如果是新建文档
                $doc_id = intval($this->request->input('id', 0));
                $parentId = intval($this->request->input('parentId', 0));
                $name = trim($this->request->input('documentName', ''));
                $sort = intval($this->request->input('sort'));

                //文档名称不能为空
                if (empty($name)) {
                    return $this->jsonResult(40303);
                }

                //查看是否存在指定的文档
                if ($doc_id > 0) {
                    $document = WikiDocument::where('project_id', '=', $project_id)->where('id', '=', $doc_id)->first();
                    if (empty($document)) {
                        return $this->jsonResult(40301);
                    }
                }
                //判断父文档是否存在
                if ($parentId > 0) {
                    $parentDocument = WikiDocument::where('project_id', '=', $project_id)->where('id', '=', $parentId)->first();
                    if (empty($parentDocument)) {
                        return $this->jsonResult(40301);
                    }
                }

                if ($doc_id > 0) {
                    //查看是否有重名文档
                    $doc = WikiDocument::where('project_id', '=', $project_id)->where('name', '=', $name)->where('id', '<>', $doc_id)->first(['id']);
                    if (empty($doc) === false) {
                        return $this->jsonResult(40304);
                    }
                } else {
                    //查看是否有重名文档
                    $doc = WikiDocument::where('project_id', '=', $project_id)->where('name', '=', $name)->first(['id']);
                    if (empty($doc) === false) {
                        return $this->jsonResult(40304);
                    }
                }

                if (empty($document) === false and $document->parent_id == $parentId and strcasecmp($document->doc_name, $name) === 0 and $sort <= 0) {
                    return $this->jsonResult(0, ['doc_id' => $doc_id, 'parent_id' => $parentId, 'name' => $name]);
                }

                $document = $document ?: new WikiDocument();

                $document->project_id = $project_id;
                $document->name = $name;
                $document->type = WikiDocument::$TYPE_FILE;
                $document->parent_id = $parentId;

                if ($doc_id <= 0) {
                    $sort = WikiDocument::where('parent_id', '=', $parentId)->orderBy('doc_sort', 'DESC')->first(['doc_sort']);

                    $sort = ($sort ? $sort['doc_sort'] : -1) + 1;
                }

                if ($sort > 0) {
                    $document->doc_sort = $sort;
                }
            }

            if ($document->save() === false) {
                return $this->jsonResult(500, null, '保存失败');
            }
            $data = ['doc_id' => $document->id . '', 'parent_id' => ($document->parent_id == 0 ? '#' : $document->parent_id . ''), 'name' => $document->name];

            return $this->jsonResult(0, $data);
        }

        return $this->jsonResult(405);
    }
}
