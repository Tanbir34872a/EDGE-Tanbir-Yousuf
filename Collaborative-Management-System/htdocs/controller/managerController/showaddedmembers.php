<?php
include('../../model/managerModel/operationmodel.php');

// for ($i = 0; $i < count($memberInfo); $i++) {
//     echo "Username: " . $memberInfo[$i]['username'] . "<br>";
//     echo "Role    : " . $memberInfo[$i]['role'] . "<br>";
//     echo "<hr>";
// }

$userInfo =  $_REQUEST['userInfo'];
$info = json_decode($userInfo);
if($info)
{
    $memberInfo = getAllTeamMember();
    echo json_encode($memberInfo);
}
?>
