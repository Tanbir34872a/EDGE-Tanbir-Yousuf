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

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteResult = deleteProject($deleteId);

    if ($deleteResult) {
        echo "Project deleted successfully.";
    } else {
        echo "Failed to delete project.";
    }
}

$projects = getAllProject();
?>

<html lang="en">
<head>
    <title>Code Repository</title>
    <h3 style="text-align:left;">Collborative Management System </h3>
    <script src="../../Asset/Developer/js/search.js"></script>
    <link rel="stylesheet" href="../../Asset/Developer/css/code.css">
    <script>
        function deleteProject(projectId) {
            if (confirm('Are you sure you want to delete this project?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'code.php?delete_id=' + projectId, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert('Project deleted successfully.');
                        document.getElementById('project-row-' + projectId).remove();
                    } else {
                        alert('Failed to delete project.');
                    }
                };
                xhr.send();
            }
        }
    </script>
</head>
<body>
    <form action="../../controller/Developer/addProjectcheck.php" method="post" enctype="">
        <a href="loggedDashboard.php">Back</a> |
        <div align="right">
            <input type="text" name="search" id="search" value="" placeholder="Search" />
            <input type="button" name="search1" value="Search" onclick="searchEmp()" />
        </div>
        <div id="search-results"></div>
        <table id="project-list" border=1>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Summary</th>
                    <th>GitHub Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; foreach ($projects as $project): ?>
                    <tr id="project-row-<?php echo $project['id']; ?>">
                        <td><?php echo isset($project['NAME']) ? $project['NAME'] : 'N/A'; ?></td>
                        <td><?php echo isset($project['summary']) ? $project['summary'] : 'N/A'; ?></td>
                        <td><?php echo isset($project['github_link']) ? $project['github_link'] : 'N/A'; ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $project['id']; ?>'>EDIT</a> |
                            <a href="#" onclick="deleteProject(<?php echo $project['id']; ?>)">DELETE</a>
                        </td>
                    </tr>
                    <?php $count++; if ($count === count($projects)): ?>
                        <td>
                            <a href="add_project.php">Add Project</a>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </form>
</body>
</html>