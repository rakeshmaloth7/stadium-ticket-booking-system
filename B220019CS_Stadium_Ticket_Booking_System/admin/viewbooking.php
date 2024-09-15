<?php
require_once "db/session.php";
require_once "db/db_config.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>View Users</title>
    <?php include_once "head_files.php"; ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable123').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</head>
<body>
<div id="wrapper">
    <div class="content-main">
        <div class="blank">
            <div class="blank-page" id="display">

                <?php
                include "dbconfigure.php";

                $query = "SELECT * FROM booking";
                $rs = my_select($query);

                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<div class='col-sm-12'>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-sm' style='overflow: scroll; font-weight: bold' id='myTable123'>";
                echo "<thead style='background-color: yellow; color: white; font-weight: bold'>";
                echo "<tr>";

                echo "<th>Booking Date</th>";
                echo "<th>Booking For</th>";
                echo "<th>Game</th>";
                echo "<th>Seat</th>";
                echo "<th>Customer</th>";
                echo "<th>Delete</th>";
                echo "</tr>";
                echo "</thead>";
                echo '<tbody id="myTable">';

                // Main loop iterating through retrieved data
                while ($column = mysqli_fetch_array($rs)) {
                    echo "<tr class='table-warning'>";

                    // Check for null values before accessing elements
                    if ($column[1] !== null) {
                        echo "<td>{$column[1]}</td>";
                    } else {
                        echo "<td>-</td>"; // FIX: Handle null date
                    }

                    if ($column[2] !== null) {
                        echo "<td>{$column[2]}</td>";
                    } else {
                        echo "<td>-</td>"; // FIX: Handle null booking for
                    }

                    // Additional queries to retrieve dependent data
                    $query1 = "SELECT games_name FROM gamess WHERE gamesid = {$column[3]}";
                    $rs1 = my_select($query1);
                    $column1 = mysqli_fetch_array($rs1);
                    
                    // Check for null values before accessing elements
                    if ($column1 !== null && isset($column1[0])) {
                        echo "<td>{$column1[0]}</td>";
                    } else {
                        echo "<td>-</td>"; // FIX: Handle null game
                    }

                    $query2 = "SELECT seats_name FROM seats WHERE seats_id = {$column[4]}";
                    $rs2 = my_select($query2);
                    $column2 = mysqli_fetch_array($rs2);
                    
                    // Check for null values before accessing elements
                    if ($column2 !== null && isset($column2[0])) {
                        echo "<td>{$column2[0]}</td>";
                    } else {
                        echo "<td>-</td>"; // FIX: Handle null seat
                    }

                    $query3 = "SELECT name FROM users WHERE userid = {$column[5]}";
                    $rs3 = my_select($query3);
                    $column3 = mysqli_fetch_array($rs3);
                    
                    // Check for null values before accessing elements
                    if ($column3 !== null && isset($column3[0])) {
                        echo "<td>{$column3[0]}</td>";
                    } else {
                        echo "<td>-</td>"; // FIX: Handle null customer
                    }

                    echo '<td><a href="deletebooking.php?id=' . $column['bookingid'] . '">
                        <i class="fa fa-remove"></i>
                        </a></td>';

                    echo "</tr>";
                }
                ?>

                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
</body>
</html>
