<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rare store is one place stop for all your ecommerce needs">
    <meta name="keywords" content="rareecom,rarestore,ecommerce,buy online, store">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <title>Rare Store</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">

    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jsgrid.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">

</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container">
                <div class="row">
                 
                    <div class="col-md-7 p-0 card-right">
                        <div class="card tab2-card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><span class="icon-user mr-2"></span>Login</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                        <form class="form-horizontal auth-form" action="{{route('login')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input required="" name="email" type="email" class="form-control" placeholder="Email" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                           
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                        <form class="form-horizontal auth-form">
                                            <div class="form-group">
                                                <input required="" name="login[username]" type="email" class="form-control" placeholder="Username" id="exampleInputEmail12">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="login[password]" type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="login[password]" type="password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                                    <label class="custom-control-label" for="customControlAutosizing1"><span>I agree all statements in <a href="" class="pull-right">Terms &amp; Conditions</a></span></label>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Register</button>
                                            </div>
                                            <div class="form-footer">
                                                <span>Or Sign up with social platforms</span>
                                                <ul class="social">
                                                    <li><a class="icon-facebook" href=""></a></li>
                                                    <li><a class="icon-twitter" href=""></a></li>
                                                    <li><a class="icon-instagram" href=""></a></li>
                                                    <li><a class="icon-pinterest" href=""></a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a href="index.html" class="btn btn-primary back-btn"><i data-feather="arrow-left"></i>back</a> -->
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

    <!-- Sidebar jquery-->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>

    <!-- Jsgrid js-->
    <script src="{{asset('assets/js/jsgrid/jsgrid.min.js')}}"></script>
    <script src="{{asset('assets/js/jsgrid/griddata-invoice.js')}}"></script>
    <script src="{{asset('assets/js/jsgrid/jsgrid-invoice.js')}}"></script>

    <!-- lazyload js-->
    <script src="{{asset('assets/js/lazysizes.min.js')}}"></script>

    <!--right sidebar js-->
    <script src="{{asset('assets/js/chat-menu.js')}}"></script>

    <!--script admin-->
    <script src="{{asset('assets/js/admin-script.js')}}"></script>
    <script>
        $('.single-item').slick({
            arrows: false,
            dots: true
        });
    </script>

</body>

</html>