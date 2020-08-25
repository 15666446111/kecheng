<?php
/**
 * Created by Aliyun ApsaraVideo VoD.
 * User: https://www.aliyun.com/product/vod
 * API document: https://help.aliyun.com/document_detail/98467.html
 */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'voduploadsdk' . DIRECTORY_SEPARATOR . 'Autoloader.php';

date_default_timezone_set('PRC');

// 测试上传本地辅助媒资文件
function testUploadLocalAttachedMedia($accessKeyId, $accessKeySecret, $filePath)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadAttachedRequest = new UploadAttachedMediaRequest($filePath, 'watermark',
            'testUploadLocalAttachedMedia via PHP-SDK');
        //$uploadAttachedRequest->setCateId(1000009458);
        $res = $uploader->uploadLocalAttachedMedia($uploadAttachedRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadLocalAttachedMedia Failed, ErrorMessage: %s\n", $e->getMessage());
    }

}

// 测试上传网络辅助媒资文件
function testUploadWebAttachedMedia($accessKeyId, $accessKeySecret, $fileURL)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadAttachedRequest = new UploadAttachedMediaRequest($fileURL, 'watermark',
            'testUploadWebAttachedMedia via PHP-SDK');
        //$uploadAttachedRequest->setCateId(1000009458);
        $res = $uploader->uploadWebAttachedMedia($uploadAttachedRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadWebAttachedMedia Failed, ErrorMessage: %s\n", $e->getMessage());
    }

}


####  执行测试代码   ####
$accessKeyId = '<AccessKeyId>';
$accessKeySecret = '<AccessKeySecret>';

$localFilePath = '/opt/image/test.png';
//testUploadLocalAttachedMedia($accessKeyId, $accessKeySecret, $localFilePath);

$webFileURL = 'http://vod-download.cn-shanghai.aliyuncs.com/retina/pic/20180208/496AE240-54AE-4CC8-8578-3EEC8F386E0B.gif';
testUploadWebAttachedMedia($accessKeyId, $accessKeySecret, $webFileURL);