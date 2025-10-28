<?php
require_once __DIR__ . './admin_messagesDao.php';
require_once __DIR__ . './baseDao.php';
require_once __DIR__ . './interestDao.php';
require_once __DIR__ . './listingDao.php';
require_once __DIR__ . './propertiesDao.php';
require_once __DIR__ . './userDao.php';


$admin = new Admin_messagesDao();
$intr = new InterestDao();
$list = new ListingDao();
$prop = new PropertiesDao();
$user = new UserDao();


$adimn->add([
    "user_id"=>2, "property_id"=> 1, "message"=>"Testing admin messages"
]);

$user->add([

]);

?>