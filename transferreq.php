<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

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
                    <li class="active"><a href="transferreq.php">Transfer Request</a></li>
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
                <h1 class="page-header">Transfer Request</h1>


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
                                    <div class="col-md-6">
                                        <form role="form" method="post" action="transferreq.php">
                                            <div class="form-group">
                                                <label for="optionRadios">Transfer to :</label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>&nbsp;Internal
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">&nbsp;Supplier
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">&nbsp;Customer
                                            </div>
                                            <div class="form-group">
                                                <label for="subtype">Sub Type :</label>
                                                <select class="form-control" name="subtype">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fromloc">From Location :</label>
                                                <br>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled value="">
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="fromloc" id="fromloc">
                                                        <?php
                                                        include("dbconn.php");
                                                        $sql=mysql_query("SELECT loc_code FROM location_master");
                                                        global $fromlocation;
                                                        while ($fromlocation = mysql_fetch_assoc($sql))
                                                        {
                                                            echo '<option value="'.$fromlocation['loc_code'].'">'.$fromlocation['loc_code'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="toloc">To Location :</label>
                                                <br>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="toloc" id="toloc">
                                                        <?php
                                                        $sql=mysql_query("SELECT loc_code FROM location_master");
                                                        while ($result = mysql_fetch_assoc($sql))
                                                        {
                                                            echo '<option value="'.$result['loc_code'].'">'.$result['loc_code'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="appmgr">Approving Manager :</label>
                                                <select class="form-control" name="appmgr">
                                                    <?php
                                                        $sql=mysql_query("SELECT username FROM user_master WHERE position='manager'");
                                                        while ($result = mysql_fetch_assoc($sql))
                                                        {
                                                            echo '<option>'.$result['username'].'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reqid">Request ID :</label>
                                            <input type="text" class="form-control" disabled <?php $sql=mysql_query( "SELECT MAX(id) FROM transfer_request_detail"); $result=mysql_fetch_assoc($sql); if($result[ 'MAX(id)']>1) {echo 'value="'.$result['MAX(id)'].'"';} else {echo 'value=1';}?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="reqby">Requested By :</label>
                                            <input type="text" class="form-control" disabled placeholder="Session">
                                        </div>
                                        <div class="form-group">
                                            <label for="remarks">Remarks :</label>
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="invname">Inventory Name :</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Inventory Name</th>
                                                    <th>Serial No.</th>
                                                    <th>Faulty</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr id="bigmonitor" onclick="selectTable('bigmonitor')">
                                                    <td>1</td>
                                                    <td>Big Monitor</td>
                                                    <td>A3533921</td>
                                                    <td>Yes</td>
                                                </tr>

                                                <tr id="printerlaserjet" onclick="selectTable('printerlaserjet')">
                                                    <td>2</td>
                                                    <td>Printer Laserjet</td>
                                                    <td>A671221</td>
                                                    <td>No</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default" onclick="submitOrder()">Submit</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary">Approve</button>&nbsp;
                                            <button type="button" class="btn btn-danger">Reject</button>
                                        </div>
                                    </div>
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

        <script>
            var tobeInserted = [];
            var locations = $('#fromloc option:selected').val();

            function selectTable(val) {

                if ($('#' + val).css('background-color') == "rgb(149, 165, 166)") {
                    $('#' + val).css('background-color', '');

                    tobeInserted.forEach(function (vals, key) {
                        console.warn(vals);
                        console.error(val);
                        if (vals == val) {
                            delete tobeInserted[key];
                        }
                    });
                    console.log(tobeInserted);
                } else {
                    $('#' + val).css('background-color', 'rgb(149, 165, 166)');
                    tobeInserted.push(val);
                    console.log(tobeInserted);
                }
            };

            function submitOrder() {
                //                var ress = "";
                //                 ress = ress + tobeInserted[i];
                //                ress = ress + ",";
                console.log(locations);

                var request = $.ajax({
                    url: "ajaxtransfer.php",
                    method: "POST",
                    data: {
                        locations: locations,
                        idlist: tobeInserted
                    }
                });

                request.done(function (msg) {
                    alert('we did it');
                    $("#error").text("success");
                    $("#error").slideUp(2000);
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                    $("#error").text("fail");
                    $("#error").slideUp(2000);
                });
            };
        </script>
</body>

</html>