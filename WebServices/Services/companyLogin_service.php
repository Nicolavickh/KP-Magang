<?php
include_once '../Entity/Company.php';
include_once '../Dao/CompanyDao.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';

$username = filter_input(INPUT_GET, 'txtUsername');
$password = filter_input(INPUT_GET,'txtPassword');
if (View_Util::fieldIsNotEmpty(array($username,$password))) {
    $company = new Company();
    $companyDao = new CompanyDao();
    $company->setUsername($username);
    $company->setPassword($password);
    $result = $companyDao->companyLogin($company);
    if ($result != null){
        $data = array('status' => $result);
    }else{
        $data = array('status' => 'Invalid Inputs');
    }
} else {
    $data = array('status' => 'Invalid Inputs');
}
header('Content-type:application/json');
echo json_encode($data);