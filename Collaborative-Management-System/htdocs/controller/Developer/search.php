<?php
require_once('../../model/Developer/project_model.php');

$NAME = $_REQUEST['name'];
$search = getProjectName($NAME);

if ($search) {
    echo "Project name is: " . $search['NAME'] . "<br>";
    echo "Project Summary is: " . $search['summary'] . "<br>";
    echo "Project GitHub Link is: " . $search['github_link'] . "<br>";
} else {
    echo "not found";
}
?>