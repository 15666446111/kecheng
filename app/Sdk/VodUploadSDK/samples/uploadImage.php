<?php
/**
 * Created by Aliyun ApsaraVideo VoD.
 * User: https://www.aliyun.com/product/vod
 * API document: https://help.aliyun.com/document_detail/55619.html
 */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'voduploadsdk' . DIRECTORY_SEPARATOR . 'Autoloader.php';

date_default_timezone_set('PRC');

// 测试上传本地图片
function testUploadLocalImage($accessKeyId, $accessKeySecret, $filePath)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadImageRequest = new UploadImageRequest($filePath, 'testUploadLocalImage via PHP-SDK');
        $uploadImageRequest->setCateId(1000009458);
        $res = $uploader->uploadLocalImage($uploadImageRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadLocalImage Failed, ErrorMessage: %s\n", $e->getMessage());
    }

}

// 测试上传网络图片
function testUploadWebImage($accessKeyId, $accessKeySecret, $fileURL)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadImageRequest = new UploadImageRequest($fileURL, 'testUploadWebImage via PHP-SDK');
        $uploadImageRequest->setCateId(1000009458);
        $res = $uploader->uploadWebImage($uploadImageRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadWebImage Failed, ErrorMessage: %s\n", $e->getMessage());
    }

}



####  执行测试代码   ####
$accessKeyId = '<AccessKeyId>';
$accessKeySecret = '<AccessKeySecret>';

$localFilePath = '/opt/image/test-image.jpg';
//testUploadLocalImage($accessKeyId, $accessKeySecret, $localFilePath);

$webFileURL = 'http://vod-download.cn-shanghai.aliyuncs.com/retina/pic/20180208/496AE240-54AE-4CC8-8578-3EEC8F386E0B.gif';
testUploadWebImage($accessKeyId, $accessKeySecret, $webFileURL);