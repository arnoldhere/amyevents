<?php
session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
$query = "SELECT * FROM booking";
$prepare = $conn->prepare($query);
$execute = $prepare->execute();
$books = $prepare->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events | </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../EMS/assets/css/admin.css">
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </script>


</head>

<body>
    <!--Navbar-->
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo navbar-brand"><a href="" class="text-danger mb-0">AMY</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation text-right" role="navigation">
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

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card mt-lg-5">
                <div class="modal-header">
                    <h5 class="modal-title" style="float: left;">Bookings</h5>
                    <!-- <div class="card-tools" style="float: right;">
                        <button type="button" class="btn btn-sm btn-info" data-mdb-toggle="modal" data-mdb-target="#addsector">
                            Add Event
                        </button>
                    </div> -->
                </div>
                <div class="totalbookings">
                    <span class="badge badge-danger p-3 mx-3 mt-1">
                        <?php
                        echo htmlentities("Total Bookings " . $prepare->rowCount());
                        ?>
                    </span>
                </div>
                <div class="card-body table-responsive m-3 ">
                    <table class="table table-group-divider align-items-center table-hover  table-striped table-responsive-md p-3" id="dataTableHover">
                        <thead class="table-bordered border-dark table-info">
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Event</th>
                                <th>Venue</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //php to view events from db
                            $index = 1;
                            if ($prepare->rowCount() > 0) {
                                foreach ($books as $book) {
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
                                            echo htmlentities($book['email']);
                                            ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php
                                            echo htmlentities($book['phone']);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo htmlentities($book['event']);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo htmlentities($book['venue']);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <!-- delete action of event category using php -->
                                            <a href="ad_delbook.php?delid=<?php echo $book['id']; ?>" onclick="return confirm('Do you want to delete ?')">
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



    <!-- JS for hemburger -->
    <script>
        $(document).ready(function() {

            $('.first-button').on('click', function() {

                $('.animated-icon1').toggleClass('open');
            });
            $('.second-button').on('click', function() {

                $('.animated-icon2').toggleClass('open');
            });
            $('.third-button').on('click', function() {

                $('.animated-icon3').toggleClass('open');
            });
        });
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>