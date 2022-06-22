<?php
require_once __DIR__ . "/define.php";
require_once __DIR__ . "/Department.php";

//Get description of the single department from the database
$id = $_GET["id"];
$sql_query = "SELECT * FROM `departments` WHERE `id` = $id;";
$query_result = $conn->query($sql_query);

$departments = [];

if ($query_result && $query_result->num_rows > 0) {
    while($row = $query_result->fetch_assoc()) {
        $curr_department = new Department($row["id"], $row["name"]);
        $curr_department->setContacts($row["address"], $row["phone"], $row["email"]);
        $curr_department->head_of_department = $row["head_of_department"];
        $departments[] = $curr_department;
    }
} elseif ($query_result) {
    echo "Department not found";
} else {
    echo "Query error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php foreach ($departments as $department_info) { ?>
        <h1> <?php echo $department_info->name ?></h1>
        <p><?php echo $department_info->head_of_department ?></p>

        <h2>Contacts</h2>

        <ul>
            <?php foreach($department_info->printContacts() as $key => $value) {?>
            <li><?php echo "$key: $value" ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

</body>

</html>