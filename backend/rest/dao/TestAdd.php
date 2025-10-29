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
$admin->add([
    "user_id"=>2, "property_id"=> 1, "message"=>"Testing admin messages 2"
])
*/
/*
$user->add([
    "name" => "John",
    "surname" => "Doe",
    "date_of_birth" => "1911-01-01",
    "gender" => "Male",
    "email" => "JD@gmial.com",
    "phone_number" => "00111098765432",
    "country" => "Canada",
    "current_address" => "31st Street",
    "is_agent" => FALSE,
    "username" => "JD",
    "password" => password_hash('D0nJ031234567890', PASSWORD_DEFAULT),
    "is_admin" => FALSE

])
*/
);
echo "<br>";echo "<br>";
?>