<?php


class LecturerController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $id = filter_input(INPUT_POST, 'txtId');
            $name = filter_input(INPUT_POST, 'txtName');
            $email = filter_input(INPUT_POST, 'txtEmail');
            $phone = filter_input(INPUT_POST, 'txtPhone');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $confPass = filter_input(INPUT_POST, 'txtConfPass');
            if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone, $password, $confPass))) {
                if ($password == $confPass) {
                    Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addLecturer_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $password));
                    header("refresh:0");
                } else {
                    echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">Login Password and Confirm Password Must be The Same !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';
                }
            } else {
                echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">Invalid Inputs ! Please Check Again !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllLecturer_service.php", array());
        $dataLecturer = json_decode($data);
        include_once 'Client/View/add_lecturer.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getLecturer_service.php", array('txtId' => $id));
            $lecturer = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $email = filter_input(INPUT_POST, 'txtEmail');
            $phone = filter_input(INPUT_POST, 'txtPhone');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $confPass = filter_input(INPUT_POST, 'txtConfPass');
            if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone))) {
                if (View_Util::fieldIsNotEmpty(array($password, $confPass))) {
                    if ($password == $confPass) {
                        Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateLecturer_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => md5($password)));
                        header("location:index.php?menu=lecturer");
                    } else {
                        echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">Login Password and Confirm Password Must be The Same !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';
                    }
                }else {
                    Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateLecturer_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $lecturer->status->password));
                    header("location:index.php?menu=lecturer");
                }
            } else {
                echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">Invalid Inputs ! Please Check Again !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';
            }
        }
        include_once 'Client/View/update_lecturer.php';
    }

    public function lecturerLogin()
    {
        $loginPressed = filter_input(INPUT_POST, 'btnLogin');
        if (isset($loginPressed)) {
            $username = filter_input(INPUT_POST, 'txtUsername');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/lecturerLogin_service.php", array('txtUsername' => $username, 'txtPassword' => $password));
            $userLogin = json_decode($data);
            if ($userLogin != null and $userLogin->status != 'Invalid Inputs') {
                $_SESSION['user_logged'] = true;
                $_SESSION['name'] = $userLogin->status->name;
                $_SESSION['id'] = $userLogin->status->id;
                $_SESSION['role'] = $userLogin->status->role_name;
                header("location:index.php");
            } else if ($username == 'admin' and $password == 'admin') {
                $_SESSION['user_logged'] = true;
                $_SESSION['name'] = 'Admin';
                $_SESSION['role'] = 'admin';
                header("location:index.php");
            } else {
                echo '
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ERROR !</div>
                      <div class="h5 mb-0 font-weight-bold text-red">Invalid Username or Password !</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    </div>
                  </div>
                </div>
            </div>';
            }
        }
        if (isset($errMsg)) {
            echo '<div class="err-msg">' . $errMsg . '</div>';
        }
        include_once 'Client/View/lecturer_login.php';
    }
}