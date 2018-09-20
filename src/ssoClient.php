<?php

namespace Shopex\Sso;

class ssoClient{

    private $sso_url;
    private $app_id;
    private $app_secret;

    public function __construct()
    {
        $this->sso_url = config('shopexsso.api_url');
        $this->app_id = config('shopexsso.app_id');
        $this->app_secret = config('shopexsso.app_secret');
    }

    public function getLoginUrl($redirect_url,$level=0){
        $query = http_build_query(array(
                'response_type'=>'code',
                'scope'=>'login',
                'app_id' => $this->app_id,
                'redirect_uri'=> $redirect_url,
                'level' => $level,
            ));

        $login_url = $this->getSsoUrl('sso/login', $query);
        return $login_url;
    }

    public function getLogoutUrl($token,$redirect_url=null){
        $query = http_build_query(array(
                'token'=>$token,
                'redirect_url'=>$redirect_url,
            ));

        $login_url = $this->getSsoUrl('sso/logout', $query);
        return $login_url;
    }
    public function getUserInfo($code){
        $query = http_build_query([
            'code'=>$code,
            'sign'=>md5($code.$this->app_secret)
        ]);
        $token_url = $this->getSsoUrl('sso/api/token', $query);
        $content = file_get_contents($token_url);
        $data = json_decode($content,1);
        return $data;
    }
    private function getSsoUrl($path, $query = ''){
        if($this->sso_url==''){
            throw new \Exception('sso_url_is_error');
        }
        $url = rtrim($this->sso_url,'/').'/'.trim($path,'/');
        if($query){
            $url .= '?'.$query;
        }
        return $url;
    }

}