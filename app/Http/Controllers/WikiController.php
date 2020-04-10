<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;

/**
 * Wiki 相关控制器
 * Class WikiController
 * @package App\Http\Controllers
 */
class WikiController extends BaseController
{
    /**
     * 获取指定文档内容
     * @param integer $projectId 项目ID
     * @param integer $docId 文档ID
     * @return \Illuminate\Http\Response
     */
    public function getContent($projectId, $docId)
    {
        if (empty($docId) || $docId <= 0) {
            abort(404);
        }
        $wikiProject = WikiProject::find($projectId);
        if (empty($wikiProject)) {
            abort(404);
        }
        $document = WikiDocument::where('project_id', '=', $projectId)
            ->where('id', '=', $docId)
            ->first();
        if (empty($document)) {
            abort(404);
        }
        $data['content'] = $document->content != null ? $document->content : "";
        return $this->buildResponse(ErrorDesc::SUCCESS, $data);
    }
}
