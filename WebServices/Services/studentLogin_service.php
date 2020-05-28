<?php
include_once '../Entity/Student.php';
include_once '../Dao/StudentDao.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';

$username = filter_input(INPUT_GET, 'txtUsername');
$password = filter_input(INPUT_GET,'txtPassword');
if (View_Util::fieldIsNotEmpty(array($username,$password))) {
    $student = new Student();
    $studentDao = new StudentDao();
    $student->setId($username);
    $student->setPassword($password);
    $result = $studentDao->login($student);
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