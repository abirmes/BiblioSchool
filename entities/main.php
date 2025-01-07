<?php



include_once 'Categorie.php';
include_once 'Livre.php';
include_once 'Utilisateur.php';


class Main
{
    public static Categorie $abir1;

    public static function _main()
    {
        self::$abir1 = new Categorie();
        var_dump(self::$abir1);
    }
}
