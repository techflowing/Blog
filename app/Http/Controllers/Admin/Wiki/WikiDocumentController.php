<?php

namespace App\Http\Controllers\Admin\Wiki;

use App\Http\Controllers\Controller;
use App\Model\wiki\WikiProject;

class WikiDocumentController extends Controller
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
        return view('admin.wiki.edit.index');
    }
}
