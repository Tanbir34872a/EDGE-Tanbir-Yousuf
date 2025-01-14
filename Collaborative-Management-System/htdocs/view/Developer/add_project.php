<?php
session_start();
require('../../controller/Developer/sessionCheck.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../model/Developer/project_model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NAME = $_POST['NAME'];
    $summary = $_POST['summary'];
    $githubLink = $_POST['github_link'];

    $addResult = addProject($NAME, $summary, $githubLink);

    if ($addResult) {
        //echo '<script>alert("Project Added")</script>';
        header('Location: ' . 'code.php');
        die();
    } else {
        echo "Failed to add project.";
    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html lang="en">
<head>
    <title>Add Project</title>
</head>
<body>
    <a href="code.php">Back</a> |

    <h2>Add New Project</h2>

    <form method="post" action="">
        <label for="NAME">Name:</label>
        <input type="text" name="NAME" required><br>

        <label for="summary">Summary:</label>
        <textarea name="summary" required></textarea><br>

        <label for="github_link">GitHub Link:</label>
        <input type="text" name="github_link" required><br>

        <input type="submit" value="Add Project">
    </form>
    <a href="../../controller/Developer/logout.php">Logout</a>
</body>
</html>
