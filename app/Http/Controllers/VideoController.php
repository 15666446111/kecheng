<?php

namespace App\Http\Controllers;

use App\Server\UploadVideo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    
	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-03
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 加密视频播放地址 ]
	 * @param     Request     $request [description]
	 * @return    [type]               [description]
	 */
    public function video(Request $request)
    {

    	if(!$request->id) abort(404);

    	// 查找科二科三的当前id视频
    	$video = \App\SubjectTwoThree::where('id', $request->id)->first();
    	if(empty($video)) abort(404);


        $AttachmentAction   = new UploadVideo();
        $authData = $AttachmentAction->getPlayAuth($video->video_url);
        $auth = $authData['data'];
        //dd($auth);


    	return view('video', compact('video', 'auth'));
    }
}
