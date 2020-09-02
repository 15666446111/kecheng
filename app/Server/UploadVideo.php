<?php

namespace App\Server;

use OSS\OssClient;
use AlibabaCloud\Vod\Vod;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class UploadVideo
{
	private $client;

	private $callback = '';

    private $accessKeyId = '';

    private $accessKeySecret = '';


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [ 初始化赋值 配置信息 ]
     * @version   [version]
     */
    public function __construct()
    {
    	$this->callback = config('aliyun.onDemand.callback');

        $this->accessKeyId = env('ALI_VIDEO_ACCESS_ID');

        $this->accessKeySecret = env('ALI_VIDEO_ACCESS_KEY');

        $this->initVodClient();
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 初始化信息 ]
     * @return    [type]      [description]
     */
    public function initVodClient()
    {
        $regionId = 'cn-shanghai';  // 点播服务接入区域

        $this->client = AlibabaCloud::accessKeyClient( $this->accessKeyId, $this->accessKeySecret)->regionId($regionId)
            			->connectTimeout(1)->timeout(3)->asDefaultClient();
    }

    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 初始化点播 ]
     * @param     [type]      $uploadAuth    [description]
     * @param     [type]      $uploadAddress [description]
     * @return    [type]                     [description]
     */
    public  function initOssClient($uploadAuth, $uploadAddress)
    {
        $ossClient = new OssClient($uploadAuth['AccessKeyId'], $uploadAuth['AccessKeySecret'], $uploadAddress['Endpoint'],
            false, $uploadAuth['SecurityToken']);

        $ossClient->setTimeout(86400 * 7);    // 设置请求超时时间，单位秒，默认是5184000秒, 建议不要设置太小，如果上传文件很大，消耗的时间会比较长

        $ossClient->setConnectTimeout(10);    // 设置连接超时时间，单位秒，默认是10秒
        return $ossClient;
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 获取播放地址 ]
     * @param     [type]      $videoId [description]
     * @return    [type]               [description]
     */
    public  function getPlayInfo($videoId)
    {
        try{
            $request = Vod::v20170321()->getPlayInfo()->withVideoId($videoId)->format('JSON')->request();
            return array("status" => 1, "data" => $request);
        }catch (Exception $e){
            return array("status" => 0, "data" => $e->getMessage());
        }
    }



    public function getPlayAuth($videoId)
    {
        try{
            $request = Vod::v20170321()->getVideoPlayAuth()->withVideoId($videoId)->format('JSON')->request();
            return array("status" => 1, "data" => $request->PlayAuth);
        }catch (Exception $e){
            return array("status" => 0, "data" => $e->getMessage());
        }
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [上传本地视频-点播转码]
     * @param     [type]      $data       [description]
     * @param     integer     $isCallback [description]
     * @param     [type]      $localFile  [description]
     * @return    [type]                  [description]
     */
    public  function localUploadLocalVideo( $data, $isCallback = 1, $localFile)
    {
        $request = Vod::v20170321()->createUploadVideo();

        $request->withTitle($data['title']);//标题，UTF8,128大小

        $request->withFileName($data['fileName']);//视频源文件名

        $request->withDescription(isset($data['description']) ? $data['description'] : '');//描述,utf-8

        $request->withCoverURL(isset($data['coverURL']) ? $data['coverURL'] : '');//封面url

        $request->withCateId(isset($data['cateId']) ? $data['cateId'] : ''); //分类id

        $request->withTags(isset($data['tags']) ? $data['tags'] : '');      //标签，隔开

        $request->withTemplateGroupId(isset($data['templateGroupId']) ? $data['templateGroupId'] : ''); //转码模板组ID

        $request->withStorageLocation(isset($data['storageLocation']) ? $data['storageLocation'] : ''); //存储地址

        if($isCallback == 1)
        {
            $userData = array(
                "MessageCallback" => array("CallbackURL" => "http://www.baidu.com"),
                "Extend" => array("title" => $data['title']),
                'EventType' => 'TranscodeComplete',
            );
            $request->withUserData(json_encode($userData));
        }
        $result = $request->request();
        $videoId = $result->VideoId;

        $uploadAddress 	= json_decode(base64_decode($result->UploadAddress), true);
        $uploadAuth 	= json_decode(base64_decode($result->UploadAuth), true);
        $ossClient 		= self::initOssClient($uploadAuth, $uploadAddress);
        self::multipartUploadFile($ossClient, $uploadAddress, $localFile);
        return array("status" => 1, "data" => $videoId);
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 分片上传 ]
     * @param     [type]      $ossClient     [description]
     * @param     [type]      $uploadAddress [description]
     * @param     [type]      $localFile     [description]
     * @return    [type]                     [description]
     */
    public  function multipartUploadFile($ossClient, $uploadAddress, $localFile)
    {
        return $ossClient->multiuploadFile($uploadAddress['Bucket'], $uploadAddress['FileName'], $localFile);
    }


}