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

                    <span class="badge badge-light">Bal: $50,0299 </span>
                </p>
                <hr class="separator">
                <li>
                    <a href=" {{route('/dashboard') }} " aria-expanded="false"> <span class="fa fa-home"></span> Home</a>
                </li>
                <li class="active">
                    <a href="{{route('/details') }} "><span class="fa fa-user-plus"></span> Add Details </a>
                </li>
                <li>
                    <a href="{{route('/savings') }}"><span class="fa fa-briefcase"></span> Savings </a>
                </li>
                <li>
                    <a href="{{route('/spendings') }}"><span class="fa fa-money"></span> Spendings and Expenses </a>
                </li>
                <li>
                    <a href="{{route('/addcard') }}"><span class="fa fa-credit-card"></span> Add billing method</a>
                </li>

                <li >
                    <a href="{{route('/history') }}"><span class="fa fa-calendar"></span> Transaction History </a>
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
            <section class="p-4 ">
                <div class="container-fluid">
                    <div class="row w-100">
                    <form action="{{ route('/adddetails') }}" class="form w-100">
                                        <div class="form-group text-left font-weight-bold col-md-6">
                                            <label>Account Number</label>
                                            <input type="number" required class="form-control {{ $errors->has('accnumber') ? ' is-invalid' : '' }}" name="accnumber"
                                            value=" {{ old('accnumber') }} " placeholder="Enter your bank account number">
                                        </div>
                                        <!-- form-group end.// -->
                                        <div class="form-group text-left font-weight-bold col-md-6">
                                            <label>Bank</label>
                                            <select id="bankSelect" name="bank" class="form-control">
                                                    <option selected disabled>Select Bank </option>
                                                    <option value="access-bank">Access Bank</option>
                                                    <option value="citibank-nigeria">Citibank Nigeria</option>
                                                    <option value="diamond-bank">Diamond Bank</option>
                                                    <option value="ecobank-nigeria">Ecobank Nigeria</option>
                                                    <option value="enterprise-bank">Enterprise Bank</option>
                                                    <option value="fidelity-bank">Fidelity Bank</option>
                                                    <option value="first-bank-of-nigeria">First Bank of Nigeria</option>
                                                    <option value="first-city-monument-bank">First City Monument Bank</option>
                                                    <option value="guaranty-trust-bank">Guaranty Trust Bank</option>
                                                    <option value="heritage-bank">Heritage Bank</option>
                                                    <option value="keystone-bank">Keystone Bank</option>
                                                    <option value="mainstreet-bank">MainStreet Bank</option>
                                                    <option value="skye-bank">Skye Bank</option>
                                                    <option value="stanbic-ibtc-bank">Stanbic IBTC Bank</option>
                                                    <option value="standard-chartered-bank">Standard Chartered Bank</option>
                                                    <option value="sterling-bank">Sterling Bank</option>
                                                    <option value="union-bank-of-nigeria">Union Bank of Nigeria</option>
                                                    <option value="united-bank-for-africa">United Bank For Africa</option>
                                                    <option value="unity-bank">Unity Bank</option>
                                                    <option value="wema-bank">Wema Bank</option>
                                                    <option value="zenith-bank">Zenith Bank</option>
                                            </select>
                                            
                                            @if ($errors->has('bank'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bank') }}</strong>
                                                </span>
                                            @endif
                                             <br>       
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-block btn-sm btn-primary"> Add Details </button>
                                            </div>
                                    </div> 
                    </form>
                </div>
            </section>


        </div>
    </div>



    <!-- Modal -->
    

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