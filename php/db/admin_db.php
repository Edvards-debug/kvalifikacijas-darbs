<?php


require 'db_connect.php';

$sql = "SELECT * FROM admin_table";
$result = $conn->query($sql);
$admins = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($admins, $row);
    }
} else {
    echo "No admins found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>

<a href="../admin_panel.php"><- Admina panelis</a>

<p>
    <h1>Pievienot administratoru</h1>
</p>

<form method="post" action="add_admin.php">
    <label for="admin_code">Admin Code:</label><br>
    <input type="text" id="admin_code" name="admin_code" required><br>
    <label for="admin_username">Admin Username:</label><br>
    <input type="text" id="admin_username" name="admin_username" required><br>
    <label for="admin_password">Admin Password:</label><br>
    <input type="password" id="admin_password" name="admin_password" required><br>
    <input type="submit" value="Add Admin">
</form>

<p>

</p>

<table>
    <tr>
        <th>Admin ID</th>
        <th>Admin Code</th>
        <th>Admin Username</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach ($admins as $admin) {
        echo "<tr>";
        echo "<td class='editable' contenteditable='false'>" . $admin['admin_id'] . "</td>";
        echo "<td class='editable' contenteditable='false'>" . $admin['admin_code'] . "</td>";
        echo "<td class='editable' contenteditable='false'>" . $admin['admin_username'] . "</td>";
        echo "<td>";
        echo "<button class='edit'>Edit</button>";
        echo "<button class='save' style='display: none;'>Save</button>";
        echo "<form method='POST' action='delete_admin.php' onsubmit='return confirm(\"Vai vēlieties dzēst šo adminu?\");'>";
        echo "<input type='hidden' name='admin_id' value='". $admin['admin_id'] ."'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>

</table>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.edit').on('click', function() {
        var row = $(this).closest('tr');
        row.find('.editable').attr('contenteditable', 'true');
        $(this).hide();
        row.find('.save').show();
    });
    
    $('.save').on('click', function() {
        var row = $(this).closest('tr');
        row.find('.editable').attr('contenteditable', 'false');
        $(this).hide();
        row.find('.edit').show();
        
        var admin_id = row.find('td:nth-child(1)').text();
        var admin_code = row.find('td:nth-child(2)').text();
        var admin_username = row.find('td:nth-child(3)').text();

        $.ajax({
            url: 'edit_admin.php',
            type: 'post',
            data: {
                admin_id: admin_id,
                admin_code: admin_code,
                admin_username: admin_username
            },
            success: function(response) {
                alert(response);
            }
        });
    });
});
</script>
</html>
