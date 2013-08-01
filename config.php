<?php

/**
 * @file
 * A single location to store configuration.
 */
 
 $base_url = "http://root-folder/";
 
 $callback = $base_url.'ci_twitter_callback/verify_token';

define('CONSUMER_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('CONSUMER_SECRET', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('OAUTH_CALLBACK', $callback);
