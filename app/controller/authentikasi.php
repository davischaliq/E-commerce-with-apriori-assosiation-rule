<?php


Class authentikasi extends Controller
{ 
    Public function signin($username, $password)
    {
        $data = array('username'=>$username, 'password'=>$password);
        $err = $this->model('authModel')->Login($data);
        if ($err['founduser'] > 0) {
            $_SESSION['user'] = $username;
            return $err = 'usersukses';
        }else {
            return $err = 'usergagal';
        }
    }

    Public function loginadmin($username, $password)
    {
        $data = array('username'=>$username, 'password'=>$password);
        $err = $this->model('authModel')->Loginadmin($data);
        if ($err['founduser'] > 0) {
            $_SESSION['admin'] = $username;
            return $err = 0;
        }else {
            return $err = 1;
        } 
    }

    Public function regist($firstname, $lastname, $email, $password, $username)
    {
        $dataCheck = array('username'=>$username, 'email'=>$email);
        $cek = $this->cekUsername($dataCheck);
        if ($cek > 0) {
            $err = 1;
        }else {
            $data = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'username' => $username, 'password' => $password);
            $rowusers= $this->model('authModel')->InputDetailuser($data);
            if ($rowusers > 0) {
                $row = $this->model('authModel')->InputRegist($data);
                if ($row > 0) {
                    $err = 0;     
                }
            }
        }
        return $err;
    }

    Public function cekUsername($username)
    {
        $err = $this->model('authModel')->registered($username);
        if ($err['found'] > 0) {
            return $err['found'];
        }else {
            $err = 0;
            return $err;
        }
    }
    Public function logoutuser()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            // session_destroy();
            return 0;
        }
    }
    Public function logoutadmin()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            // session_destroy();
            return 0;
        }
    }
}