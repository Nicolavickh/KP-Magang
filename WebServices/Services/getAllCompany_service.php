<?php
include_once '../Entity/Company.php';
include_once '../Database/db_Helper.php';
include_once '../Dao/CompanyDao.php';

$companyDao = new CompanyDao();
$companies = $companyDao->getAllCompany();
header('Content-type:application/json');
echo json_encode($companies);