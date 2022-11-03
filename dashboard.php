<?php
session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
$query = "SELECT * FROM user";
$booking = "SELECT * FROM booking";
$prepare = $conn->prepare($query);
$prepare1 = $conn->prepare($booking);
$ex1 = $prepare1->execute();
$execute = $prepare->execute();
$users = $prepare->fetchAll(PDO::FETCH_ASSOC);
//delete
$del = $conn->prepare($query);
$exe = $del->execute();
$dels = $del->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events | DASHBOARD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../EMS/assets/css/admin.css">
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

</head>

<body>

    <!-- responsive navbar -->
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="" class="text-danger mb-0">AMY</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-sticky top-0 text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="dashboard.php"><span>Dashboard</span></a></li>
                            <li><a href="ad_manageevents.php"><span>Manage events</span></a></li>
                            <li><a href="ad_managebookings.php"><span>Manage bookings</span></a></li>
                            <!-- <li><a href="ad_manageuser.php"><span>Manage users</span></a></li> -->
                            <li class="dropdown">
                                <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    End session
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <!-- <a class="dropdown-item" href="user_profile.php">Visit Profile</a> -->
                                    <a class="dropdown-item" href="index.php">Log out</a>
                                </div>
                            </li>
                            <!-- <li><a href=""><span>Contact</span></a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>
        </div>
    </header>




    <!-- main content -->
    <div class="row container-fluid">
        <div class=" col card text-center w-50 m-5 bg-info text-bg-light">
            <div class="card-header">Total users</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $prepare->rowCount() ?></h5>
            </div>
            <!-- <div class="card-footer text-muted">2 days ago</div> -->
        </div>
        <div class="col card text-center w-50 m-5 bg-info text-bg-light">
            <div class="card-header">Total bookings</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $prepare1->rowCount() ?></h5>
            </div>
            <!-- <div class="card-footer text-muted">2 days ago</div> -->
        </div>
    </div>
    <div class="text-left p-3">

        <div class="row w-100">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card mt-5">
                    <div class="totalbookings">
                        <span class="badge badge-danger p-3 m-3 ">
                            <?php
                            echo htmlentities("Total Users " . $del->rowCount());
                            ?>
                        </span>
                    </div>
                    <div class="card-body table-responsive m-3 ">
                        <table class="table table-group-divider align-items-center table-hover  table-striped table-responsive-md p-3 w-100" id="dataTableHover">
                            <thead class="table-bordered border-dark table-info">
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>state</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //php to view events from db
                                $index = 1;
                                if ($del->rowCount() > 0) {
                                    foreach ($dels as $user) {
                                ?>
                                        <tr>
                                            <td class="text-center">
                                                <!-- no [id] -->
                                                <?php
                                                echo  htmlentities($index);
                                                ?>
                                            </td>
                                            <td class="font-w600">
                                                <!-- email using php -->
                                                <?php
                                                echo $user['firstname'] . " " . $user['lastname'];
                                                ?>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <?php
                                                echo htmlentities($user['email']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo htmlentities($user['phone']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo htmlentities($user['DOB']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo htmlentities($user['gender']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo htmlentities($user['state']);
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- delete action of event category using php -->
                                                <a href="ad_deluser.php?delid=<?php echo $user['id']; ?>" onclick="return confirm('Do you want to delete ?')">
                                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-dark text-bg-danger " id="delaction">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    </svg>
                                                </a>
                                            </td>

                                        </tr>
                                        <!-- increment the initial varible to jump on nxt record -->
                                <?php
                                        $index = $index + 1;
                                    }
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

    <!-- mdn cdn  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>