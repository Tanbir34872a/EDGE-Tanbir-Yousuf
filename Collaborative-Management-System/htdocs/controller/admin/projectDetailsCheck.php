<?php 
    require_once ("../../model/admin/adminOperationModel.php");
    // for project info show
    $project =  $_REQUEST['projectInfo']; //project json obj from js
    $projects = json_decode($project); 

    //assign manager info show
    $assignedProjectManInfo= $_REQUEST['proAssignManInfo'];
    $assignedProjectMan = json_decode($assignedProjectManInfo); 

    //user info show
    $userInfo= $_REQUEST['usersData'];
    $allUserInfo = json_decode($userInfo);

    if($projects)
    {
        $showInfo= getAllprojectInfo();
        echo json_encode($showInfo);
    }
    else if ($assignedProjectMan){

        $showInfo= displayAllCurrentProject();
        echo json_encode($showInfo);
    }
    else if($allUserInfo)
    {
        $showInfo= displayAlluserInfo();
        echo json_encode($showInfo);
    }
?>
