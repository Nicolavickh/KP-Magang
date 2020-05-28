<?php


class ProfileController
{

    public function index()
    {
        if ($_SESSION['role'] == 'student') {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getStudent_service.php", array('txtId' => $_SESSION['id']));
        } else if ($_SESSION['role'] == 'company') {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getCompany_service.php", array('txtId' => $_SESSION['id']));
        } else {
            $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getLecturer_service.php", array('txtId' => $_SESSION['id']));
        }
        $user = json_decode($data);
        include_once 'Client/View/profilePage.php';
    }

    public function update()
    {
        $id = $_SESSION['id'];
        if ($_SESSION['role'] == 'student') {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getStudent_service.php", array('txtId' => $_SESSION['id']));
        } else if ($_SESSION['role'] == 'company') {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getCompany_service.php", array('txtId' => $_SESSION['id']));
        } else {
            $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getLecturer_service.php", array('txtId' => $_SESSION['id']));
        }
        $user = json_decode($data);
        include_once "Client/View/update_profile.php";

        $update = filter_input(INPUT_POST, 'btnUpdateProfile');
        if (isset($update)) {
            if ($_SESSION['role'] == 'student') {
                $name = $user->status->name;
                $email = filter_input(INPUT_POST, 'txtEmail');
                $phone = filter_input(INPUT_POST, 'txtPhone');
                $password = filter_input(INPUT_POST, 'txtPassword');
                $confPass = filter_input(INPUT_POST, 'txtConfPass');
                $address = filter_input(INPUT_POST, 'txtAddress');
                if (View_Util::fieldIsNotEmpty(array($name, $email, $phone, $address))) {
                    if ($_FILES['txtPhoto']['name'] != "") {
                        $targetFile = 'Uploads/Photo/' . $id . '_Photo.' . pathinfo($_FILES['txtPhoto']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $targetFile);
                        $photo = $targetFile;
                    } else {
                        $photo = $user->status->photo;
                    }
                    if ($_FILES['txtCv']['name'] != "") {
                        $targetFile = 'Uploads/CV/' . $id . '_CV.' . pathinfo($_FILES['txtCv']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtCv']['tmp_name'], $targetFile);
                        $cv = $targetFile;
                    } else {
                        $cv = $user->status->cv;
                    }
                    if ($_FILES['txtTranscript']['name'] != "") {
                        $targetFile = 'Uploads/Transcript/' . $id . '_Transcript.' . pathinfo($_FILES['txtTranscript']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtTranscript']['tmp_name'], $targetFile);
                        $transcript = $targetFile;
                    } else {
                        $transcript = $user->status->transcript;
                    }
                    if (View_Util::fieldIsNotEmpty(array($confPass, $password))) {
                        if ($password == $confPass) {
                            Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateStudent_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => md5($password), 'txtPhoto' => $photo, 'txtCv' => $cv, 'txtTranscript' => $transcript, 'txtAddress' => $address));
                            header("location:index.php?menu=profile");
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
                        Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateStudent_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $user->status->password, 'txtPhoto' => $photo, 'txtCv' => $cv, 'txtTranscript' => $transcript, 'txtAddress' => $address));
                        header("location:index.php?menu=profile");
                    }
                } else {
                    $err_msg = 'Please Check Input !';
                }
            } else if ($_SESSION['role'] == 'company') {
                $name = filter_input(INPUT_POST, 'txtName');
                $email = filter_input(INPUT_POST, 'txtEmail');
                $phone = filter_input(INPUT_POST, 'txtPhone');
                $address = filter_input(INPUT_POST, 'txtAddress');
                $username = filter_input(INPUT_POST, 'txtUsername');
                $password = filter_input(INPUT_POST, 'txtPassword');
                $confPass = filter_input(INPUT_POST, 'txtConfPass');
                if (View_Util::fieldIsNotEmpty(array($name, $email, $phone, $address, $username))) {
                    if (View_Util::fieldIsNotEmpty(array($password, $confPass))) {
                        if ($password == $confPass) {
                            $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateCompany_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtAddress' => $address, 'txtUsername' => $username, 'txtPassword' => md5($password)));
                            header("location:index.php?menu=profile");
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
                        $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateCompany_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtAddress' => $address, 'txtUsername' => $username, 'txtPassword' => $user->status->password));
                        header("location:index.php?menu=profile");
                    }
                } else {
                    $err_msg = 'Please Check Input !';
                }
            } else {
                $name = filter_input(INPUT_POST, 'txtName');
                $email = filter_input(INPUT_POST, 'txtEmail');
                $phone = filter_input(INPUT_POST, 'txtPhone');
                $password = filter_input(INPUT_POST, 'txtPassword');
                $confPass = filter_input(INPUT_POST, 'txtConfPass');
                if (View_Util::fieldIsNotEmpty(array($id, $name, $email, $phone))) {
                    if (View_Util::fieldIsNotEmpty(array($password, $confPass))) {
                        if ($password == $confPass) {
                            Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateLecturer_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => md5($password)));
                            header("location:index.php?menu=profile");
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
                        Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateLecturer_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtPassword' => $user->status->password));
                        header("location:index.php?menu=profile");
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
        }
    }
}