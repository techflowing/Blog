<?php


namespace App\Http\Controllers\Admin\Wiki;

use App\Model\wiki\WikiProject;

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

    public function save()
    {

        error_log('yuasdasdasdasd');
        error_log($this->request->input('project_id'));
        error_log($this->request->input('parent_id'));
        error_log($this->request->input('doc_id'));

        return $this->jsonResult(405);
    }
}
