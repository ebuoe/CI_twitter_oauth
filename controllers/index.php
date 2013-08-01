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

class index extends CI_Controller
{
  
  
  
  function __construct()
	{
	parent::__construct();
	$this->load->helper(array('html','url'));
	$this->load->library('ci_twitter_oauth');
	}
   
   /*home page for demo*/
    function index()
	{
	$this->load->view("index");
	}
	
    function test_tweet_update()
	{
	/*feel free to change the test tweet , it would feel good to get a s/o tho */
	$update ="twitteroauth by @abraham ported for CI by, @ebuoe test successful. :)";
	
	/*the call that handles the update*/
	$this->ci_twitter_oauth->post_update($update);
	
	
	$this->load->view("index");
	}


}


