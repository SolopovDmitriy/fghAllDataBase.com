<?php

namespace MyAdmApp {

    use MyApp\DBEngine as Engine;

    class  UserModel extends Engine
    {
        public function __construct()
        {
            parent::__construct('users');
        }

        public function checkUser($email, $password)
        {
            $result = $this->getManyRows([
                'email' => $email,
                'password' => $password,
                'Verificated'=> 1
            ], 'id', 'ASC', 1);

            return ($result == null) ? null : $result[0];
        }
        public function findUser($email, $password)
        {
            $result = $this->getManyRows([
                'email' => $email,
                'password' => $password,
            ], 'id', 'ASC', 1);

            return ($result == null) ? null : $result[0];
        }

        public function findUserByEmail($email)
        {
            $result = $this->getManyRows([
                'email' => $email

            ], 'id', 'ASC', 1);

            return ($result == null) ? null : $result[0];
        }

        public function findUserByLoginPassword($login,$password)
        {
            $result = $this->getManyRows([
                'login' => $login,
                 'password' => $password
            ], 'id', 'ASC', 1);

            return ($result == null) ? null : $result[0];
        }








        public function  createNewUser($login, $email, $password){
            return $this->addNewRow([
                'email'=>$email,
                'login'=>$login,
                'password'=>$password
            ]);
        }
    }
}