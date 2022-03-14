<!DOCTYPE HTML>
<html lang="en-CA">

<head>
  <title>Amaznot</title>
  <meta name="description" content="SOEN341 Store">
  <meta name="keywords" content="SOEN341">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">

  <!--BOOTSTRAP-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="https://kit.fontawesome.com/6ebd7b3ed7.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!--GOOGLE APIS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Work+Sans:300" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!--ICONS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/solid.min.js">

  <!--EXTERNAL STYLESHEET-->
  <link rel="stylesheet" href="/css/styles.css">

  <!--EXTERNAL SCRIPTS-->
  <script defer src="/js/script.js"></script>

  <!--FAVICON-->
  <link rel="icon" type="image/x-icon" href="{{url('/assets/amaznot.ico')}}">

  <!--SMOOTH SCROLLING CROSS-BROWSER-->
  <script>
    $(document).ready(function() {
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
    });
    });
  </script>

</head>

<body>
  <!--NAVBAR-->
  <div class="custom-nav">
    <input class="headerData" value="{{ $headerData['string'] }}" style="display: none;" />
    <div class="custom-top-nav">
      <div class="dropdown-container div-inline">
        <div class="dropdown div-inline">
          <button class="btn dropdown-toggle shadow-none lang" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            EN
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item change-dropdown" href="#">EN</a>
            <a class="dropdown-item change-dropdown" href="#">FR</a>
          </div>
        </div>
        <div class="dropdown div-inline">
          <button class="btn dropdown-toggle shadow-none currency" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CAD
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item change-dropdown" href="#">CAD</a>
            <a class="dropdown-item change-dropdown" href="#">USD</a>
          </div>
        </div>
      </div>
      <div class="controller-container div-inline">
        <div class="profile div-inline mr-4">
          @if(Illuminate\Support\Facades\Auth::check())
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="controller-link">
              <i class="fas fa-sign-out-alt"></i>
              Logout
            </button>
          </form>
          @else
          <a class="controller-link" href="{{ route('login') }}">
            <i class="fas fa-user"></i>
            Login
          </a>
          @endif
        </div>
        @if(Illuminate\Support\Facades\Auth::check() && !Illuminate\Support\Facades\Auth::user()->isAdmin())
        <div class="profile div-inline">
          <a class="controller-link mr-4" href="{{ route('orders') }}">
            <i class="fa-solid fa-rectangle-vertical-history"></i>
            Past Orders
          </a>
          <a class="controller-link" href="{{ route('cart') }}">
            <i class="fas fa-shopping-cart"></i>
            Items
          </a>
        </div>
        <p class="controller-total-price">
          $ 0.00
        </p>
        @elseif(Illuminate\Support\Facades\Auth::check() && Illuminate\Support\Facades\Auth::user()->isAdmin())
        <div class="profile div-inline">
          <a class="controller-link" href="{{route('adminpage')}}">
            <i class="fa-solid fa-user-gear"></i>
            Admin Page
          </a>
        </div>
        @endif
      </div>
    </div>
    <div class="custom-bottom-nav">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{route('home')}}">
          <img src="{{asset('assets/amaznot_full.png')}}" width="100" height="30" class="d-inline-block align-top logo-img" alt="Logo" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto navbar-items-container" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-items">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item dropdown position-static">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aisles
              </a>
              <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <div class="nav-categories-container">
                  <div class="category-item">
                    <h5 class="category-item-header">
                      Choose a Category
                    </h5>
                    @php
                    $data = array_map(fn($data) => $data['category'], $headerData['array']);
                    $data = array_unique($data);
                    @endphp
                    @foreach ($data as $cat)
                    <a class="category-item-title" href="{{ URL::to('products/' . $cat) }}">
                      {{$cat}}
                    </a>
                    @endforeach
                  </div>
                  <div class="category-links">
                    <h5 class="category-item-header">
                      Choose a Subcategory
                    </h5>
                    @php
                    $subcat = array_filter($headerData['array'], fn($sub) => strcmp($sub['category'], 'Toys and Games') === 0);
                    @endphp
                    @foreach ($subcat as $sub)
                    <a class="category-item-link" href="{{ URL::to('products/Toys%20and%20Games?subcategory=' . $sub['subcategory']) }}">{{$sub['subcategory']}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contactus') }}">Contact</a>
            </li>
            <li class="nav-item small-screen">
              @if(Illuminate\Support\Facades\Auth::check())
              <form action="{{ route('logout') }}" method="post" class="nav-form">
                @csrf
                <button type="submit" class="nav-link controller-link">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </button>
              </form>
              @else
              <a class="nav-link" href="{{ route('login') }}">Login</a>
              @endif
            </li>
            @if(Illuminate\Support\Facades\Auth::check() && !Illuminate\Support\Facades\Auth::user()->isAdmin())
            <li class="nav-item small-screen">
              <a class="nav-link" href="{{ route('cart') }}">Shopping Cart</a>
            </li>
            <li class="nav-item small-screen">
              <a class="nav-link" href="{{ route('orders') }}">Past Orders</a>
            </li>
            @elseif(Illuminate\Support\Facades\Auth::check() && Illuminate\Support\Facades\Auth::user()->isAdmin())
            <li class="nav-item small-screen">
              <a class="nav-link" href="{{route('adminpage')}}">Admin Page</a>
            </li>
            @endif
            <li class="nav-item dropdown small-screen">
              <div class="dropdown div-inline">
                <button class="btn dropdown-toggle shadow-none lang" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  EN
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item change-dropdown" href="#">EN</a>
                  <a class="dropdown-item change-dropdown" href="#">FR</a>
                </div>
              </div>
              <div class="dropdown div-inline">
                <button class="btn dropdown-toggle shadow-none currency" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  CAD
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item change-dropdown" href="#">CAD</a>
                  <a class="dropdown-item change-dropdown" href="#">USD</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--END NAVBAR-->

  <!--MENU-->
  <!--END MENU-->

  <!--HEADER-->
  <!--END HEADER-->

  <!--CONTENT-->
  @yield('content')
  <!--END CONTENT-->

  <!--FOOTER-->
  <footer class="container-fluid main-footer">
    <div class="footer-row">
      <div class="col-6 company-info">
        <img src="{{asset('assets/amaznot_full.png')}}" width="100" height="30" class="d-inline-block align-top logo-img" alt="Logo" loading="lazy">
        <p class="footer-desc">
          Amaznot is a proof-of-concept in e-commerce, showcasing the relative ease in deploying an online
          shopping site and the challenges that come along with it.
        </p>
      </div>
      <div class="col-6 footer-offers">
        <h4>Can we help?</h4>
        <a href="{{ route('contactus') }}" class="footer-links">Contact Us</a>
        <a href="{{ route('disclaimer') }}" class="footer-links">Disclaimer</a>
      </div>
    </div>
    <div class="accepted-payment">
      <i class="fab fa-cc-visa fa-2x"></i>
      <i class="fab fa-cc-paypal fa-2x"></i>
      <i class="fab fa-cc-mastercard fa-2x"></i>
      <i class="far fa-credit-card fa-2x"></i>
      <i class="fab fa-cc-amazon-pay fa-2x"></i>
    </div>
  </footer>
  <!--END FOOTER-->
  </div>
</body>

</html>