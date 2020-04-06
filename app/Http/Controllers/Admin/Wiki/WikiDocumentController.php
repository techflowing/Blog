<?php

namespace App\Http\Controllers\Admin\Wiki;

use App\Http\Controllers\BaseController;
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

        error_log(json_encode($catalog, JSON_UNESCAPED_UNICODE));

        return view('admin.wiki.edit.index', $this->data);
    }
}
