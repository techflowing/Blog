<?php

namespace App\Http\Controllers\Admin\Forms;

use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

/**
 * LeetCode 题解生成器表单
 * Class LeetCodeCreator
 * @package App\Http\Controllers\Admin\Forms
 */
class LeetCodeCreator extends Form
{
    public $title = 'LeetCode题解生成器，执行此操作前请先备份数据！！！';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        $file = $request->file('file');
        $id = $request->input('id');
        $name = $request->input('name');

        $project = WikiProject::where('id', '=', $id)
            ->where('name', '=', $name)
            ->first();
        if (empty($project)) {
            admin_error("项目不存在");
            return back();
        }

        // 先删除原有文档
        WikiDocument::where('project_id', '=', $id)->delete();

        $file->move('media-store/wiki/', $file->getClientOriginalName());
        $fileContent = file_get_contents('media-store/wiki/' . $file->getClientOriginalName());
        $leetCodeJson = json_decode($fileContent);
        $this->generateLeetCode($leetCodeJson, $id);
        admin_toastr("成功");
        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('id', 'Wiki 项目ID')
            ->required();
        $this->text('name', 'Wiki 项目名称')
            ->required();
        $this->file('file', 'JSON数据')
            ->help("请确保选择正确格式的数据")
            ->required();
    }

    private function generateLeetCode($leetCodeJson, $projectId)
    {
        unset($leetCodeJson->lastUpdatedTime);
        unset($leetCodeJson->total);
        unset($leetCodeJson->solved);
        unset($leetCodeJson->locked);
        foreach ($leetCodeJson as $item) {
            $doc = new WikiDocument();
            $doc->project_id = $projectId;
            $doc->name = $item->frontend_question_id . '.' . $item->translatedTitle;
            $doc->type = WikiDocument::$TYPE_FILE;
            $doc->parent_id = 0;
            $doc->sort = $item->id;
            $doc->content = $this->getContent($item);
            $doc->save();
        }
    }

    private function getContent($item)
    {
        $question = $item->translatedContent;
        $result = $question . "\r\n#### 解答\r\n";

        foreach ($item->language as $lang) {
            $answerLang = $item->$lang;
            $result = $result . $lang . "\r\n```\r\n" . $answerLang . "\r\n```\r\n";
        }
        return $result;
    }
}
