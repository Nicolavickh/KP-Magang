<?php
include_once '../Entity/Lecturer.php';
include_once '../Dao/LecturerDao.php';
include_once '../Database/db_Helper.php';
include_once '../Utility/View_Util.php';

$username = filter_input(INPUT_GET, 'txtUsername');
$password = filter_input(INPUT_GET,'txtPassword');
if (View_Util::fieldIsNotEmpty(array($username,$password))) {
    $lecturer = new Lecturer();
    $lecturerDao = new LecturerDao();
    $lecturer->setId($username);
    $lecturer->setPassword($password);
    $result = $lecturerDao->lecturerLogin($lecturer);
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