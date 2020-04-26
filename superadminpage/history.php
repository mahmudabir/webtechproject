<?php
    include "../superadminpage/common.inc.php";
    include "../db/db_connect.inc.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login/login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="history.css">
</head>

<body>
    <div class="table">
        <h1>History Table</h1>
        <input checked id="tab1" type="radio" name="history">
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
            <!--Start BUS History-->
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
                    /*pagination*/
                    $rpp=05;
                    isset($_GET['page'])?$page =$_GET['page']:$page=0;
                    if($page>1){
                        $start =($page * $rpp)-$rpp;
                    }else{
                        $start=0;
                    }
                    $sqli="SELECT *FROM bus_history";
                    $resultSet=mysqli_query($conn,$sqli);
                    $numRows=mysqli_num_rows($resultSet);
                    $totalpages=ceil($numRows/$rpp);
                    /*pagination*/
                    $sql = "SELECT bus_history.id, bus_history.username, bus_list.name, bus_list.board, bus_list.destination, bus_history.seat, bus_history.date, bus_history.payment,bus_history.status FROM bus_history INNER JOIN bus_list ON bus_history.bus_id = bus_list.id LIMIT $start,$rpp";
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
                    /*pagination*/
                    if($page>1)
                    {
                        echo "<a href='?page=".($page-1)."' class='btn'>Previous<</a>";
                    }
                    for($x=1;$x <= $totalpages;$x++){
                        echo "<a href='?page=$x' class='btn'>   $x</a>";
                    }
                    if($x>1)
                    {
                        echo "<a href='?page=".($page+1)."' class='btn'>Next></a>";
                    }
                    /*pagination*/
                    ?>
                    
                </table>
            </div>
            <!--END BUS History-->
            <!--Start Train History-->
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
                    /*pagination*/
                    $rpp1=05;
                    isset($_GET['pageno'])?$pageno =$_GET['pageno']:$pageno=0;
                    if($pageno>1){
                        $start1 =($pageno * $rpp1)-$rpp1;
                    }else{
                        $start1=0;
                    }
                    $sqli1="SELECT *FROM train_history";
                    $resultSet1=mysqli_query($conn,$sqli1);
                    $numRows1=mysqli_num_rows($resultSet1);
                    $totalpages1=ceil($numRows1/$rpp1);
                    /*pagination*/
                    $sql = "SELECT train_history.id, train_history.username, train_list.name, train_list.board, train_list.destination, train_history.seat, train_history.date, train_history.payment,train_history.status FROM train_history INNER JOIN train_list ON train_history.train_id = train_list.id LIMIT $start1,$rpp1";
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
                    /*pagination*/
                    if($pageno>1)
                    {
                        echo "<a href='?pageno=".($pageno-1)."' class='btn'>Previous<</a>";
                    }
                    for($x=1;$x <= $totalpages1;$x++){
                        echo "<a href='?pageno=$x' class='btn'>   $x</a>";
                    }
                    if($x>1)
                    {
                        echo "<a href='?pageno=".($pageno+1)."' class='btn'>Next></a>";
                    }
                    /*pagination*/
                    ?>
                </table>
            </div>
            <!--END Train History-->
            <!--Start Launch History-->
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
                    /*pagination*/
                    $rpp2=05;
                    isset($_GET['page1'])?$page1 =$_GET['page1']:$page1=0;
                    if($page1>1){
                        $start2 =($page1 * $rpp2)-$rpp2;
                    }else{
                        $start2=0;
                    }
                    $sqli2="SELECT *FROM launch_history";
                    $resultSet2=mysqli_query($conn,$sqli2);
                    $numRows2=mysqli_num_rows($resultSet2);
                    $totalpages2=ceil($numRows2/$rpp2);
                    /*pagination*/
                    $sql = "SELECT launch_history.id, launch_history.username, launch_list.name, launch_list.board, launch_list.destination, launch_history.seat, launch_history.date, launch_history.payment,launch_history.status FROM launch_history INNER JOIN launch_list ON launch_history.launch_id = launch_list.id LIMIT $start2,$rpp2";
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
                    /*pagination*/
                    if($page1>1)
                    {
                        echo "<a href='?page1=".($page1-1)."' class='btn'>Previous<</a>";
                    }
                    for($x=1;$x <= $totalpages2;$x++){
                        echo "<a href='?page1=$x' class='btn'>   $x</a>";
                    }
                    if($x>1)
                    {
                        echo "<a href='?page1=".($page1+1)."' class='btn'>Next</a>";
                    }
                    /*pagination*/
                    ?>
                </table>
            </div>
            <!--End Launch History-->
        </section>
    </div>
</body>

</html>