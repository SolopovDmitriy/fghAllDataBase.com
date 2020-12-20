<?php

namespace MyAdmApp {

    use MyApp\MethodExecuter as Mexec;
    use MyApp\NavigateModel;
    use MyApp\View;

    class AdminController extends Mexec
    {
        private $header = [];
        private $content = [];
        private $footer = [];


        public function index()// главная страница админки
        {
            if (UserAuth::isAuth()) {// проверяет авторизированный пользователь или нет
                View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
                View::RenderAdm(ADM_VIEWS_PATH . "template" . EXT,
                                ADM_PAGES_PATH . "main" . EXT, [
                                    ADM_VIEWS_PATH.'navbartop'.EXT,
                                    ADM_VIEWS_PATH.'navbarsidebar'.EXT,
                                ], $this->content);
                View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
            } else {
                $this->loginin();
            }
        }

        public function loginin()
        {
            View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
            View::Render(ADM_VIEWS_PATH . "template" . EXT, ADM_PAGES_PATH . "loginin" . EXT, $this->content);
            View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
        }

        public function verificateEmail($id)
        {
            $this->content['id'] = $id;
            View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
            View::Render(ADM_VIEWS_PATH . "template" . EXT, ADM_PAGES_PATH . "verificateEmail" . EXT, $this->content);
            View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
        }

        public function register()
        {
            View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
            View::Render(ADM_VIEWS_PATH . "template" . EXT, ADM_PAGES_PATH . "register" . EXT, $this->content);
            View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
        }


        public function changePassword()
        {
            $this ->content['user']= UserAuth::user();
            View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
            View::Render(ADM_VIEWS_PATH . "template" . EXT, ADM_PAGES_PATH . "changePassword" . EXT, $this->content);
            View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
        }



        public function options(){
            if (UserAuth::isAuth()) {
                View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
                View::RenderAdm(ADM_VIEWS_PATH . "template" . EXT,
                    ADM_PAGES_PATH . "options" . EXT, [
                        ADM_VIEWS_PATH.'navbartop'.EXT,
                        ADM_VIEWS_PATH.'navbarsidebar'.EXT,
                    ], $this->content);
                View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
            } else {
                $this->loginin();
            }
        }

        public function navbar(){
            if (UserAuth::isAuth()) {
                //$navM = new NavigateModel();
                //$this->content['navigate'] = $navM->getManyRows([], 'id', 'ASC', 100);

                View::Render(ADM_VIEWS_PATH . "header" . EXT, null, $this->header);
                View::RenderAdm(ADM_VIEWS_PATH . "template" . EXT,
                    ADM_PAGES_PATH . "navbar" . EXT, [
                        ADM_VIEWS_PATH.'navbartop'.EXT,
                        ADM_VIEWS_PATH.'navbarsidebar'.EXT,
                    ], $this->content);
                View::Render(ADM_VIEWS_PATH . "footer" . EXT, null, $this->footer);
            } else {
                $this->loginin();
            }
        }

        public function logout()
        {
            UserAuth::userSessionDestroy();
            header('Location: /controlpanel/admin');
            exit;
        }

        public function registeruser() {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $login = htmlspecialchars(trim($_POST['login']));
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));
                $cpassword = htmlspecialchars(trim($_POST['cpassword']));
                if($password == $cpassword) {
                    $password = hash("sha256", $password);
                    //varSuperDump($login."+".$email."+".$password);
                    $userM = new UserModel();
                    if($userM->createNewUser($login, $email, $password)) {
                        $this->content['success'] = "Ввведите число, которое пришло к Вам на почту";
                        $user = $userM->findUser($email, $password);
                        $verificateEmailRandomNumber = hash("sha256", $user['id'] . "hello");
                        mail($email, 'Тема письма', $verificateEmailRandomNumber, 'From: testphp358@gmail.com');
                        $this->verificateEmail($user['id']);
                        exit;
                    }
                }
            }
            $this->content['error'] = "Операция неуспешна. Введены некорректные данные";
            $this->register();
        }

        public function checkuser()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));
                $password = hash("sha256", $password);

                $userM = new UserModel();
                $user = $userM->checkUser($email, $password);

                if ($user == null) {
                    $this->content['error'] = "В доступе отказано, попробуйте ещё";
                    $this->loginin();
                } else {
                    //session_start();
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    header('Location: /controlpanel/admin');
                    exit;
                }
            }
        }

        public function checkVerificateNumber()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $number = htmlspecialchars(trim($_POST['number']));
                $id = htmlspecialchars(trim($_POST['id']));
                $verificateEmailRandomNumber = hash("sha256", $id . "hello");
