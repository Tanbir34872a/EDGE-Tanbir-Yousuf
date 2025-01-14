<?php
require_once('../../model/managerModel/operationmodel.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $addedMembers = getaddedmember($username);

    if ($addedMembers) {
        echo "Member found! Details:<br>";
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>";

        foreach ($addedMembers as $info) {
            echo "<tr>";
            echo "<td>" . $info['username'] . "</td>";
            echo "<td>" . $info['role'] . "</td>";
            echo "<td>";
            echo "<form action='../controller/removeMemberCheck.php' method='post'>";
            echo "Enter Password: <input type='password' name='password' required>";
            echo "<input type='hidden' name='addMemberId' value='" . $info['addMemberId'] . "'>";
            echo "<input type='submit' value='Remove Member'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Member not found!";
    }
}
?>
