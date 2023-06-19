
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="static\css\home.css">
</head>

<body>
  <header>
    <h2 class="logo"><a href="home.php">2Do List</a></h2>
    <nav class="navigation">
      <a href="home.php">Home</a>
      <a href="about.php">About us</a>
      <a href="#">Services</a>
      <a href="#">Contact</a>
      <a href="login.php">Login</a>
      <button type="submit" class="btn-login">
        <a href="register.php">

          Sign up
        </a>
      </button>
    </nav>
  </header>
  <main>
    <div class="main">
      <h1>
      <p class="multipleStrings"></p>
      <strong>
        </strong> <br></h1>

      <p class="down-main-text">Stay Organized, Stay Ahead .
        Fuel Your Success with Productivity</p>
      <button type="submit" class="btn-login">
        <a href="register.php">
          Start Now
        </a>
      </button>
    </div>
  </main>
  <div class="second-section">
    <div class="img-1">
      <img src="static/images/org.jpg" alt="">
    </div>
    <p class="benifit"><strong>Organization and Time Management: </strong><br>A to-do list helps you stay organized by providing a clear overview of tasks and priorities. It helps you manage your time effectively and ensures that important tasks are not overlooked or forgotten.</p>
  </div>

  <div class="second-section">
    <p class="benifit"><strong>Stress Reduction:</strong><br> Keeping track of tasks and having a plan in place reduces stress and anxiety. With a to-do list, you can have peace of mind, knowing that you have a clear roadmap to follow and that important tasks are accounted for.</p>
    <div class="img-2">
      <img src="static/images/rdc.jpg" alt="">
    </div>
  </div>
  <div class="trust">
    <img src="static/images/down.jpg" alt="">

    <p class="benifit">Trust in our todo list to be your reliable companion in your quest for productivity and organization. We are dedicated to providing a seamless, secure, and feature-rich solution that earns your trust and helps you stay focused on what matters most."
    </p>
    <button type="submit" class="btn-login ">
      <a href="register.php">
        Create Account
      </a>
    </button>
  </div>

  <footer class="footer-distributed">

        <div class="footer-left">
            <h3>2Dolist<span> Task manager</span></h3>

            <p class="footer-links">
                <a href="home.php">Home</a>
                |
                <a href="about.php">About</a>
                |
                <a href="contact.php">Contact</a>
                |
               
            </p>

            <p class="footer-company-name">Copyright © 2023 <strong>2Dolist</strong> All rights reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Kathamandu</span>
                    Nepal</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+977 9849140637</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:2dolist99@gmal.com">2Dolist99@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                <strong>2Dolist</strong> is a powerful task management tool designed to help individuals streamline their daily tasks, prioritize their goals, and achieve maximum efficiency. Whether you are a student, professional, or busy individual, our platform offers a range of features and customizable options tailored to meet your unique needs.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer>
  <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
  <script>

    new TypeIt(".multipleStrings", {
      strings: ["  Rise Above Procrastination,", " Embrace Discipline, and Unleash Your True Potential with our Revolutionary Todo List"],
      speed: 30,
      waitUntilVisible: true,
    }).go();
    </script>
</body>

</html>