//                echo "number = " . $number . " id = " . $id . " verificateEmailRandomNumber = "  . $verificateEmailRandomNumber;
                if ($number==$verificateEmailRandomNumber){
                    $userM = new UserModel();
                    $userM->updateOneRow($id,['Verificated'=>1]);
                    $this->loginin();
                }
            }
        }

        public function resetPassword()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = htmlspecialchars(trim($_POST['email']));
                $userM = new UserModel();
                $user = $userM->findUserByEmail($email);
                if ($user!=null){

                    $key =  $email.'hello';                     // к почте прибавляем кодовое слово hello получаем div.solopov@@gmail.comhello
                    $encryptedKey=hash("sha256", $key );   // зашифровываем div.solopov@@gmail.comhello и получаем sd46gsrdgdgh76strh
                    $href="http://fghalldatabase.com/controlpanel/admin/DoResetPassword/?key=$encryptedKey&email=$email";
                    //$href="http://fghalldatabase.com/controlpanel/admin/DoResetPassword/?key=sd46gsrdgdgh76strh&email=div.solopov@gmail.com";

                    // $password = bin2hex(random_bytes (7));
                    $password = substr($encryptedKey, 0,10);
                    mail($email, 'Тема письма', "Если это Вы хотите сбросить пароль, то перейдите по ссылке $href Ваш новый пароль: $password", 'From: testphp358@gmail.com');
//                    $newPassword = hash("sha256",  $password);
//                    $userM->updateOneRow($user['id'],['password'=>$newPassword]);
//                    $this->loginin();
                }
            }
        }
        public function DoResetPassword()
        {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {

                // simple
                // id = 2,    key = id + 10; send = 2 + 10 = 12;
                // client send id=2, key = 13
                // key2 = id + 10 = 12 ? равно  key = 12

                // email = div.solopov@@gmail.com;  key =  hash("sha256", div.solopov@@gmail.comhello) = "sdfrehytrdred"

                //email


//                echo "I am server ". $_GET['key']; // from client
//                echo '<br>';

                $key =  $_GET ['email'].'hello'; // $key = div.solopov@@gmail.comhello
                $encryptedKey=hash("sha256", $key ); // зашифровываем снова div.solopov@@gmail.comhello и получаем sd46gsrdgdgh76strh
//                echo "I am server ". $encryptedKey;

                if($_GET['key'] == $encryptedKey){ //сравниваем два ключа один от пользователя, а второй , который сгенерировал сервер повторно

                    echo "1";
                    $password = substr($encryptedKey, 0,10);
                    echo "2";
                    $newPassword = hash("sha256",  $password);
                    echo "3";
                    $userM = new UserModel();
                    echo "4";
                    $user = $userM->findUserByEmail($_GET['email']);
                    echo "5";
                    $userM->updateOneRow($user['id'],['password'=>$newPassword]);
                    echo "6";
                    //$this->loginin();
                }

            }
        }

        public function updatePassword()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $oldPassword = htmlspecialchars(trim($_POST['oldPassword']));
                $newPassword = htmlspecialchars(trim($_POST['newPassword']));
                $userM = new UserModel();
                $login=$_SESSION['login'];
                $user = $userM->findUserByLoginPassword($login, hash("sha256", $oldPassword));
                if ($user!=null){
                    $newPassword = hash("sha256",  $newPassword);
                    $userM->updateOneRow($user['id'],['password'=>$newPassword]);
                    $this->loginin();
                }
                else{
                   echo 'Вы ввели неправильный пароль';
                }
            }
        }











    }
}