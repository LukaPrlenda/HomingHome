<?php
require_once __DIR__ . '/Admin_messagesDao.php';
require_once __DIR__ . '/BaseDao.php';
require_once __DIR__ . '/InterestDao.php';
require_once __DIR__ . '/ListingDao.php';
require_once __DIR__ . '/PropertiesDao.php';
require_once __DIR__ . '/UserDao.php';


$admin = new Admin_messagesDao();


print_r($admin->get_all_admin_messages());
echo "<br>";echo "<br>";
print_r($admin->get_by_user_id(2));
echo "<br>";echo "<br>";
print_r($admin->get_by_property_id(1));
echo "<br>";echo "<br>";echo "<br>";echo "<br>";


$intr = new InterestDao();

print_r($intr->get_all_interests());
echo "<br>";echo "<br>";
print_r($intr->get_by_status("Active"));
echo "<br>";echo "<br>";
print_r($intr->get_by_status_and_interested_id("Active", 1));
echo "<br>";echo "<br>";
print_r($intr->get_by_status_and_owner_id("Active",2));
echo "<br>";echo "<br>";echo "<br>";echo "<br>";


$list = new ListingDao();

print_r($list->get_all_listings());
echo "<br>";echo "<br>";
print_r($list->get_address_by_status("Active"));
echo "<br>";echo "<br>";
print_r($list->get_by_status("Active"));
echo "<br>";echo "<br>";
print_r($list->get_first_by_status("Active"));
echo "<br>";echo "<br>";
print_r($list->get_first_by_type_and_status("Luxury Villa", "Active"));
echo "<br>";echo "<br>";
print_r($list->get_by_type_and_status("Luxury Villa", "Active"));
echo "<br>";echo "<br>";
print_r($list->get_first_N_of_status("Active", 5));
echo "<br>";echo "<br>";echo "<br>";echo "<br>";


$prop = new PropertiesDao();

print_r($prop->get_all_properties());
echo "<br>";echo "<br>";
print_r($prop->get_all_area());
echo "<br>";echo "<br>";
print_r($prop->get_sum_area());
echo "<br>";echo "<br>";echo "<br>";echo "<br>";


$user = new UserDao();

print_r($user->get_all_users());
echo "<br>";echo "<br>";
print_r($user->get_by_role(FALSE));
echo "<br>";echo "<br>";
print_r($user->get_by_role(TRUE));
echo "<br>";echo "<br>";
print_r($user->get_all_usersnames(FALSE));
echo "<br>";echo "<br>";
print_r($user->get_by_id(1));
echo "<br>";echo "<br>";
print_r($user->get_basic_data_by_id(2));
echo "<br>";echo "<br>";
print_r($user->get_by_username("Peri155"));
echo "<br>";echo "<br>";echo "<br>";echo "<br>";



?>