<?php

/**
 * Use OAuth Echo to upload a picture to Twitpic and then Tweet about it.
 *
 * Although this example uses your user token/secret, you can use
 * the user token/secret of any user who has authorised your application.
 *
 * Remember to set the variable $twitpic_key to be your TwitPic API Key from
 * here:
 *    http://dev.twitpic.com/apps/
 *
 * Instructions:
 * 1) If you don't have one already, create a Twitter application on
 *      https://dev.twitter.com/apps
 * 2) From the application details page copy the consumer key and consumer
 *      secret into the place in this code marked with (YOUR_CONSUMER_KEY
 *      and YOUR_CONSUMER_SECRET)
 * 3) From the application details page copy the access token and access token
 *      secret into the place in this code marked with (A_USER_TOKEN
 *      and A_USER_SECRET)
 * 4) Visit this page using your web browser.
 *
 * @author themattharris
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'tmhOAuth.php';
require 'tmhUtilities.php';
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'Z7KUAygbuwfkncTxcWsMA',
  'consumer_secret' => 
  'lJ837iJowcMtAOew8eTEbBkEOSdK83KZbrvuSv8',
  'user_token'      => '1100115169-P26CpdOuWST9TlB9UCswIhbajaWfU8eeuJxtPKn',
  'user_secret'     => 'OxWd12tSkCI2p2lksGv5IEZtfKXQvOolXMWxpj9VDI'
));

// https://api.twitter.com/1.1/statuses/retweets_of_me.json
$code = $tmhOAuth->request('GET', $tmhOAuth->url('1/account/verify_credentials'));

if ($code == 200) {
  echo 'The access level of this token is: ' . $tmhOAuth->response['headers']['x_access_level'] . PHP_EOL;
  tmhUtilities::pr($tmhOAuth->response);
} else {
  echo "wtf";
  echo tmhUtilities::pr(htmlentities($tmhOAuth->response['response']));
}