<?php
//facimm 'na strage db-university
//facimm 'na strage db-university
//facimm 'na strage db-university
//facimm 'na strage db-university
//facimm 'na strage db-university
//facimm 'na strage db-university
//FROM GOMORRA SQL

require_once __DIR__ . "/define.php";
require_once __DIR__ . "/Department.php";

//Ask a query to the database to get infos
$sql_query = "SELECT `id`, `name` FROM `departments`;";
$query_result = $conn->query($sql_query);

$departments = [];

//Check for some correspondence in the result of the query
if($query_result && $query_result->num_rows > 0) {
    //If we hame a corrispondence
    while($row = $query_result->fetch_assoc()) {
        $current_department = new Department($row["id"], $row["name"]);
        $departments[] = $current_department;
    }
} elseif ($query_result) {
    //Query ended well but there are no results available
} else {
    //Query ended up wrong
    echo "Query error, check the syntax";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
</head>
<body>
    
    <h1>Departments List</h1>
    <?php foreach($departments as $department_list) { ?>
    <div>
        <h2><?= $department_list->name; ?></h2>
        <a href="department_info.php?id=<?= $department_list->id ?>  ">Click to get more information</a>
    </div>
    <?php } ?>

</body>
</html>