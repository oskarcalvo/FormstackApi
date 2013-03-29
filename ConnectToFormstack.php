<?php
class FormstackApiConnection
{
  /**
   * Define the private atributes
   */
  private $host = 'https://www.formstack.com/api/v2/';


  /**
   * Build all the getter and setter to add the diferent values we need.
   */

  /**
  * Define OauthToken
  */
  public function getOauthToken()
  {
    return $this->OauthToken;
  }
  public function setOauthToken($oauth_token)
  {
    $this->OauthToken = $oauth_token;
  }

  /**
  * Define Application name
  */
  public function getAppName()
  {
    return $this->AppName;
  }
  public function setAppName($app_name)
  {
    $this->AppName = $app_name;
  }

  /**
  * Define Client Id
  */
  public function getClientId()
  {
    return $this->ClientId;
  }
  public function setClientId($client_id)
  {
    $this->ClientId = $client_id;
  }

  /**
  * Define Client secret
  */
  public function getClientSecret()
  {
    return $this->ClientSecret;
  }
  public function setClientSecret($client_secret)
  {
    $this->ClientSecret = $client_secret;
  }


  // no general methods.
  public function setAction($action)
  {
    $this->Action = $action;
  }

  public function getAction($action)
  {
    return $this->Action;
  }

  public function setFormId($form_id)
  {
    $this->FormId = $form_id;
  }

  public function getFormId($form_id)
  {
    return $this->FormId;
  }

  public function setPostData($postdata)
  {
    $this->PostData = $postdata;
  }

  public function getPostData($postData)
  {
    return $this->PostData;
  }

}

?>
