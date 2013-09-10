<?php namespace Thomaswelton\LaravelFacebook;

use Config;
use Session;
use \Purl\Url;

class Facebook extends \Facebook\Facebook{

	function __construct(){
		$config = array(
			'appId' => Config::get('laravel-facebook::appId'),
			'secret' => Config::get('laravel-facebook::secret')
		);

		parent::__construct($config);
	}

	public function getSignedRequest($useSession = true){

		$signedRequest = parent::getSignedRequest();

		if(is_array($signedRequest)){

			Session::put('signed_request', $signedRequest);
			return $signedRequest;

		}else if($useSession){

			return Session::get('signed_request');

		}
	}

	/**
	 * Checks to see if the user has "liked" the page by checking a signed request
	 * @return int -1 don't know, 0 doesn't like, 1 liked
	 */
	public function hasLiked(){
		$signedRequest = $this->getSignedRequest();

		if(!is_array($signedRequest) || !array_key_exists('page', $signedRequest)){
			// We dont know
			return -1;
		}else{
			// Return the value Facebook told us
			return $signedRequest['page']['liked'];
		}
	}

	public function getNamespace(){
		return Config::get('facebook::namespace');
	}

	public function getPageId(){
		return Config::get('facebook::pageId');
	}

	public function getTabAppUrl(){
		$pageId = $this->getPageId();

		if($pageId){
			$appId = $this->getAppId();
			return "http://www.facebook.com/pages/null/{$pageId}?sk=app_{$appId}";

		}
		return null;
	}

	public function getShareUrl($data = array()){
        $appId = $this->getAppId();

        if($appId && false){
            $shareUrl = new Url('https://www.facebook.com/dialog/feed');

            $defaults = array(  'app_id' => $this->getAppId(),
                                'redirect_uri' => url());

            $shareParams = array_merge($defaults, $data);
        }else{
            // http://stackoverflow.com/questions/12547088/how-do-i-customize-facebooks-sharer-php

            // Map the new og key names to the old sharer format
            $sharerData = array();
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'link':
                        $sharerData['url'] = $value;
                        break;

                    case 'name':
                        $sharerData['title'] = $value;
                        break;

                    case 'description':
                        $sharerData['summary'] = $value;
                        break;

                    case 'picture':
                        $sharerData['images'][] = $value;
                        break;

                    default:
                        $sharerData[$key] = $value;
                        break;
                }
            }

            $shareUrl = new Url('https://www.facebook.com/sharer/sharer.php');
            $shareParams = array('s' => 100, 'p' => $sharerData);
        }

		$shareUrl->query->setData($shareParams);
        return $shareUrl;
	}

	public function getCanvasUrl($path = ''){
		return ($this->getNamespace()) ? 'http://apps.facebook.com/' . $this->getNamespace() . '/' . $path : null;
	}
}
