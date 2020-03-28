<?php


namespace App\Http\Controllers\Admin\Wiki;


use App\Http\Controllers\Controller;
use App\Model\wiki\WikiProject;
use Encore\Admin\Facades\Admin;

class WikiDocumentController extends Controller
{
    /**
     * @var array 输出的数据
     */
    protected $data = array();

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
}
