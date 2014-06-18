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
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                        <div class="col-md-8">
                            <div class="box" style="padding: 10px;">
                                <div class="box-header">
                                    <h3 class="box-title">Add An Item</h3>
                                </div><!-- /.box-header -->
                                <form role="form" action="insert.php" method="post">
                                        <div class="form-group">
                                            <label>Iteam Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" />
                                        </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Prefered Amount</label>
                                            <input type="text" class="form-control" placeholder="Amount" name="prefered" />
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Current Amount</label>
                                            <input type="text" class="form-control" placeholder="Amount" name="current">
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Unit Type</label>
                                            <input type="text" class="form-control" placeholder="Unit Type" name="unit">
                                        </div>
                                    </div><br/>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <div> 
<?php

// Checking for form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require ('../mysqli_connect_main.php'); // Connecting to the database
    
    $errors = array(); // Initializing an error array
    
    // Checking for name
    if (empty($_POST['name'])) {
        $errors[] = 'You haven\'t entered a name for your iteam.';
    }
    else
    {
        $n = mysqli_real_escape_string($dbc, trim($_POST['name']));
    }
    
    // Checking for a prefered amount
    if (empty($_POST['prefered'])) {
        $errors[] = 'You haven\'t entered your prefered amount.';
    }
    else
    {
        $p = mysqli_real_escape_string($dbc, trim($_POST['prefered']));
    }

    // Checking for the current amount
    if (empty($_POST['current'])) {
        $errors[] = 'You haven\'t entered your current amount.';
    }
    else
    {
        $c = mysqli_real_escape_string($dbc, trim($_POST['current']));
    }

    // Checking for the unit type
    if (empty($_POST['unit'])) {
        $errors[] = 'You haven\'t entered your unit type.';
    }
    else
    {
        $u = mysqli_real_escape_string($dbc, trim($_POST['unit']));
    }
        $session_id = $_SESSION['user_id'];
        $id = intval($session_id);

// If everything is OK
if (empty($errors)) {
    // Registering user into database    
    // Making the query
    $q = "INSERT INTO main (user_id, item, unit, prefered, current) VALUES ('$id', '$n', '$u', '$p', '$c')";
    $r = @mysqli_query ($dbc, $q); // Run the query
    // If it ran OK
    if ($r) {
        // Printing a message
        echo '<h1>Your New Item Is Now Accounted For</h1>
        <p>Your new item is now accounted for in your database. You should be able to view it in your <a href="index.php">dashboard</a>.</p>' . $_SESSION['user_id'];
    }
    // If it didn't run OK
    else
    {
        // Printing a message
        echo '<h1>Whoops</h1>
        <p>Something went wrong. We\'ve sent our highly trained chickens out to fix it! We are sorry for an inconvenience this problem may have caused you.</p>';
        
        // Debugging message
        echo '<p>' . mysqli_error($dbc) . '<br/><br/>Query: ' . $q . '</p>';
    } // End of ($r) if statement
    mysqli_close($dbc); // Closing the database connection
}
// Reporting the Errors
else
{
    echo '<h1>Error!!!</h1>
    <p>The following error(s) have occurred:<br/>';
    foreach ($errors as $msg) {
        echo " - $msg<br/>\n";
    }
    echo '</p><p>Please fill out the form again. Thank You.</p><p><br/></p>';
} // End of (empty($errors)) if statement
}
?>
</div>
</div>
</div>
<!-- Para Right -->
<div class="col-md-4" style="float: right;">
    <div class="box" style="padding: 10px;">
        <div class="box-header">
            <h3 class="box-title">How to Add An Item</h3>
        </div><!-- /.box-header -->
        <p>You can add your items here by filling out the form and then submitting it.</p><br/>
        <h4>Item Name</h4>
        <p>Here is where you put in the name of the item you would like to add.</p><br/>
        <h4>Prefered Amount</h4>
        <p>Here is where you put in the amount you would prefer to have at all times.</p><br/>
        <h4>Current Amount</h4>
        <p>Here is where you put in the amount you currently have.</p><br/>
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