<?php
/**
 * Created by Aliyun ApsaraVideo VoD.
 * User: https://www.aliyun.com/product/vod
 * API document: https://help.aliyun.com/document_detail/55407.html
 */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'voduploadsdk' . DIRECTORY_SEPARATOR . 'Autoloader.php';

date_default_timezone_set('PRC');

// 测试上传本地视频
function testUploadLocalVideo($accessKeyId, $accessKeySecret, $filePath)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadVideoRequest = new UploadVideoRequest($filePath, 'testUploadLocalVideo via PHP-SDK');
        //$uploadVideoRequest->setCateId(1);
        //$uploadVideoRequest->setCoverURL("http://xxxx.jpg");
        //$uploadVideoRequest->setTags('test1,test2');
        //$uploadVideoRequest->setStorageLocation('outin-xx.oss-cn-beijing.aliyuncs.com');
        //$uploadVideoRequest->setTemplateGroupId('6ae347b0140181ad371d197ebe289326');
        $userData = array(
            "MessageCallback"=>array("CallbackURL"=>"https://demo.sample.com/ProcessMessageCallback"),
            "Extend"=>array("localId"=>"xxx", "test"=>"www")
        );
        $uploadVideoRequest->setUserData(json_encode($userData));
        $res = $uploader->uploadLocalVideo($uploadVideoRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadLocalVideo Failed, ErrorMessage: %s\n Location: %s %s\n Trace: %s\n",
            $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
    }
}

// 测试上传网络视频
function testUploadWebVideo($accessKeyId, $accessKeySecret, $fileURL)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadVideoRequest = new UploadVideoRequest($fileURL, 'testUploadWebVideo via PHP-SDK');
        $res = $uploader->uploadWebVideo($uploadVideoRequest);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadWebVideo Failed, ErrorMessage: %s\n Location: %s %s\n Trace: %s\n",
            $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
    }
}

// 测试上传本地m3u8视频
function testUploadLocalM3u8($accessKeyId, $accessKeySecret, $m3u8FilePath)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadVideoRequest = new UploadVideoRequest($m3u8FilePath, 'testUploadLocalM3u8 via PHP-SDK');
        // 调用接口解析m3u8的分片地址列表，如果解析结果不准确，请自行拼接地址列表(默认分片文件和m3u8文件位于同一目录)
        $sliceFiles = $uploader->parseM3u8File($m3u8FilePath);
        //print_r($sliceFiles);
        $res = $uploader->uploadLocalM3u8($uploadVideoRequest, $sliceFiles);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadLocalM3u8 Failed, ErrorMessage: %s\n Location: %s %s\n Trace: %s\n",
            $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
    }
}

// 测试上传网络m3u8视频
function testUploadWebM3u8($accessKeyId, $accessKeySecret, $m3u8FileUrl)
{
    try {
        $uploader = new AliyunVodUploader($accessKeyId, $accessKeySecret);
        $uploadVideoRequest = new UploadVideoRequest($m3u8FileUrl, 'testUploadWebM3u8 via PHP-SDK');
        // 调用接口解析m3u8的分片地址列表，如果解析结果不准确，请自行拼接地址列表(默认分片文件和m3u8文件位于同一目录)
        $sliceFileUrls = $uploader->parseM3u8File($m3u8FileUrl);
        //print_r($sliceFileUrls);
        $res = $uploader->uploadWebM3u8($uploadVideoRequest, $sliceFileUrls);
        print_r($res);
    } catch (Exception $e) {
        printf("testUploadWebM3u8 Failed, ErrorMessage: %s\n Location: %s %s\n Trace: %s\n",
            $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
    }
}


####  执行测试代码   ####
$accessKeyId = '<AccessKeyId>';
$accessKeySecret = '<AccessKeySecret>';


//$localFilePath = 'C:\test\sample.mp4';
$localFilePath = '/opt/video/sample.mp4';
//testUploadLocalVideo($accessKeyId, $accessKeySecret, $localFilePath);

$webFileURL = 'http://vod-test1.cn-shanghai.aliyuncs.com/b55b904bc612463b812990b7c8cc95c8/daa30814c0c340cf8199926f78aa5c0e-a0bc05ba62c3e95cc672e88b828148c9-ld.mp4?auth_key=1608774986-0-0-c56acd302bea0c331370d8ed686502fe';
testUploadWebVideo($accessKeyId, $accessKeySecret, $webFileURL);

$localM3u8FilePath = '/opt/video/m3u8/sample.m3u8';
//testUploadLocalM3u8($accessKeyId, $accessKeySecret, $localM3u8FilePath);

$webM3u8FileURL = 'http://vod-test1.cn-shanghai.aliyuncs.com/b55b904bc612463b812990b7c8cc95c8/daa30814c0c340cf8199926f78aa5c0e-195a25af366b5edae324c47e99a03f04-ld.m3u8?auth_key=1608775606-0-0-9fb038deaecd009dadd86721c5855629';
//testUploadWebM3u8($accessKeyId, $accessKeySecret, $webM3u8FileURL);