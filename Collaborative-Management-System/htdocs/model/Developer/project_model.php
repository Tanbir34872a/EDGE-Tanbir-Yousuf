<?php

require_once('../../model/db.php');

function addProject($NAME, $summary, $github_link)
{
    $con = getConnection();
    $sql = "INSERT INTO projects (NAME, summary, github_link) VALUES ('$NAME', '$summary', '$github_link')";
    $insertResult = mysqli_query($con, $sql);

    return $insertResult;
}

function getAllProject()
{
    $con = getConnection();
    $sql = "SELECT * FROM projects";
    $result = mysqli_query($con, $sql);
    $projects = [];

    while ($project = mysqli_fetch_assoc($result)) {
        array_push($projects, $project);
    }

    return $projects;
}

function getProjectById($projectId)
{
    $con = getConnection();
    $sql = "SELECT * FROM projects WHERE id = $projectId";
    $result = mysqli_query($con, $sql);
    $project = mysqli_fetch_assoc($result);

    return $project;
}

function updateProject($projectId, $NAME, $summary, $github_link)
{
    $con = getConnection();
    $updateSql = "UPDATE projects SET NAME='$NAME', summary='$summary', github_link='$github_link' WHERE id=$projectId";
    $updateResult = mysqli_query($con, $updateSql);

    return $updateResult;
}

function deleteProject($projectId)
{
    $con = getConnection();
    $sql = "DELETE FROM projects WHERE id = $projectId";
    $deleteResult = mysqli_query($con, $sql);

    return $deleteResult;
}

function getProjectName($NAME)
{
    $con = getConnection();
    $sql = "SELECT * FROM projects WHERE NAME = '$NAME'";
    $result = mysqli_query($con, $sql);
    $project = mysqli_fetch_assoc($result);

    return $project;
}
?>


