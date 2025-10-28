<?php
require_once __DIR__ . '/Admin_messagesDao.php';
require_once __DIR__ . '/BaseDao.php';
require_once __DIR__ . '/InterestDao.php';
require_once __DIR__ . '/ListingDao.php';
require_once __DIR__ . '/PropertiesDao.php';
require_once __DIR__ . '/UserDao.php';


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