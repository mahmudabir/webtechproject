<?php
include "../mainpage/common.inc.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>History</title>
    <link rel="stylesheet" href="history.css">

</head>

<body>
    <div class="table">
        <h1>History Table</h1>
        <input checked="chechked" id="tab1" type="radio" name="history">
        <input id="tab2" type="radio" name="history">
        <input id="tab3" type="radio" name="history">
        <nav>
            <ul>
                <li class="tab1"><label for="tab1">Bus History</label></li>
                <li class="tab2"><label for="tab2">Train History</label></li>
                <li class="tab3"><label for="tab3">Launch History</label></li>
            </ul>
        </nav>
        <section>
            <div class=tab1>

                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>BUS Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php
                    $username = $_SESSION['username'];
                    $sql = "SELECT bus_history.id, bus_history.username, bus_list.name, bus_list.board, bus_list.destination, bus_history.seat, bus_history.date, bus_history.payment,bus_history.status FROM bus_history INNER JOIN bus_list ON bus_history.bus_id = bus_list.id where username='$username'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['board'] . "</td> 
                            <td>" . $row['destination'] . "</td>
                            <td>" . $row['seat'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['payment'] . "</td>
                            <td>" . $row['status'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        echo "</table>";
                    } else {
                        echo $message = "No History!";
                    }



                    ?>
                </table>
            </div>
            <div class="tab2">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Train Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php
                    $username = $_SESSION['username'];

                    $sql = "SELECT train_history.id, train_history.username, train_list.name, train_list.board, train_list.destination, train_history.seat, train_history.date, train_history.payment,train_history.status FROM train_history INNER JOIN train_list ON train_history.train_id = train_list.id where username='$username'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['board'] . "</td>
                            <td>" . $row['destination'] . "</td>
                            <td>" . $row['seat'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['payment'] . "</td>
                            <td>" . $row['status'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        echo "</table>";
                    } else {
                        echo $message = "No History!";
                    }



                    ?>
                </table>
            </div>
            <div class="tab3">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Launch Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php
                    $username = $_SESSION['username'];
                    $sql = "SELECT launch_history.id, launch_history.username, launch_list.name, launch_list.board, launch_list.destination, launch_history.seat, launch_history.date, launch_history.payment,launch_history.status FROM launch_history INNER JOIN launch_list ON launch_history.launch_id = launch_list.id where username='$username'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['board'] . "</td>
                            <td>" . $row['destination'] . "</td>
                            <td>" . $row['seat'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['payment'] . "</td>
                            <td>" . $row['status'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        echo "</table>";
                    } else {
                        echo $message = "No History!";
                    }



                    ?>
                </table>
            </div>
        </section>
    </div>
</body>

</html>