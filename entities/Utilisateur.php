<?php
require_once "../core/config/database.php";
require_once 'Role.php';

class Utilisateur
{
    private int $id;
    private string $fullname;
    private string $email;
    private string $password;
    private string $phone;
    private Role $role;
    private $reservations;
    private $db;


    public function __construct()
    {
        $this->db = new DBConnection() ;
        $this->role = new Role();

    }


    


    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_fullname($fullname)
    {
        $this->fullname = $fullname;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }
    public function set_phone($phone)
    {
        $this->phone = $phone;
    }
    public function set_role($role)
    {
        $this->role = $role;
    }


    public function get_id()
    {
        return $this->id;
    }
    public function get_fullname()
    {
        return $this->fullname;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_phone()
    {
        return $this->phone;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_role()
    {
        return $this->role;
    }



    public function __toString()
    {
        return 'fullname is: ' . $this->get_fullname() . ' email is: ' . $this->get_email() . ' phone number is : ' . $this->get_phone() . ' password is: **********';
    }













}
$abir1 = new Utilisateur();
$abir1->set_id(1);
$abir1->set_fullname('abir meskini');
$abir1->set_email('abir@gmail.com');
$abir1->set_phone('+2123654789');
$abir1->set_password('new password');
$abir1->get_role()->set_name('mym');

var_dump($abir1);