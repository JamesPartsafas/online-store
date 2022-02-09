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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Judson&display=swap">
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
      $(document).ready(function(){
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
            }, 800, function(){
      
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          } // End if
        });
      });
      </script>

</head>
<body>
    <!--HEADER/MENU BAR-->
    <div class="row justify-content-center">header and/or menu bar goes here, just delete this</div>
    <!--END HEADER-->

    <!--CONTENT-->
    @yield('content')
    <!--END CONTENT-->

    <!--FOOTER-->
    <footer>
    <div class="row justify-content-center">footer goes here, just delete this</div>
    </footer>
    <!--END FOOTER-->
  </div>
</body>
</html>
