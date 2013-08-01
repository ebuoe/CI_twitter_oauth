<html>
<head>
<title>twitter config success</title>
<style type="text/css">

body {
background-color:  #fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#990000;
margin:				0 0 4px 0;
}
</style>

<script type="text/javascript">
function ci_twitter()
{
var link = "<?php echo site_url()."ci_twitter_callback/index"; ?>";
window.open(link,"_blank","toolbar=no, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400");
}
</script>
</head>
<body>
	<div id="content">
		<img src="<?php echo base_url()."twitteroauth/images/darker.png";?>" style="cursor:pointer" onclick="ci_twitter()"  />
		
		<p>
		<a href="<?php echo site_url()."index/test_tweet_update"; ?>"  >post a test tweet (works only after authentication
		, check timeline after clicking to verify tweet was posted) </a>
		</p>
		
		
	</div>
</body>
</html>
