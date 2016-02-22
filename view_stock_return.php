<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>View Stock Return</title>
        <!-- Bootstrap core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <?php include("dbconn.php"); ?>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inventory</a>
                </div>
                <div id="" class="navbar-collapse collapse">
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar" id="navbar">
                    <ul class="nav nav-sidebar">
                        <li><a href="transferreq.php">Transfer Request</a></li>
                        <li><a href="stockreturn.php">Stock Return</a></li>
                        <li class="active"><a href="view_stock_return.php">View Stock Return</a></li>
                    </ul>
                    <!--
                    <ul class="nav nav-sidebar">
                        <li><a href="c-cv.php">Register CV</a></li>
                        <li><a href="c-job.php">Job Registered</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    -->
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">View Stock Return</h1>
                    <div id="error">
                    </div>
                    <!-- Job Registered Box -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Stock Return ID</th>
                                                    <th>Serial No.</th>
                                                    <th>Description</th>
                                                    <th>Returned From</th>
                                                    <th>Day(s) in hand</th>
                                                    <th>Replaced Date</th>
                                                    <th>Updated By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql=mysql_query("SELECT * FROM stock_return INNER JOIN inventory_master on inventory_master.serial_no = stock_return.serial_no");
                                                        while ($result = mysql_fetch_assoc($sql))
                                                        {
                                                            echo '<tr id='.$result['stockreturn_id'].'class="clickable-row" data-toggle="modal" data-target="#myModal">'.'<td>'.$result['stockreturn_id'].'</td>'.'<td>'.$result['serial_no'].'</td>'.'<td>'.$result['inv_name'].'</td>'.'<td>'.$result['returned_from'].'</td>'.'<td>'.$result['duration'].'</td>'.'<td>'.$result['replaced_date'].'</td>'.'<td>'.$result['updated_by'].'</td>'.'</td></tr>';
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
                </div>
                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="bower_components/jquery/dist/jquery.min.js"></script>
                <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="docs.min.js"></script>
                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Information</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Inventory Name :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" value="Candy" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Serial No. :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" value="A12345" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Station Name :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Problem Description :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Replaced Inventory Name :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Replaced Serial No. :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Service Report No. :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Faulty Tag No. :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                                        </div>
                                    </div>
                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="bower_components/jquery/dist/jquery.min.js"></script>
                <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="docs.min.js"></script>

                <script>
                    jQuery(document).ready(function ($) {
                        $(".clickable-row").click(function () {
                            $('#myModal').modal('show');
                        });
                    });

                    
                </script>
            </body>
        </html>