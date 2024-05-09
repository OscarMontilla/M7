<?php
ini_set('display_errors', 1);
require('abstract.databoundobject.php');
require('class.pdofactory.php');
require('class.twitter.php');
require('TwitterAPIExchange.php');

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$responseJson = $twitter->setGetfield($getfield)
                   ->buildOauth($url, $requestMethod)
                   ->performRequest();

$json = json_decode($responseJson, true);

$url = $json['url'];
$author_name = $json['author_name'];
$author_url = $json['author_url'];
$provider_name = $json['provider_name'];



$objTwitter = new Twitter($objPDO);

$objTwitter->setUrl($url);

$objTwitter->setAuthorName($author_name);

$objTwitter->setAuthorUrl($author_url);

$objTwitter->setProviderName($provider_name);

$objTwitter->save();

echo "Se han insertado los valores correctamente";