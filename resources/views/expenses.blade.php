<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spave - Spend wisely, Save wisely</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="img/wallet.png">
</head>

<body>

    <div class="wrapper">

        <!-- Sidebar -->


        <!-- Page Content -->
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3> <span class="fa fa-bank"></span> Dashboard </h3>
                </div>

                <ul class="list-unstyled components">
                    <p>
                        <span class="d-inline-block mr-1 fa fa-user"></span>
                        <span class="comic">Jhhames </span>
                    </p>
                    <hr class="separator">
                    <li>
                        <a href="" aria-expanded="false"> <span class="fa fa-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-briefcase"></span> Savings </a>
                    </li>
                    <li class="active">
                        <a href="#"><span class="fa fa-money"></span> Spendings and Expenses </a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-credit-card"></span> Add billing method</a>
                    </li>
                    <!-- <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li> -->
                    <li>
                        <a href="#"><span class="fa fa-calendar"></span> Transaction History </a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-question-circle"></span> Help </a>
                    </li>
                </ul>

            </nav>
            <!-- Page Content -->
            <div id="content">
                <nav class="navbar navbar-expand-sm navbar-dark px-0 py-0 text-light" id="navbar-head">
                    <div class="container">
                        <button type="button" id="sidebarCollapse" class="btn pl-1 btn-link text-light">
                            <i class="fa fa-bars text-dark" style="font-size:25px"></i>
                        </button>
                        <img src="img/favicon.png" class="d-inline-block mx-auto" alt="Logo" width="150px">
                        <form>
                            <button class="btn btn-dark btn-sm">
                            <span class="fa fa-sign-out"></span> Sign Out
                        </button>
                        </form>
                    </div>
                </nav>
                <p>
                    <span class="fa fa-frown-o ml-1"></span>
                    <span class="fa fa-frown-o"></span> We're sorry! Due to some technical difficulties communicating with a third party service, we wont be able to start or deliver your schedules at the moment, You can keep adding Recipients, we'll contact
                    you to start your schedules as soon as we're back online. <span class="fa fa-thumbs-up"></span>
                </p>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <!-- Card -->
                                <div class="card ovf-hidden">

                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <a>
                                            <div class="mask waves-effect waves-light rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!-- Card content -->
                                    <div class="card-body">

                                        <!-- Title -->
                                        <h4 class="card-title font-weight-bold">
                                            <img src="img/expense.png " class="img-fluid" width="20px" alt="expense"> Child pocket mmoney </h4>
                                        <hr>
                                        <!-- Text -->
                                        <p class="card-text">
                                            <p> <b>Amount</b> <span class="text-success"> $5,000 </span> | every <span class="text-primary"> 7days </span> </p>
                                            <p> <span class="font-weight-bold"> Status :</span> <span class="text-success">Active</span> </p>
                                            <p> <span class="font-weight-bold"> Account Number :</span> <span> 1109283777 </span> </p>


                                        </p>
                                        <hr>
                                        <button class="btn btn-danger float-left btn-sm"> Pause </button>
                                        <button class="btn btn-success float-right btn-sm"> Continue </button>

                                        <a class="link-text">
                                            <!-- <h5>Read more <i class="fa fa-angle-double-right ml-2"></i></h5> -->
                                        </a>

                                    </div>



                                </div>
                                <!-- Card -->
                            </div>


                        </div>
                    </div>
                </section>
                <section>
                    <div class="container fixed-bottom">
                        <div class="row">
                            <button class="btn btn-dark rounded-circle ml-auto mb-3 py-3 px-3" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-money" title="Add New Expense" style="font-size:22px;"></span></button>
                        </div>
                    </div>
                </section>

            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel"><span class="fa fa-money"></span> Add new Expense </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="benName" class="font-weight-bold">Expense Title</label>
                                    <input type="text" id="benName" name="name" class="form-control" placeholder="What are you spending this money on...">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="benAcc" class="font-weight-bold">Enter Amount</label>
                                    <input type="text" id="benAcc" name="amount" class="form-control" placeholder="Enter Amount">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold" id="benInterval">Select Interval</label>
                                    <select id="benInterval" name="interval" class="form-control">
                                            <option selected="" value="7">Weekly </option>
                                            <option value="14">2 Weeks </option>
                                            <option value="21">3 Weeks </option>
                                            <option value="30">Monthly </option>
                                            <option value="365">Yearly </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="benAccount" class="font-weight-bold">Account Number</label>
                                    <input type="number" id="benAccount" name="account" class="form-control" placeholder="Enter Recipient's Account Number">
                                </div>


                            </div>
                            <button class="btn btn-success"> Add </button> </form>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js">
        </script>
        <script>
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>


</body>

</html>