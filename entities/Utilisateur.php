<?php
require_once "database.php";
require_once 'Role.php';
require_once 'Reservation.php';



class Utilisateur
{
    private int $id;
    private string $fullname;
    private string $email;
    private string $password;
    private string $phone;
    private Role $role;
    private Reservation $reservation;
    private $db;


    public function __construct()
    {
        $this->db = new DBConnection() ;
        $this->role = new Role();

    }


    
    //setters

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
    

    //getters
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


    //to string
    public function __toString()
    {
        return 'fullname is: ' . $this->get_fullname() . ' email is: ' . $this->get_email() . ' phone number is : ' . $this->get_phone() . ' password is: **********';
    }
    


    //role setter and getter
    public function set_role($role)
    {
        $this->role = $role;
    }public function get_role()
    {
        return $this->role;
    }

    //reservation setter
    public function set_reservation(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }
    public function get_reservation()
    {
        return $this->reservation;
    }

    //reserve a book

    public function check_role()
    {
        return $this->role->get_name();
    }
    public function reserve_book()
    {
        //if condition here for the role must be 'apprenant'
        // condition for it to be in etat termineé
        
        if ($this->check_role() == 'apprenant')
        {
            // $this->;
        }
        
    }

    // public function free_reservation()
    // {
    //     if($this->reservation->get_etat() == "terminé")
    //     {
    //         $this->reservation = NULl;
    //     }
    // }



    












}
