<?php
require_once('../../model/managerModel/operationmodel.php');

if (isset($_POST['pname'])) {
    $project_name = $_POST['pname'];
    $projectTaskInfo = searchProject($project_name);

    if ($projectTaskInfo) {
        echo "<h2>Project found! Details:</h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Project Name</th>
                <th>Project Type</th>
                <th>Priority Task</th>
                <th>Deadline</th>
              </tr>";
        foreach ($projectTaskInfo as $info) {
            echo "<tr>
                    <td>" . $info['project_name'] . "</td>
                    <td>" . $info['project_type'] . "</td>
                    <td>" . $info['priority_task'] . "</td>
                    <td>" . $info['deadline'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Project not found!";
    }
} else {
    $projectInfo = getAllTaskInfo();

    echo "<h2>All current tasks:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Project Name</th>
            <th>Project Type</th>
            <th>Priority Task</th>
            <th>Deadline</th>
          </tr>";
    for ($i = 0; $i < count($projectInfo); $i++) {
        echo "<tr>
                <td>" . $projectInfo[$i]['project_name'] . "</td>
                <td>" . $projectInfo[$i]['project_type'] . "</td>
                <td>" . $projectInfo[$i]['priority_task'] . "</td>
                <td>" . $projectInfo[$i]['deadline'] . "</td>
              </tr>";
    }
    echo "</table>";
}
?>
