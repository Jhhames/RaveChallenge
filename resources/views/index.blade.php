<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Spave - Spend wisely, Save wisely  </title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/wallet.png')}}" >

</head>

<body>

    <section id="head-background">
        <nav id="nav-bar" class="navbar navbar-expand-sm comic fixed-top">
            <a class="navbar-brand mr-auto" href="#head-background">
                <img src="img/favicon.png" alt="logo" style="height:70px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span style="color: #6f42c1" class="fa fa-bars fa-lg"></span>
                    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto justify-content-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link " href="#contact">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link " href="#how-it-works">How it works</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link " href="#delta-flow">Services</a>
                    </li>
                    <li class="nav-item mx-2">
                        <button class="btn btn-sm btn-purple" data-toggle="modal" data-target="#loginModal">Sign in</button>
                    </li>

                </ul>
            </div>
        </nav>


        <div class="container-fluid" id="head-text">
            <div class="row text-white">
                <div class="col-sm-6 monospace text-right" id="left-head">
                    <span class="d-block fantasy h3">
                            Lorem ipsum dolor sit amet consectetu elit. Sint, non.
                            </span>
                    <span class="d-block comic">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, iure?
                            <span class="d-bloack">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </span>

                </div>


                <div class="col-sm-6 monospace" id="right-head">
                    <span class="d-block h3 fantasy">
                            We got you covered
                            </span>
                    <span class="d-block comic">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.

                            Lorem ipsum, dolor sit amet consectetur adipisicing.
                            </span>
                </div>
            </div>
        </div>
        <div class="container justify-content-center">
            <center>

                <button type="button" class="btn btn-purple" data-toggle="modal" id="join-button" data-target="#exampleModal">
                        Join Today
                    </button>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <header class="card-header">
                                                <a href="" data-toggle="modal" data-target="#loginModal" class="float-right btn btn-outline-secondary mt-1">Log in</a>
                                                <h4 class="card-title mt-2">Sign up</h4>
                                            </header>
                                            <article class="card-body">
                                            <form action="{{ route('register') }}" method="POST">
                                                @csrf
                                                    <div class="form-row">
                                                            <label class="font-weight-bold"> Fullname </label>
                                                            <input type="text" required class="form-control
                                                            {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                                            value=" {{ old('name') }} "
                                                            placeholder="Enter Fullname" autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div> 
                                                    <!-- form-row end.// -->
                                                    {{-- <div class="form-group text-left font-weight-bold">
                                                        <label>Username </label>
                                                        <input type="text" required class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                        value="{{ old('username') }}" name="username" placeholder="Choose a username">
                                                        
                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                                                        
                                                    </div> --}}
                                                    <div class="form-group text-left font-weight-bold">
                                                        <label>Email address</label>
                                                        <input type="email" required class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        value="{{ old('email') }}" name="email" placeholder="Enter Email address">
                                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                                                    </div>
                                                    
                                                    </div>
                                                    <!-- form-row.// -->
                                                    <div class="form-group text-left font-weight-bold">
                                                        <label class="text-left">Create password</label>
                                                        <input class="form-control" required type="password" name="password" placeholder="Create Password">
                                                        
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                                    </div>
                                                    
                                                    <div class="form-group text-left font-weight-bold">
                                                        <label class="text-left">confirm password</label>
                                                        <input class="form-control" required type="password" name="password_confirmation" placeholder="Create Password">
                                                    </div>
                                                    <!-- form-group end.// -->
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                                                    </div>
                                                </form>
                                                <!-- form-group// -->
                                                <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                                            </article>
                                            <!-- card-body end .// -->
                                            <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
                                        </div>
                                        <!-- card.// -->
                                    </div>
                                    <!-- col.//-->

                                </div>
                                <!-- row.//-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>

    </section>
    <section id="delta-flow" class="text-dark p-3 bg-white ">
        <div class="container-fluid p-2">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <h3 class="font-weight-bold text-center verdana">Stressful tranferring funds at regular intervals right? </h3>
                    <hr id="thread1">
                    <!-- <div class="d-block text-center" style="font-size:20px;"><span class="fa fa-refresh fa-spin"></span></div> -->
                    <p class="lead text-center">
                        No more stress. Delta is here to give you that rest of mind you deserve.
                    </p>
                </div>
            </div>
            <div class=" mt-4 row">
                <div class="col-sm-4">

                    <div class="card shadow shadow-lg">
                        <div class="card-body">
                            <center>
                                <span class="fa fa-sign-in" style="font-size:40px;"></span>
                                <h3 class="monospace">Create a Delta account </h3>
                                <P>Sign up into your ease</P>
                                <P>Perform a ton of schedules and manage your recipients via our awesome dashboard</P>
                            </center>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card shadow shadow-lg">
                        <div class="card-body">
                            <center>
                                <span class="fa fa-user-plus" style="font-size:40px;"></span>
                                <h3 class="monospace">Add Beneficiaries </h3>
                                <P>Add your beneficiary in one click and schedule your payments</P>
                                <P>Yeah, its that easy</P>
                            </center>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card shadow shadow-lg">
                        <div class="card-body">
                            <center>
                                <span class="fa fa-check-square-o" style="font-size:40px;"></span>
                                <h3 class="monospace"> Schedule Your Expenses</h3>
                                <P>Spave got you covered</P>
                                <P>With the option to pause and resume transfers at will</P>

                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="how-it-works" class="text-white p-4">
        <div class="container p-4">
            <div class="row justify-content-center p-4">
                <div class="col-sm-6">
                    <h3 class="comic text-center font-weight-bold">Spave's Mode Of Operations <span class="fa fa-rocket"></span> </h3>
                    <p class="lead">
                        Setting up your Delta recursive fund transfer is pretty easy, follow the steps listed below and enjoy our services
                    </p>
                </div>
            </div>
        </div>
        <div class="container p-4 mt-2 text-white">
            <div class="row">
                <div class="col-sm-6">
                    <center>
                        <img src="img/master.png" alt="Step-1">
                    </center>
                </div>
                <div class="col-sm-6">
                    <h3> <span class="fa fa-credit-card"></span> Add Payment Method</h3>
                    <p class="lead">
                        Adding payment method is the first step to confort yourself on our platform to relieve stress when authorising future fund transfers <br> We accept <span class="fa fa-cc-mastercard"></span> MasterCard, <span class="fa fa-credit-card"></span>                        verve, <span class="fa fa-cc-visa"></span> Visa cards hence you enjoy the ease irrespective of your bank or card type
                    </p>
                </div>

            </div>
        </div>

        <div class="container p-4 mt-2 text-white">
            <div class="row">
                <div class="col-sm-6 pt-4">
                    <h3> <span class="fa fa-user-plus"></span> Add Beneficiaries to Your Account</h3>
                    <p class="lead">
                        Beneficiaries are the center point of the platform, they are the recipients of your scheduled fund transfers, <br> Be sure to add a description when adding a beneficiary to make your dashboard easier to your eyes. <br> Funds transfer
                        to a beneficiary can not be less than #1,000

                    </p>
                </div>
                <div class="col-sm-6">
                    <center>
                        <img src="img/user.png" alt="Step-2" width="80%">
                    </center>
                </div>

            </div>
        </div>

        <div class="container p-4 mt-2 text-white">
            <div class="row">
                <div class="col-sm-6">
                    <center>
                        <img src="img/money.png" alt="Step-3" width="80%">
                    </center>
                </div>
                <div class="col-sm-6">
                    <h3> <span class="fa fa-plus"></span> <span class="fa fa-dollar"></span><span class="fa fa-eur"></span> Fund Each of your Beneficiary cards</h3>
                    <p class="lead">
                        Since everything Delta does is aimed towards consumer's ease, You can fund your Delta account per beneficiary so as to avoid issues if you happen to run out of fund in your account and less important schedules get authorised before important onces. Funding
                        your beneficiary is just with a button click. Click the button displaying the recipient's fund balance to add more! Enjoy!!!
                    </p>
                </div>

            </div>
        </div>

        <div class="container p-4 mt-2 text-white">
            <div class="row">
                <div class="col-sm-6 pt-4">
                    <h3> <span class="fa fa-send"></span> Schedule And Start Your Fund transfers</h3>
                    <p class="lead">
                        The good news abbout Delta is the total control over your fund transfer schedules, You can pause and resume your schedules as you wish, Join the awesome journey today and remain stressfree!!

                    </p>
                </div>
                <div class="col-sm-6">
                    <center>
                        <img src="img/schedule.png" alt="Step-2" width="80%">
                    </center>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <button class="btn btn-primary mx-auto" data-toggle="modal" data-target="#exampleModal">
                                Sign Up Today
                        </button>
                    </center>

                </div>


            </div>
        </div>


    </section>
    <footer class="footer p-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-light">
                    <div class="row">
                        <div class="col-6">
                            <img src="img/favicon.png" alt="Logo" width="100%">
                        </div>
                        <div class="col-6 pt-md-4 pt-sm-o">
                            <ul class="nav text-dark">
                                <li class="nav-item"><a href="" class="nav-link pl-0"><i class="fa fa-facebook fa-lg text-white"></i></a></li>
                                <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-twitter fa-lg text-white"></i></a></li>
                                <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-github fa-lg text-white" ></i></a></li>
                                <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-instagram fa-lg text-white"></i></a></li>

                            </ul>
                        </div>
                    </div>

                    <br>
                </div>
                <div class="col-md-2">
                    <h5 class="text-md-right text-light" id="contact">Contact Us</h5>
                    <hr>
                </div>
                <div class="col-md-5">
                    <form>
                        <fieldset class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </fieldset>
                        <fieldset class="form-group">
                            <textarea class="form-control" id="exampleMessage" placeholder="Message"></textarea>
                        </fieldset>
                        <fieldset class="form-group text-xs-right">
                            <button type="button" class="btn btn-outline-secondary ">Send</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--Modal: Contact form-->
        <div class="modal-dialog cascading-modal" role="document">

            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header purple white-text">
                    <h4 class="title">
                        <i class="fa fa-user"></i> Sign In</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <form action=" {{ route('login') }} " method="POST">
                        @csrf
                        <!-- Material input name -->
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="text" name="email" id="materialFormNameModalEx1" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" >
                            <label for="materialFormNameModalEx1">Your Email</label>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>

                        <!-- Material input email -->
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" name="password" id="materialFormEmailModalEx1" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">
                            
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <label for="materialFormEmailModalEx1">Password</label>
                        </div>



                        <div class="text-center mt-4 mb-2">
                            <button class="btn btn-purple">Sign in
                            <i class="fa fa-sign-in ml-2"></i>
                        </button>
                        </div>

                    </form>

                </div>
            </div>
            <!--/.Content-->
        </div>
        <!--/Modal: Contact form-->
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js "></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src=" js/bootstrap.min.js "></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src=" js/mdb.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll > 100) {
                    $("#nav-bar").addClass('nav-bar-scroll');
                    $('.nav-link').addClass('nav-link-scroll');

                } else {
                    $('#nav-bar').removeClass('nav-bar-scroll');
                    $('.nav-link').removeClass('nav-link-scroll');

                }
            })
        });

        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>
</body>


</html>