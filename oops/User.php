<?php

class User
{
    public function register($userDetails)
    {
        echo "User Register Successfully";
        print_r($userDetails);
    }

    public function login($email, $password)
    {
        echo "User Login Successfully";
        print_r($email, $password);
    }
    public static function bcrypt($password)
    {
        return sha1($password);
    }
}

// echo User::bcrypt('rekha143');

// $user = new User;

// $user->register([
//     'name' => 'amitabh bachhan',
//     'email' => 'test@gmail.cin',
//     'password' => 'rekha143'
// ]);
