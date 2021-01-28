<?php


namespace App\Http\Controllers\Admin\XMind;

use App\Http\Controllers\BaseController;
use App\Http\ErrorDesc;
use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentImageEntity;
use sinri\XMindWriter\XMapContent\XMapContentMarkerRefsEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
use sinri\XMindWriter\XMapStyles\XMapNormalStylesEntity;
use sinri\XMindWriter\XMapStyles\XMapStyleEntity;
use sinri\XMindWriter\XMapStyles\XMapStylesEntity;
use sinri\XMindWriter\XMapStyles\XMapStyleTypePropertiesEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;
use sinri\XMindWriter\XMetaInfo\XMetaEntity;

/**
 * 思维导图导出为Xmind文件
 * Class XMindExportController
 * @package App\Http\Controllers\Admin\XMind
 */
class XMindExportController extends BaseController
{

    private static $DIR = "/xmind-temp/";

    function exportXMind()
    {
        $data = $this->request->input('data', null);
        $result = $this->generateXmind($data);
        return $this->buildResponse(ErrorDesc::SUCCESS, $result);
    }

    private function generateXMind($data)
    {
        $jsonData = json_decode($data, true);
        $fileName = "" . md5($jsonData['root']['data']['text']) . $this->getCurTime() . ".xmind";
        $filePath = $this->getXMindFilePath($fileName);
        $instance = new XMapContentEntity();
        $sheet = $this->createSheet();
        $instance->addSheet($sheet);
        $sheet->setTopic($this->parseTopic($jsonData['root']));
        $manifest = (new XManifestEntity());
        $meta = $this->createMeta();
        $stylesInstance = $this->createStyle();

        (new XMindDirZipper($this->getXMindWorkspace()))
            ->setContentEntity($instance)
            ->setManifestEntity($manifest)
            ->setStylesEntity($stylesInstance)
            ->setMetaEntity($meta)
            ->buildXMind($filePath);
        return XMindExportController::$DIR . $fileName;
    }

    private function getXMindWorkspace()
    {
        return public_path("xmind-temp/workspace");
    }

    private function getXMindFilePath($fileName)
    {

        return public_path(XMindExportController::$DIR . $fileName);
    }

    private function createStyle()
    {
        $stylesInstance = new XMapStylesEntity();
        $normalStyles = new XMapNormalStylesEntity();
        $properties = (new XMapStyleTypePropertiesEntity(XMapStyleEntity::TYPE_TOPIC));
        $properties->setAttrSvgFill("#FF0000");

        $normalStyles->addStyleEntity(
            (new XMapStyleEntity(
                "style-topic-1",
                $properties->getType(),
                "style-topic-1",
                $properties
            ))
        );
        $stylesInstance->setStyles($normalStyles);
        return $stylesInstance;
    }

    private function createMeta()
    {
        return (new XMetaEntity())
            ->setAuthorName("techflowing")
            ->setAuthorEmail("techflowing@gmail.com")
            ->setCreateTime(date("Y-m-d H:i:s"))
            ->setCreatorName("sinri-xmind-writer");
    }

    private function createSheet()
    {
        return new XMapContentSheetEntity("S1", "Sheet1");
    }


    private function parseTopic($topicData)
    {
        $topic = new XMapContentTopicEntity($this->getCurTime(), $topicData['data']['text']);

//        if (isset($topicData['data']['image'])) {
//            $topic->setImage($this->parseTopicImage($topicData));
//        }

        if (isset($topicData['data']['hyperlink'])) {
            $topic->setAttrXlinkHref($topicData['data']['hyperlink']);
        }

        if (isset($topicData['data']['progress']) || isset($topicData['data']['priority'])) {
            $topic->setMarkerRefs($this->parseTopicMarkerRefs($topicData));
        }

        if ($topicData['children'] != null) {
            foreach ($topicData['children'] as $item) {
                $topic->addChildTopicToTopics($this->parseTopic($item));
            }
        }
        return $topic;
    }


    private function parseTopicMarkerRefs($topicData)
    {
        $refs = new XMapContentMarkerRefsEntity();
        if (isset($topicData['data']['progress'])) {
            $refs->addMarkerWithId($this->getProgress($topicData['data']['progress']));
        }
        if (isset($topicData['data']['priority'])) {
            $refs->addMarkerWithId($this->getPriority($topicData['data']['priority']));
        }
        return $refs;
    }

    /**
     * 暂时无效，待查原因
     */
    private function parseTopicImage($topicData)
    {
        return (new XMapContentImageEntity())
            ->setAttrXHtmlSrc($topicData['data']['image'])
            ->setAttrSvgWidth($topicData['data']['imageSize']['width'])
            ->setAttrSvgHeight($topicData['data']['imageSize']['height'])
            ->setAttrAlign(XMapContentImageEntity::ALIGN_BOTTOM);
    }

    private function getCurTime()
    {
        return $timestamp = intval(microtime(true) * 1000);
    }

    private function getPriority($priority)
    {
        $map = [
            "1" => "priority-1",
            "2" => "priority-2",
            "3" => "priority-3",
            "4" => "priority-4",
            "5" => "priority-5",
            "6" => "priority-6",
            "7" => "priority-7",
            "8" => "priority-8"
        ];
        return $map[$priority];
    }

    private function getProgress($progress)
    {
        $map = [
            "1" => "task-start",
            "2" => "task-oct",
            "3" => "task-quarter",
            "4" => "task-3oct",
            "5" => "task-half",
            "6" => "task-5oct",
            "7" => "task-3quar",
            "8" => "task-7oct",
            "9" => "task-done"
        ];
        return $map[$progress];
    }
}
