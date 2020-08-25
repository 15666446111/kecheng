<?php

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/**
	 * [$app 实例化的wechart 工厂]
	 * @var [type]
	 */
	protected $app;


	/**
	 * [$oauth oauth 授权 ]
	 * @var [type]
	 */
	protected $oauth;


	public function __construct()
	{
		$this->app = Factory::officialAccount(config('wechat.official_account.default'));

		$this->oauth = $this->app->oauth;
	}



    /**
     * @Author    Pudding
     * @DateTime  2020-08-13
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 微信公众号 调用网页授权登陆 ]
     * @param     Request     $request [description]
     * @return    [type]               [description]
     */
    public function wxIndex(Request $request)
    {
    	/**
    	 * @version   [< 如果当前用户未登陆的情况下 >]
    	 */
		if (empty($_SESSION['wechat_user'])) {

		  	$_SESSION['target_url'] = 'user/profile';

		  	return $this->oauth->redirect();
		}

		$user = $_SESSION['wechat_user'];

    }



    /**
     * @Author    Pudding
     * @DateTime  2020-08-13
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 微信 授权回调页面]
     * @param     Request     $request [description]
     * @return    [type]               [description]
     */
    public function wxCallback(Request $request)
    {
    	$user 	= $this->oauth->user();

    	$_SESSION['wechat_user'] = $user->toArray();

    	$targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];

    	header('location:'. $targetUrl);
    }
}
