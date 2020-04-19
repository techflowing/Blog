<?php

namespace App\Http\Controllers\Admin\Wiki;

use App\Http\Controllers\BaseController;
use Illuminate\Http\UploadedFile;
use League\Flysystem\Exception;

/**
 * Wiki 附件管理
 * Class WikiAssetUploadController
 * @package App\Http\Controllers\Admin\Wiki
 */
class WikiAssetUploadController extends BaseController
{
    /**
     * 上传图片
     */
    public function uploadImg()
    {
        if (isset($_FILES['editormd-image-file'])) {
            $file = $this->request->file('editormd-image-file');
            $dirPath = 'media-store/wiki/img/';
            $allowExt = explode('|', env('WIKI_UPLOAD_IMAGE_EXT', 'jpg|jpeg|gif|png'));
            return $this->upload($dirPath, $file, $allowExt);
        } else {
            $data['success'] = 0;
            $data['message'] = '非法';
            return $this->response->json($data);
        }
    }

    /**
     * 上传文件
     */
    public function uploadFile()
    {
        if (isset($_FILES['editormd-file-file'])) {
            $file = $this->request->file('editormd-file-file');
            $dirPath = 'media-store/wiki/file/';
            $allowExt = explode('|', env('WIKI_UPLOAD_FILE_EXT', 'txt|doc|docx|xls|xlsx|ppt|pptx|pdf|7z|rar|zip'));
            return $this->upload($dirPath, $file, $allowExt);
        } else {
            $data['success'] = 0;
            $data['message'] = '非法';
            return $this->response->json($data);
        }
    }

    /**
     * 执行存文件操作
     * @param string $dirPath 存储文件夹
     * @param UploadedFile $file 文件
     * @param array $allowExt 允许上传的文件类型后缀
     * @return \Illuminate\Http\JsonResponse
     */
    private function upload($dirPath, UploadedFile $file, $allowExt)
    {
        $dir = public_path($dirPath . date('Ym'));
        //如果目标目录不能创建
        if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
            $data['success'] = 0;
            $data['message'] = '上传目录没有创建文件夹权限';
            return $this->response->json($data);
        }
        //如果目标目录没有写入权限
        if (is_dir($dir) && !is_writable($dir)) {
            $data['success'] = 0;
            $data['message'] = '上传目录没有写入权限';
            return $this->response->json($data);
        }
        //校验文件
        if (isset($file) && $file->isValid()) {
            $ext = $file->getClientOriginalExtension(); // 上传文件的后缀
            //判断是否是图片
            if (empty($ext) or in_array(strtolower($ext), $allowExt) === false) {
                $data['success'] = 0;
                $data['message'] = '不允许的文件类型';
                return $this->response->json($data);
            }
            //生成文件名
            $fileName = uniqid() . '_' . dechex(microtime(true)) . '.' . $ext;
            try {
                $path = $file->move($dirPath . date('Ym'), $fileName);

                $webPath = '/' . $path->getPath() . '/' . $fileName;

                $data['success'] = 1;
                $data['message'] = 'ok';
                $data['alt'] = $file->getClientOriginalName();
                $data['url'] = url($webPath);
                return $this->response->json($data);

            } catch (Exception $ex) {
                $data['success'] = 0;
                $data['message'] = $ex->getMessage();
                return $this->response->json($data);
            }

        }
        $data['success'] = 0;
        $data['message'] = '文件校验失败';
        return $this->response->json($data);
    }

}
