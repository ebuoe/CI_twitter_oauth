<?php  if(! defined("BASEPATH")) exit("no direct acces to script");

/**
 * ci_tweitter_oauth library for codeiginter
 *
 *
 * @package		libraries
 * @author		nwadiugwu @ebuoe chukwuebuka
 * @version		tested with CI 2.0.2
 * @based on	twitterOauth by Abraham Williams
 */

class ci_twitter_callback extends CI_Controller
{
  
  
  
  function __construct()
	{
	parent::__construct();
	$this->load->helper(array('html','url'));
	$this->load->library('ci_twitter_oauth');
	}
   
   /*function for requesting access , this would be accessed via
   a javascript pop up window on the view page
   you can modify to suit your needs tho   */
    function index()
	{
	$this->ci_twitter_oauth->request_access();
	}
	
	/*callback page for verifying token*/
	function verify_token()
	{
	
	  if(isset($_GET['oauth_token']) &&  isset($_GET['oauth_verifier']))
	  {
		   $get_oauth_token = $_GET['oauth_token'];
		   if(isset($_GET['oauth_verifier']))
		   {
		   $verifier = $_GET['oauth_verifier'];
		   }
		   else
		   {
		   $verifier = "";
		   }
		   
		   $this->ci_twitter_oauth->verify_token($verifier);
		  
		  
		  
          $this->load->view("ci_twitter_success");
		   
	    }	
	
	}
	
	
	


}


