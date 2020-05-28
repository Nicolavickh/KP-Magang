<?php


class CompanyController
{
    public function index()
    {
        $add = filter_input(INPUT_POST, 'btnAdd');
        if (isset($add)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $email = filter_input(INPUT_POST, 'txtEmail');
            $phone = filter_input(INPUT_POST, 'txtPhone');
            $address = filter_input(INPUT_POST, 'txtAddress');
            $username = filter_input(INPUT_POST, 'txtUsername');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $confPass = filter_input(INPUT_POST, 'txtConfPass');
            if (View_Util::fieldIsNotEmpty(array($name, $email, $phone, $address, $username, $password, $confPass))) {
                if ($password == $confPass) {
                    Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/addCompany_service.php", array('txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtAddress' => $address, 'txtUsername' => $username, 'txtPassword' => $password));
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
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getAllCompany_service.php", array());
        $dataCompany = json_decode($data);
        include_once 'Client/View/add_company.php';
    }

    public function update()
    {
        $id = filter_input(INPUT_GET, 'id');
        if (isset($id)) {
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/getCompany_service.php", array('txtId' => $id));
            $company = json_decode($data);
        }

        $update = filter_input(INPUT_POST, 'btnUpdate');
        if (isset($update)) {
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
                        header("location:index.php?menu=company");
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
                    $res = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/updateCompany_service.php", array('txtId' => $id, 'txtName' => $name, 'txtEmail' => $email, 'txtPhone' => $phone, 'txtAddress' => $address, 'txtUsername' => $username, 'txtPassword' => $company->status->password));
                    header("location:index.php?menu=company");
                }
            } else {
                $err_msg = 'Please Check Input !';
            }
        }
        include_once 'Client/View/update_company.php';
    }

    public function companyLogin()
    {
        $loginPressed = filter_input(INPUT_POST, 'btnLogin');
        if (isset($loginPressed)) {
            $username = filter_input(INPUT_POST, 'txtUsername');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $data = Utility::curl_get("http://magang.it.maranatha.edu/WebServices/Services/companyLogin_service.php", array('txtUsername' => $username, 'txtPassword' => $password));
            $userLogin = json_decode($data);
            if ($userLogin != null and $userLogin->status != 'Invalid Inputs') {
                $_SESSION['user_logged'] = true;
                $_SESSION['name'] = $userLogin->status->name;
                $_SESSION['id'] = $userLogin->status->id;
                $_SESSION['role'] = 'company';
                header("location:index.php");
            } else {
                $errMsg = "Invalid username or password !";
            }
        }
        if (isset($errMsg)) {
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
        include_once 'Client/View/company_login.php';
    }

    public function applyingStudents()
    {
        $data = Utility::curl_post("http://magang.it.maranatha.edu/WebServices/Services/getApplyingStudents_service.php", array('txtCompanyId' => $_SESSION['id']));
        $dataStudents = json_decode($data);
        include_once 'Client/View/viewApplyingStudents.php';
    }
}