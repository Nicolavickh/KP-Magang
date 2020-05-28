<?php

include_once '../Entity/Company.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/CompanyDao.php';
include_once '../Utility/View_Util.php';

$name = filter_input(INPUT_POST, 'txtName');
$email = filter_input(INPUT_POST, 'txtEmail');
$phone = filter_input(INPUT_POST, 'txtPhone');
$address = filter_input(INPUT_POST, 'txtAddress');
$username = filter_input(INPUT_POST, 'txtUsername');
$password = filter_input(INPUT_POST, 'txtPassword');
$id = filter_input(INPUT_POST,'txtId');
if (View_Util::fieldIsNotEmpty(array($name,$email,$phone,$address,$username,$password))){
    $company = new Company();
    $companyDao = new CompanyDao();
    $company->setId($id);
    $company->setName($name);
    $company->setAddress($address);
    $company->setUsername($username);
    $company->setPhone($phone);
    $company->setPassword($password);
    $company->setEmail($email);
    $result = $companyDao->updateCompany($company);
    $data = array('status' => $result);
}else {
    $data = array('status' => 'Invalid Fields');
}
header('Content-type:application/json');