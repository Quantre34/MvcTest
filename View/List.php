<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="Public/css/List.css">
</head>
<body>

<h2>Responsive Table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Name</th>
            <th>Orders</th>
            <th>Regisrated at</th>
            <th>Purchasing Status</th>
        </tr>
        </thead>
        <tbody>

<?php 

foreach ($Users as $row) {
    echo "<tr>";
    echo "<td><a href='users/".$row['Id']."' > " . $row['Name'] . "</a></td>";
    echo "<td>" . $row['Mail'] . "</td>";
    echo "<td>" . $row['number_of_purchases'] . "</td>";
    echo "<td>" . $row['last_purchase_date'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}

?>

        <tbody>
    </table>


</div>

</body>
</html>