<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Stock Return (Engineer)</title>
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
    <?php include("dbconn.php");?>
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
                        <li class="active"><a href="stockreturn.php">Stock Return</a></li>
                        <li><a href="view_stock_return.php">View Stock Return</a></li>
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
                    <h1 class="page-header">Stock Return</h1>
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
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                        <div class="form-group">
                                            <label for="Engineer">Engineer : </label>
                                            <br>
                                            <div class="col-md-6">
                                                <!-- <input class="form-control" type="text" disabled value="" id="locations"> -->
                                                <select name="" id="locations" class="form-control">
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="locations" id="names" onchange="changecode($('#names').val())">
                                                    <?php
                                                        $sql=mysql_query("SELECT loc_code FROM location_master");
                                                        while ($locations = mysql_fetch_assoc($sql))
                                                        {
                                                            echo '<option value="'.$locations['loc_code'].'">'.$locations['loc_code'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <br>
                                        <label for="returnid">Return ID : </label>
                                        <br>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="returnid">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <label for="date">Date : </label>
                                        <br>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <label for="Engineer">To Location : </label>
                                        <br>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="Engineer" id="">
                                                <option value="loc214">DEPOT</option>
                                                <option value="loc215">HELPDESK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Description</th>
                                                        <th>Serial No.</th>
                                                        <th>Transferred Date</th>
                                                        <th>Replacing Item</th>
                                                        <th>Replace Serial No.</th>
                                                        <th>Service Report No.</th>
                                                        <th>Fault Tag No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="" class="clickable-row" data-toggle="modal" data-target="#myModal">
                                                        <td>1</td>
                                                        <td>Scanner</td>
                                                        <td>A3533921</td>
                                                        <td>04-Sep-12</td>
                                                        <td>Inkjet Printer</td>
                                                        <td>A32312</td>
                                                        <td>ST029923</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary">Return</button>&nbsp;
                                                <button type="button" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" value="Scanner" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Serial No. :</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="" value="A213123" disabled>
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
                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="bower_components/jquery/dist/jquery.min.js"></script>
                <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="docs.min.js"></script>
                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
                <script>
                    jQuery(document).ready(function ($) {
                        $(".clickable-row").click(function () {
                            $('#myModal').modal('show');
                        });
                    });

                    function selchange(selval) {
                        {
                            console.log(selval);
                            e.preventDefault();
                            window.location.href = "stockreturn.php?locations=" + selval;
                        }
                    };

                    function changecode(val) {
                        console.log(val);
                        $.get("gets.php", {
                                names: val
                            })
                            .done(function (data) {
//                            var lengthss = data.length;
////                            for(var i = 0; i< lengthss; i++){
////                                $('#locations').html("<select value='"+data[i].locations+"'>"+data[i].locations+"</select>")
////                                data.locations;
////                                data.name;
////                            }
                            var datas = jQuery.parseJSON(data);
                             console.log(datas);

                             for (var i = 0; i<datas.length; i++) {

                                $('#locations').append("<option>"+datas[i].username+"</option>");
                             };
                            //$('#locations').html(datas);
//                            var panjang = datas.loc.length;
//                            for(var i =0; i<panjang ; i++){
//                                console.log(datas.loc[i]);
//                            }
                            });
                    }
                </script>
</body>

</html>