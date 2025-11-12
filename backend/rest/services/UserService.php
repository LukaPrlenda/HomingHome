<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/UserDao.php";

class UserService extends BaseService{
    public function __construct(){
        parent::__construct(new UserDao);
    }

    
    public function get_by_role($is_admin){
        return $this->dao->get_by_role($is_admin);
    }


    public function get_all_usersnames($is_admin){
        return $this->dao->get_all_usersnames($is_admin);
    }

    public function get_by_id($id){
        return $this->dao->get_by_id($id);
    }

    public function get_basic_data_by_id($id){
        return $this->dao->get_basic_data_by_id($id);
    }

    public function get_by_username($username){
        return $this->dao->get_by_username($username);
    }


    public function get_all_users(){
        return $this->dao->get_all_users();
    }

    public function add_user($entity){

        $today = new DateTime();
        $birth = new DateTime($entity["date_of_birth"]);

        $age = $today->diff($birth)->y;

        if($age < 18)
            throw new Exception("Your age is not appropriate");

        return $this->dao->add_user($entity);
    }

    public function update_user($entity, $id, $id_column = "id"){
        return $this->dao->update_user($entity, $id, $id_column);
    }

    public function delete_user($id){
        return $this->dao->delete_user($id);
    }
}
?>