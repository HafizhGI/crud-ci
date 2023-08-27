<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    function cek_login($user_name, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT
        T1.user_name,
        T1.password,
        T1.access
        FROM `master_user` T1 
        Where T1.user_name ='$user_name' AND T1.password = '$password'
        GROUP BY
        T1.user_name,
        T1.password");

        return $results = $query->getRowArray();
    }
}
