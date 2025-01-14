<?php
session_start();
require('../../controller/Developer/sessionCheck.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
}
?>

<?php
require_once('../../model/Developer/project_model.php');

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $project = getProjectById($projectId);

    if (!$project) {
        echo "Project not found.";
        exit();
    }
} else {
    echo "Invalid request. Please provide a project ID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateResult = updateProject($projectId, $_POST['NAME'], $_POST['summary'], $_POST['github_link']);

    if ($updateResult) {
        echo "Project updated successfully.";
        header('Location: ' . 'code.php');
        die();
    } else {
        echo "Failed to update project.";
    }
}
?>

<html lang="en">
<head>
    <title>Edit Project</title>
</head>
<body>
    <a href="code.php">Back</a> |

    <h2>Edit Project</h2>

    <form method="post" action="">
        <label for="NAME">Name:</label>
        <input type="text" name="NAME" value="<?= isset($project['NAME']) ? $project['NAME'] : '' ?>" required><br>

        <label for="summary">Summary:</label>
        <textarea name="summary" required><?= isset($project['summary']) ? $project['summary'] : '' ?></textarea><br>

        <label for="github_link">GitHub Link:</label>
        <input type="text" name="github_link" value="<?= isset($project['github_link']) ? $project['github_link'] : '' ?>" required><br>

        <input type="submit" value="Update">
    </form>
    <a href="../../controller/DEveloper/logout.php">Logout</a>
</body>
</html>
