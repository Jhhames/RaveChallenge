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
                        <span class="comic"> {{ Auth::user()->name }}  </span>

                        <span class="badge badge-light">Bal: $50,999 </span>
                    </p>
                    <hr class="separator">
                    <li>
                        <a href="" aria-expanded="false"> <span class="fa fa-home"></span> Home</a>
                    </li>
                    <li class="active">
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
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('message'))
                                    <div class="alert alert-info"> {{ session('message') }}</div>
                                @endif

                                @if(isset($errors) && count($errors)>0)
                                @foreach($errors->all() as $error)    
                                    <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            
                            @if($data !== null )
                                @foreach( $data as $savings)
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
                                                    <img src="img/wallet_1.png " class="img-fluid" width="20px" alt="expense"> {{ $savings->info }} </h4>
                                                <hr>
                                                <!-- Text -->
                                                <p class="card-text">
                                                    <?php
                                                        $saved = $savings->saved;
                                                        $target = $savings->amount*$savings->duration;
                                                        $percent = ($saved/$target) * 100;
                                                    ?>
                                                    <p> <b>Target</b> <span class="text-success"> #{{ $savings->amount*$savings->duration }} </span> </p>
                                                    <p> <b>Saved</b> <span class="text-success"> #{{ $savings->saved }} </span> </p>
                                                    <p> <b>Saving</b> <span class="text-success"> #{{ $savings->amount }} </span> | {{ $savings->interval}} </p>
                                                    <p> <span class="font-weight-bold"> Status :</span> <span class="text-info"> {{ $savings->status }} </span> </p>
                                                    <p class="mt-4"> <span class="font-weight-normal"> <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?=$percent ?>%" aria-valuemin="0" aria-valuemax="100">
                                                           <i> <?=$percent ?>% </i>
                                                        </div>
                                                        </div>
                                                    </p>
        
        
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
                                @endforeach
                            @else
                                    <div class="lead"> No Savings yet</div>
                            @endif
                            {{-- <div class="col-md-4 mb-4">
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
                                            <img src="img/wallet_1.png " class="img-fluid" width="20px" alt="expense"> Samsung s5 </h4>
                                        <hr>
                                        <!-- Text -->
                                        <p class="card-text">
                                            <p> <b>Target</b> <span class="text-success"> $50,000 </span> </p>
                                            <p> <b>Saved</b> <span class="text-success"> $5,000 </span> </p>
                                            <p> <b>Saving</b> <span class="text-success"> $5,000 </span> | Every month </p>
                                            <p> <span class="font-weight-bold"> Status :</span> <span class="text-success">Active</span> </p>
                                            <p class="mt-4"> <span class="font-weight-normal"> <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100">
                                                   <i> 25% </i>
                                                </div>
                                                </div>
                                            </p>


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
                            </div> --}}


                        </div>
                    </div>
                </section>
                <section>
                    <div class="container fixed-bottom">
                        <div class="row">
                            <button class="btn btn-dark rounded-circle ml-auto mb-3 py-3 px-3" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-briefcase" title="Add New Expense" style="font-size:22px;"></span></button>
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
                            <form action="{{ route('/processSavings') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="benName" class="font-weight-bold">Savings Info</label>
                                            <input type="text" id="benName" name="info" class="form-control" placeholder="What are you saving for...">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="benAcc" class="font-weight-bold">Enter Amount</label>
                                            <input type="number" id="benAcc" name="amount" class="form-control" placeholder="Enter Amount you like to save">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="benName" class="font-weight-bold">Enter Duration </label>
                                            <input type="number" id="benName" name="duration" class="form-control" placeholder="Savings per Interval">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="font-weight-bold" id="benInterval">Select Interval</label>
                                            <select id="benInterval" name="interval" class="form-control">
                                            <option selected="" value="weekly">Weekly </option>
                                            <option value="every 14 days">2 Weeks </option>
                                            <option value="every 21 days">3 Weeks </option>
                                            <option value="monthly">Monthly </option>
                                            <option value="yearly">Yearly </option>
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

</html>