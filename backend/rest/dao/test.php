<?php
require_once __DIR__ . './Admin_messagesDao.php';
require_once __DIR__ . './BaseDao.php';
require_once __DIR__ . './InterestDao.php';
require_once __DIR__ . './ListingDao.php';
require_once __DIR__ . './PropertiesDao.php';
require_once __DIR__ . './UserDao.php';


$admin = new Admin_messagesDao();

$adimn->get_all();
$admin->get_by_user_id(2);
$admin->get_by_property_id(1);


$intr = new InterestDao();

$intr->get_all();
$intr->get_by_status("Active");
$intr->get_by_status_and_intrested_id("Active", 1);
$intr->get_by_status_and_owner_id("Active",2);


$list = new ListingDao();

$list->get_all();
$list->get_address_by_status("Active");
$list->get_by_status("Active");
$list->get_first_by_status("Active");
$list->get_first_by_type_and_status("Luxury Villa", "Active");
$list->get_by_type_and_status("Luxury Villa", "Active");
$lisr->get_first_N_of_status("Active", 5);


$prop = new PropertiesDao();

$prop->get_all();
$prop->get_all_area();
$prop->get_sum_area();


$user = new UserDao();

$user->get_all();
$user->get_by_role(FALSE);
$user->get_all_usersnames(FALSE);
$user->get_by_id(1);
$user->get_basic_data_by_id(2);
$user->get_by_username("Peri155");



?>