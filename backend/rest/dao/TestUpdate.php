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


print_r(
/*
$user->update_user(["email" => "J2D@yahoo.com"],3)
*/
/*
$user->update_user(["username" => "JD2"],3)
*/

);
echo "<br>";echo "<br>";
?>