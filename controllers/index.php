<?php  if(! defined("BASEPATH")) exit("no direct acces to script");

/**
 * @copyright Zerobias 2013
 * an interactive website for sports
 * view conroller : handles all functions  related to reading 
 * articles,rating , commenting and sub commenting
 * @author : nwadiugwu "ebuoe" chukwuebuka
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


