<?php


class StudentController
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
            $address = filter_input(INPUT_POST, 'txtAddress');
            if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone, $password, $confPass, $address))) {
                if ($password == $confPass) {
                    if ($_FILES['txtPhoto']['name'] != "") {
                        $targetFile = 'Uploads/Photo/' . $id . '_Photo.' . pathinfo($_FILES['txtPhoto']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $targetFile);
                        $photo = $targetFile;
                    } else {
                        $photo = null;
                    }
                    if ($_FILES['txtCv']['name'] != "") {
                        $targetFile = 'Uploads/CV/' . $id . '_CV.' . pathinfo($_FILES['txtCv']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtCv']['tmp_name'], $targetFile);
                        $cv = $targetFile;
                    } else {
                        $cv = null;
                    }
                    if ($_FILES['txtTranscript']['name'] != "") {
                        $targetFile = 'Uploads/Transcript/' . $id . '_Transcript.' . pathinfo($_FILES['txtTranscript']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtTranscript']['tmp_name'], $targetFile);
                        $transcript = $targetFile;
                    } else {
                        $transcript = null;
                    }
                    Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addStudent_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $password, 'txtPhoto' => $photo, 'txtCv' => $cv, 'txtTranscript' => $transcript, 'txtAddress' => $address));
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
                $err_msg = 'Please Check Input !';
            }
        }
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllStudent_service.php", array());
        $dataStudent = json_decode($data);
        include_once 'Client/View/add_student.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getStudent_service.php", array('txtId' => $id));
            $student = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $email = filter_input(INPUT_POST, 'txtEmail');
            $phone = filter_input(INPUT_POST, 'txtPhone');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $confPass = filter_input(INPUT_POST, 'txtConfPass');
            $address = filter_input(INPUT_POST, 'txtAddress');
            if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone, $address))) {
                if ($_FILES['txtPhoto']['name'] != "") {
                    $targetFile = 'Uploads/Photo/' . $id . '_Photo.' . pathinfo($_FILES['txtPhoto']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $targetFile);
                    $photo = $targetFile;
                } else {
                    $photo = $student->status->photo;
                }
                if ($_FILES['txtCv']['name'] != "") {
                    $targetFile = 'Uploads/CV/' . $id . '_CV.' . pathinfo($_FILES['txtCv']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['txtCv']['tmp_name'], $targetFile);
                    $cv = $targetFile;
                } else {
                    $cv = $student->status->cv;
                }
                if ($_FILES['txtTranscript']['name'] != "") {
                    $targetFile = 'Uploads/Transcript/' . $id . '_Transcript.' . pathinfo($_FILES['txtTranscript']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['txtTranscript']['tmp_name'], $targetFile);
                    $transcript = $targetFile;
                } else {
                    $transcript = $student->status->transcript;
                }
                if (View_Util::fieldIsNotEmpty(array($confPass, $password))) {
                    if ($password == $confPass) {
                        Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateStudent_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => md5($password), 'txtPhoto' => $photo, 'txtCv' => $cv, 'txtTranscript' => $transcript, 'txtAddress' => $address));
                        header("location:index.php?menu=student");
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
                    Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateStudent_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $student->status->password, 'txtPhoto' => $photo, 'txtCv' => $cv, 'txtTranscript' => $transcript, 'txtAddress' => $address));
                    header("location:index.php?menu=student");
                }
            } else {
                $err_msg = 'Please Check Input !';
            }
        }
        include_once 'Client/View/update_student.php';
    }

    public function studentLogin()
    {
        $loginPressed = filter_input(INPUT_POST, 'btnLogin');
        if (isset($loginPressed)) {
            $username = filter_input(INPUT_POST, 'txtUsername');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/studentLogin_service.php", array('txtUsername' => $username, 'txtPassword' => $password));
            $userLogin = json_decode($data);
            if (isset($userLogin) and $userLogin->status != 'Invalid Inputs') {
                $_SESSION['user_logged'] = true;
                $_SESSION['name'] = $userLogin->status->name;
                $_SESSION['id'] = $userLogin->status->id;
                $_SESSION['role'] = 'student';
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
        include_once 'Client/View/student_login.php';
    }
}