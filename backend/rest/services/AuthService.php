<?php
require_once 'BaseService.php';
require_once 'UserService.php';
require_once __DIR__ . "/../dao/AuthDao.php";
require_once __DIR__ . "/../../data/Roles.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthService extends BaseService{
    private $user_service;

    public function __construct(){
        $this->user_service = new UserService();

        parent::__construct(new AuthDao);
    }



    public function get_by_username($username){
        return $this->dao->get_by_username($username);
    }

    public function get_by_email($email){
        return $this->dao->get_by_email($email);
    }


    public function signup ($entity) {
        if(empty($entity['name'])
            || empty($entity['surname'])
            || empty($entity['date_of_birth'])
            || empty($entity['gender'])
            || empty($entity['email'])
            || empty($entity['phone_number'])
            || empty($entity['country'])
            || empty($entity['current_address'])
            || !isset($entity['is_agent'])
            || empty($entity['username'])
            || empty($entity['password'])
            ){
            return ['success' => false, 'error' => 'All fields are required.'];
        }


        $username_exists = $this -> get_by_username($entity['username']);
        $email_exists = $this -> get_by_email($entity['email']);
        if($username_exists)
            return ['success' => false, 'error' => 'Username already registered.'];
        
        if($email_exists)
            return ['success' => false, 'error' => 'Email already registered.'];
        

        $entity['password'] = password_hash($entity['password'], PASSWORD_BCRYPT);
        $entity['role'] = roles::USER;
        $entity = $this->user_service->add_user($entity);

        unset($entity['password']);

        return ['success' => true, 'data' => $entity];
    }

    public function login($entity) {
        if(empty($entity['username']) || empty($entity['password'])) {
            return ['success' => false, 'error' => 'Email and password are required.'];
        }

        $user = $this->get_by_username($entity['username']);

        if(!$user || !password_verify($entity['password'], $user['password']))
            return ['success' => false, 'error' => 'Invalid username or password.'];

        unset($user['password']);


        $jwt_payload = [
            'user' => $user,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 3),
            'role' => $user['role']
        ];

        $token = JWT::encode(
            $jwt_payload,
            Config::JWT_SECRET(),
            'HS256'
        );

        return ['success' => true, 'data' => array_merge($user, ['token' => $token])];
    }
}
?>