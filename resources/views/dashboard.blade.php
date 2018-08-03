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
    <?php
    if(isset($data) && count($data)>0)
        foreach ($data as $key) {
            // $Balance = $data->
        }
    ?>
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
                    <span class="comic">{{ Auth::user()->name }} </span>

                    <span class="badge badge-light">Bal: #{{ $additions->balance or 'Enter further Account details'  }} </span>
                </p>
                <hr class="separator">
                <li class="active">
                    <a href="" aria-expanded="false"> <span class="fa fa-home"></span> Home</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-user-plus"></span> Add Details </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-briefcase"></span> Savings </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-money"></span> Spendings and Expenses </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-credit-card"></span> Add billing method</a>
                </li>

                <li>
                    <a href="#"><span class="fa fa-calendar"></span> Transaction History </a>
                </li>
                
                <li>

                    <a href=""   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out"></span> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    </a>
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
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
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
            <section class="p-4 ">
                <div class="container-fluid">
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-10 shadow p-0 shadow-lg">
                            <div class="row">
                                <div class="col-sm-6 bg-light pb-2">
                                    <p class="lead font-weight-bold">Active Savings <img src="img/wallet_1.png " class="img-fluid" width="20px" alt="expense"></p>
                                    <hr>
                                    @if($savings !== null && count($savings)>0 )
                                        @foreach($savings as $saving)
                                            <p>
                                                <span class="fa fa-briefcase"></span> {{ $saving->info }} </span>
                                                <span class="badge badge-secondary float-right"># {{ $saving->amount }} </span>
                                            </p>
                                        @endforeach
                                    @else
                                        <p class="lead">
                                            No Savings yet
                                        </p>
                                    @endif
                                    
                                </div>
                                <div class="col-sm-6 bg-white pb-2">
                                    <p class="lead font-weight-bold">Active Spendings <img src="img/money.png " class="img-fluid" width="20px" alt="expense"> </p>
                                    <hr>
                                    @if($spendings !== null && count($spendings)>0 )
                                        @foreach($spendings as $saving)
                                            <p>
                                                <span class="fa fa-briefcase"></span> {{ $saving->info }} </span>
                                                <span class="badge badge-secondary float-right"># {{ $saving->amount }} </span>
                                            </p>
                                        @endforeach
                                    @else
                                        <p class="lead">
                                            No Expenses yet
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3 bg-success text-center mx-2 shadow shadow-lg">
                            <span class="font-weight-bold" style="font-size: 3.4em">
                                #{{ $additions->balance or 'Enter further Account details'}}
                               
                            </span>
                            <p class="comic text-light">Current Balance </p>
                        </div>
                        <div class="col-md-3 mx-2 text-center shadow shadow-lg" style="background: #6c757d">
                            <span class="display-4 font-weight-bold">
                                #{{  $additions->savings or 'Enter further Account details'}}
                            </span>
                            <p class="comic text-light">Total Savings </p>
                        </div>
                        <div class="col-md-3 mx-2 text-center bg-danger shadow shadow-lg">
                            <span class="display-4 font-weight-bold">
                                #{{  $additions->spendings or 'Enter further Account details'}}
                            </span>
                            <p class="comic text-light">Total Spendings </p>

                        </div>
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
                    <h5 class="modal-title " id="exampleModalLabel"><span class="fa fa-briefcase"></span> Savings Plan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="benName" class="font-weight-bold">Savings Title</label>
                                <input type="text" id="benName" name="name" class="form-control" placeholder="What are you saving for...">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="benAcc" class="font-weight-bold">Enter Target</label>
                                <input type="number" id="benAcc" name="amount" class="form-control" placeholder="Enter Savings Goal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="benName" class="font-weight-bold">Enter Deductions </label>
                                <input type="number" id="benName" name="name" class="form-control" placeholder="Savings per Interval">
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

</html>n