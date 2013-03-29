<?php

  class formstackSubmissions
  {


    private $oauth_token;
    private $app_name;
    private $client_id;
    private $client_secret;
    private $postdata;
    private $action;
    private $form_id;
    private $host = 'https://www.formstack.com/api/v2/';
    private $element_id;
    private $data_type;
    private $call_type;




    // Geters and Seters

    /**
     * Define OauthToken
      */
    public function setOauthToken($oauth_token = NULL)
    {

      return $this->OauthToken = $oauth_token;
    }
    /*

    /*
    * Define App Name
    */
    public function setAppName($app_name = NULL)
    {
      return $this->AppName = $app_name;
    }

    /**
    * Define Client id
    */
    public function setClientId($client_id = NULL)
    {
      return $this->ClientId = $client_id;
    }

    /*
    * Define Client secret
    */
    public function setClientSecret($client_secret = NULL)
    {
      return $this->ClientSecret = $client_secret;
    }

    /*
    * Define Action
    */
    public function setAction($action = NULL)
    {
      return $this->Action = $action;
    }

    /*
    * Define DataType
    */
    public function setDataType($data_type = 'json')
    {
      return $this->DataType = $data_type;
    }

    /**
    * Define Element Id
    */
    public function setElementId($element_id = 'NULL')
    {
      return $this->ElementId = $element_id;
    }

    /*
    * Define PostData
    */
    public function setPostData($postdata = 'NULL')
    {
      $this->PostData = $postdata;
    }

    public function getPostData()
    {
      return $this->PostData;

    }

    /**
    * Define Call type
    */
    public function setCallType($call_type = 'GET')
    {
      $this->CallType = $call_type;
    }

    public function getCallType()
    {
      return $this->CallType;
    }

    /**
    * Build the Oauth Token para form the urls
    */
    private function defineOauthAsArgument()
    {
      return array('oauth_token' => $this->OauthToken);
    }


    /*
    * Process all the parame that build the url.
    *
    * @return an array if there is params and return null if there is nothing
    */
    private function ProcessPostData()
    {

      // If we have Oauth token we can works, else we can make nothing
      if($this->defineOauthAsArgument())
      {
        $param = array();
        $param = $this->defineOauthAsArgument();
      }
      else
      {
        return NULL;
      }

      $op = $this->getCallType();

      if($this->getPostData() != NULL)
      {

        $param += $this->getPostData();
      }

      switch ($op) {
        case 'GET':
      $elements ='';
      $zz= 0;
          foreach ($param as $name => $value) {
            $separador = ($zz == 0)? '?' : '&';
            $elements .= "$separador{$name}=" .$value;
            $zz++;
          }
          return $elements;

          break;

        case 'POST':
          foreach ($param as $key => $value) {
            $elements[] = "{$name}=".urlencode($value);
          }
          return $elements;

          break;
      }
      return NULL;
    }


    // Metodos para conseguir los submissions.
    public function setUrl()
    {
      $urlArguments = $this->ProcessPostData();

      $url = $this->host . $this->Action. '.' . $this->DataType . $this->ProcessPostData();

      return $url;
    }


    // metodo para hacer las llamadas get
    public function makeCurlCall($url)
    {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPGET, TRUE);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-type' =>  'application/json'));
      curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
      curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
      curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');

      $result =  curl_exec($curl);
      curl_close($curl);

      return $result;
    }
  }
?>
