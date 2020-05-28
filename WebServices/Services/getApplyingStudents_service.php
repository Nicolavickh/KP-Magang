<?php
include_once '../Entity/Company.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/CompanyDao.php';

$companyId = filter_input(INPUT_POST, 'txtCompanyId');
$companyDao = new CompanyDao();
$details = $companyDao->getAllStudents();
header('Content-type:application/json');
echo json_encode($details);