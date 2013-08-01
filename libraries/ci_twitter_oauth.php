<?php if (!defined('BASEPATH')) exit('no direct access allowed');

/**
 * ci_tweitter_oauth library for codeiginter
 *
 *
 * @package  	libraries
 * @author		nwadiugwu @ebuoe chukwuebuka
 * @version		tested with CI 2.0.2
 * @based on	twitterOauth by Abraham Williams
 */
 
 require_once('twitteroauth/twitteroauth.php');
 require_once('twitteroauth/config.php');
 
 class Ci_twitter_oauth
 {
 
 /*
constructor to load libraries needed,
if you intend to store values in the database , remove the comment
slashes from load database and model respectively and load 
required database and model
 */
    function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library(array('session','encrypt'));
		//$this->ci->load->database();  if database is required
		//$this->ci->load->model('');  if database is required
		$this->ci->encrypt->set_cipher(MCRYPT_BLOWFISH); 
	}//end /constructor
 
 
    function request_access()
	{
		

      /* Build TwitterOAuth object with client credentials. */
      $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
 
     /* Get temporary credentials. */
     $request_token = $connection->getRequestToken(OAUTH_CALLBACK);

     /* Save temporary credentials to session. */
    $token = $request_token['oauth_token'];
	 
	 $user_data=array(
					  'oauth_token'	=> $request_token['oauth_token'],
					  'oauth_token_secret'	=> $request_token['oauth_token_secret']
						);
						
     $this->ci->session->set_userdata($user_data);
	 
     /* If last connection failed don't display authorization link. */
        switch ($connection->http_code) {
        case 200:
        /* Build authorize URL and redirect user to Twitter. */
        $url = $connection->getAuthorizeURL($token);
        header('Location: ' . $url); 
        break;
        default:
        /* Show notification if something went wrong. */
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
	
						
	    }//end twitter login
	
     }
	 
	 
	 /*
	 this funtion handles the verification of the ouath token 
	 using a value passed to it from the verify_token function 
	 in the ci_twitter_callback controller
	 */
	 function verify_token($verifier)
	 {
	  $connection = new TwitterOAuth(CONSUMER_KEY,
	                                CONSUMER_SECRET,
									$this->ci->session->userdata("oauth_token"),
									$this->ci->session->userdata("oauth_token_secret")
									);
	
      //get permanent access tokens	
      $access_token = $connection->getAccessToken($verifier);
	  
	  //empty temporary access tokens
	  $user_data=array( 'oauth_token'	=> '','oauth_token_secret'	=> '');
						
     $this->ci->session->unset_userdata($user_data);
	 
	 //update sessions with permanent access tokens
	 $user_data=array(
					  'oauth_token'	=> $access_token['oauth_token'],
					  'oauth_token_secret'	=> $access_token['oauth_token_secret']
						);
						
     $this->ci->session->set_userdata($user_data);
	 
	 //if you want to store values in the database for later use , sample code to help.
	 /*
	 
	 $user_data=array(
					  'twitter_oauth_token_column_in_db_table'	=> $access_token['oauth_token'],
					  'twitter_oauth_secret_column_in_db_table'	=> $access_token['oauth_token_secret']
						);
						
	 $user_id = $this->ci->session->userdata("current_user_id");
					
     $this->ci->model->function_to_handle_update($user_data,$user_id);
	 */
	  
	 }
	 
	 
	 //function for posting twitter updates
	 function post_update($update)
	 {
	    /* Create a TwitterOauth object with consumer/user tokens.
		this uses permanent tokens for creating object , so u can simply retrieve 
		values in the database save them in a session named oauth_token/oauth_token_secret
		*/
		$connection = new TwitterOAuth(CONSUMER_KEY,
	                                CONSUMER_SECRET,
									$this->ci->session->userdata("oauth_token"),
									$this->ci->session->userdata("oauth_token_secret")
									);

		/* If method is set change API call made. Test is called by default. */
		$connection->post('statuses/update', array('status' => $update));
	 }
 
 

 
 }//end class
