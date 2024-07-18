<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>footer</title>
  <style>
    footer{
        background-image: url('/images/purple1.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;


    }

    .links{
      color:whitesmoke;
      padding: 2%;
    }
    .links:hover{

color:rgb(14, 13, 13);

    }
    .icons{
      color: white;
      padding: 3%;
    }
    .icons:hover{
      color: black;
    }
    .text{
      color: rgb(255, 255, 255);
    }
    .heading{
      color: rgb(55, 117, 211);
    }
    .logo{
width: 150px;
max-width: 200px;
height: auto;
max-height: 150px;
    }

  </style>
</head>
<body>
  <footer>
    <section class="footer">
        <div class="container py-5">
            <div class="row">
                <!-- Logo Section -->
                <div class="col-md-2">
                    <img src="{{ asset('images/icons.png') }}" alt="Logo" class="logo img-fluid" >
                </div>
                <!-- About Us Section -->
                <div class="col-md-4 mb-6 mb-md-0">
                    <h4 class="heading">About Us</h4>
                    <p class="text mb-1">
                        <i class="fas fa-info-circle me-2"></i>
                        Welcome to Vouchmenot. Your ultimate destination for savvy shoppers seeking to unlock the secret to saving money while indulging in their favorite shopping sprees. We are more than just a website; we are your trusted companion in the world of discounts, deals, promo codes, bundle offers, comparisons, and invaluable money-saving tips.
                    </p>
                </div>
                <!-- Site Links Section -->
                <div class="col-md-3 mb-3 mb-md-0">
                    <h4 class="heading">Site Links</h4>
                    <ul class="list-unstyled">
                        <li><a class="links d-flex align-items-center text-decoration-none" href="/"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li><a class="links d-flex align-items-center text-decoration-none" href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact us</a></li>
                        <li><a class="links d-flex align-items-center text-decoration-none" href="{{ route('about') }}"><i class="fas fa-info-circle me-2"></i>About us</a></li>
                        <li><a class="links d-flex align-items-center text-decoration-none" href="{{ route('term_and_condition') }}"><i class="fas fa-file-alt me-2"></i>Terms and Condition</a></li>
                        <li><a class="links d-flex align-items-center text-decoration-none" href="{{ route('privacy') }}"><i class="fas fa-lock me-2"></i>Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- Get in Touch Section -->
                <div class="col-md-3">
                    <h4 class="heading">Get in Touch</h4>
                    <div class="d-flex mb-2">
                        <a href="https://www.facebook.com/deals69official" target="_blank" class="icons me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                        <a href="https://www.instagram.com/officialdeals69/" target="_blank" class="icons me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.pinterest.com/deals69official/" target="_blank" class="icons"><i class="fab fa-pinterest fa-2x"></i></a>
                    </div>
                    <h4 class="heading">Contact Us</h4>
                    <p class="text "><i class="icons fas fa-envelope me-2"></i>deeaalss69@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="text-center py-4 border-top text-muted">
            <p class="text mb-0">Developed By <a class="text-decoration-none" href="https://alphaisoft.com/" target="_blank">Alpha Ai Solution</a></p>
        </div>
    </section>
</footer>


</body>
</html>
