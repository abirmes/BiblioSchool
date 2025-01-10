<?php


include_once 'database.php';
include_once 'Categorie.php';
include_once 'Livre.php';
include_once 'Utilisateur.php';
include_once 'Categorie.php';


$abir1 = new Utilisateur();
$abir1->set_id(1);
$abir1->set_fullname('abir meskini');
$abir1->set_email('abir@gmail.com');
$abir1->set_phone('+2123654789');
$abir1->set_password('new password');
$abir1->get_role()->set_name('gerant');
$livre = new Livre();
$etat = new Etat();
// $abir1->reserve_book()->set_etat($etat);
// $abir1->reserve_book()->get_etat()->set_name('terminé');

// $livre->set_book_name('shatter me');
// $abir1->reserve_book()->set_livre($livre);
// $abir1->reserve_book()->set_duration(3);

$cat = new Categorie();
$cat->set_name('tarikh');
$cat->set_description('the past');
$cat->create(); 
var_dump($cat);

// var_dump($abir1);








// $duration = $res->get_duration;
// $res = new Reservation();
// $res->get_etat()->set_name("reserved");
// var_dump($res);