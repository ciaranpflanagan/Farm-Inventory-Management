<?php include 'core/init.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Chicken Coup
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Username <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Username - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="contact.php">
                                <i class="fa fa-phone"></i> <span>Contact</span>
                            </a>
                        </li>
                        <li>
                            <a href="help.php">
                                <i class="fa fa-question-circle"></i> <span>Help</span>
                            </a>
                        </li>
                        <li>
                            <a href="upgrade.php">
                                <i class="fa fa-arrow-up"></i> <span>Upgrade</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Your Inventory</h3>
                                    <div class="box-footer clearfix">
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                         <li><a href="insert.php"><i class="fa fa-plus"></i><b> &nbsp;Add An Item</b></a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.box-header -->
                <div class="box-body">
<?php
require ('../mysqli_connect_main.php'); // Connecting to the database

$id = $_SESSION['user_id'];

// Making the query
$q = "SELECT CONCAT(item) AS i, CONCAT(unit) AS u, CONCAT(prefered) AS p, CONCAT(current) AS c FROM main WHERE `user_id` = $id ORDER BY id ASC";
$r = @mysqli_query($dbc, $q); // Running the query

//
$num = mysqli_num_rows($r);

// If it ran OK, display records
if ($num > 0) {
    
    // Table header
    echo '<table class="table table-bordered">
    <th>Item</th>
    <th>Amount</th>
    <th>Edit</th>';
    
//    // Fetch and print all records
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<tr><td style="text-decoration: none;">' . $row['i'] . '</td><td style="width: 200px"><span class="badge bg-red">' . $row['c'] . ' / ' . $row['p'] . ' ' . $row['u'] . '</span></td><td>' . '<ul class="pagination pagination-sm no-margin"> <li><a href="chose.php"><i class="fa fa-plus"></i><b> &nbsp;Update An Item</b></a></li> </ul>' . '</td></tr>';
    }

/*    // Fetch and print all records
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo "<tr>
                    <td>$row['i'] ?></td>
                    <td>
                        A description of the product.
                    </td>
                    <td><span class=\"badge bg-red\">$row['c'] / $row['p'] ?></span></td>
            </tr>";
    }
*/
    
    echo '</table><br/><br/>'; // Closing the table

    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $item = $row['i'];
    $prefered = $row['p'];
    $current = $row['c'];

// Will add this later
//include ('tag_color_display.php');
    
    mysqli_free_result ($r); // Freeing up resources
}
// If it didn't run OK
else
{
    // Public message
    echo '<p>We can\'t display your inventory because you haven\'t put anything in it. You can do so here <a href="insert.php">here</a>.</p>' . $id;
    echo $id;

    // Debugging message
    // echo '<p>' . mysqli_error($dbc) . '<br/><br/>Query: ' . $q . '</p>';
} // End of ($r) if statement

mysqli_close($dbc); // Closing the database connection
?>
</div>
</div>
</div>
<!-- Para Right -->
<div class="col-md-4" style="float: right;">
    <div class="box" style="padding: 10px;">
        <div class="box-header">
            <h3 class="box-title">How Your Inventory Table Works</h3>
        </div><!-- /.box-header -->
        <p>There are 3 headings on your inventory table. "Item", "Description" and "Amount".</p><br/>
        <h4>Item</h4>
        <p>The name of the item in your inventory is displayed below this heading. <span class="badge bg-grey">i.e "Coal"</span>.</p><br/>
        <h4>Amount</h4>
        <p>The amount you have of the item. Your current amount is on the left of the '/' while your prefered amount is on the right. <span class="badge bg-grey">i.e "20 / 50 KG"</span>.</p><br/>
    </div>
</div>
</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>     
        
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>