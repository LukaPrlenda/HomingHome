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

/*
print_r(

$admin->add([
    "user_id"=>2, "property_id"=> 1, "message"=>"Testing admin messages 2"
])


$user->add([
    "name" => "Brzo",
    "surname" => "Brzić",
    "date_of_birth" => "1999-10-20",
    "gender" => "Male",
    "email" => "Brzi@gmial.com",
    "phone_number" => "001336554987",
    "country" => "Germany",
    "current_address" => "Guethe",
    "is_agent" => TRUE,
    "username" => "Brzi",
    "password" => password_hash('BrzoBrzić', PASSWORD_DEFAULT),
    "is_admin" => FALSE

])

);
echo "<br>";echo "<br>";
print_r(

$user->add([
    "name" => "Petko",
    "surname" => "Nedeljković",
    "date_of_birth" => "2000-01-20",
    "gender" => "Male",
    "email" => "Suba123@gmial.com",
    "phone_number" => "001336554555",
    "country" => "France",
    "current_address" => "32th street",
    "is_agent" => TRUE,
    "username" => "Sub123",
    "password" => password_hash('PetkoNedeljković', PASSWORD_DEFAULT),
    "is_admin" => FALSE

])

);
echo "<br>";echo "<br>";
print_r(

$user->add([
    "name" => "Fin",
    "surname" => "Storm",
    "date_of_birth" => "1987-07-18",
    "gender" => "Male",
    "email" => "fn2187@gmial.com",
    "phone_number" => "001336552187",
    "country" => "Croatia",
    "current_address" => "Šenoin put 10",
    "is_agent" => TRUE,
    "username" => "Sub123",
    "password" => password_hash('FN2187', PASSWORD_DEFAULT),
    "is_admin" => TRUE

])

);
echo "<br>";echo "<br>";
*/
/*
echo "<br>";echo "<br>";
print_r(
    $user->add([
        "name" => "Nyota",
        "surname" => "Uhura",
        "date_of_birth" => "2010-05-15",  
        "gender" => "Female",
        "email" => "nyota.uhura@gmial.com",
        "phone_number" => "001336551111",
        "country" => "United States",
        "current_address" => "Starfleet Academy, San Francisco",
        "is_agent" => TRUE,
        "username" => "NyotaU",
        "password" => password_hash('NyotaUhura', PASSWORD_DEFAULT),
        "is_admin" => FALSE
    ])
);

echo "<br>";echo "<br>";
print_r(
    $user->add([
        "name" => "Seven",
        "surname" => "of Nine",
        "date_of_birth" => "2008-07-09",  
        "gender" => "Female",
        "email" => "seven.ofnine@gmial.com",
        "phone_number" => "001336552222",
        "country" => "United Federation of Planets",
        "current_address" => "USS Voyager",
        "is_agent" => FALSE,
        "username" => "Seven9",
        "password" => password_hash('SevenOfNine', PASSWORD_DEFAULT),
        "is_admin" => FALSE
    ])
);
*/
/*
print_r(
    $prop->add([
        "user_id" => 3,
        "type_id" => 3,
        "location" => "34 Hope Street Portland, OR 42680",  
        "bedrooms" => 4,
        "bathrooms" => 4,
        "area" => 540,
        "floor" => 3,
        "parking" => 1,
        "price" => 925600,
        "picture" => "",
        "description" => "This modern apartment offers a cozy living space with enough room for a family of four. It is located in a quiet, pleasant neighborhood.

Nearby you'll find several parks and a local market. The building is three years old and features modern amenities.",
    ])
);
*/
/*
print_r(
    $prop->add([
        "user_id" => 3,
        "type_id" => 1,
        "location" => "22 Hope Street Portland, OR 16540",  
        "bedrooms" => 4,
        "bathrooms" => 5,
        "area" => 350,
        "floor" => 2,
        "parking" => 3,
        "price" => 1925600,
        "picture" => "",
        "description" => "This modern villa offers a relaxed and comfortable lifestyle for those who enjoy peaceful living. The cutting-edge kitchen provides a beautiful space for cooking and spending quality time with family.

Surrounding the villa is a lovely garden with areas for various activities, as well as an outdoor kitchen designed for the perfect open-air cooking experience.",
    ])
);
echo "<br>";echo "<br>";

print_r(
    $prop->add([
        "user_id" => 9,
        "type_id" => 2,
        "location" => "12 Hope Street Portland, OR 12650",  
        "bedrooms" => 5,
        "bathrooms" => 6,
        "area" => 350,
        "floor" => 60,
        "parking" => 3,
        "price" => 2500000,
        "picture" => "",
        "description" => "This top-of-the-line penthouse offers stunning panoramic views of the city. It is the perfect retreat for those who want to relax while staying connected to the vibrant downtown atmosphere.

Built just a year ago, this fully furnished modern residence combines luxury and comfort. Expansive balconies wrap around the unit, offering a sense of openness while keeping you peacefully insulated from city noise.",
    ])
);
echo "<br>";echo "<br>";
*/
/*
print_r(
    $list->add([
        "property_id" => 3,
        "status" => "Active"  
       ])
);
echo "<br>";echo "<br>";

print_r(
    $list->add([
        "property_id" => 4,
        "status" => "Active"  
       ])
);
echo "<br>";echo "<br>";
*/
/*
print_r(
    $intr->add([
        "property_id" => 1,
        "user_id" => 7,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it" 
       ])
);
echo "<br>";echo "<br>";

print_r(
    $intr->add([
        "property_id" => 2,
        "user_id" => 7,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it"  
       ])
);
echo "<br>";echo "<br>";
print_r(
    $intr->add([
        "property_id" => 3,
        "user_id" => 5,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it" 
       ])
);
echo "<br>";echo "<br>";

print_r(
    $intr->add([
        "property_id" => 3,
        "user_id" => 10,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it"  
       ])
);
echo "<br>";echo "<br>";
print_r(
    $intr->add([
        "property_id" => 4,
        "user_id" => 5,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it" 
       ])
);
echo "<br>";echo "<br>";

print_r(
    $intr->add([
        "property_id" => 2,
        "user_id" => 5,
        "status" => "Active",
        "message" => "I am interested in your property, and i want to take a look at it"  
       ])
);
echo "<br>";echo "<br>";
*/
?>