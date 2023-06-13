
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="static\css\home.css">
</head>

<body>
  <header>
    <h2 class="logo"><a href="home.php">2Do List</a></h2>
    <nav class="navigation">
      <a href="home.php">Home</a>
      <a href="#">About us</a>
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
      <h1><strong>
          Rise Above Procrastination,</strong> <br> Embrace Discipline, and Unleash Your True Potential with our Revolutionary Todo List</h1>

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
    <button type="submit" class="btn-login">
      <a href="register.php">
        Create Account
      </a>
    </button>
  </div>

  <footer>
    <div class="main-content">
      <div class="left box">
        <h2>About us</h2>
        <div class="content">
          <p>2Do List is a powerful task management tool designed to help individuals streamline their daily tasks, prioritize their goals, and achieve maximum efficiency. Whether you are a student, professional, or busy individual, our platform offers a range of features and customizable options tailored to meet your unique needs.</p>
          <div class="social">
            <a href="https://facebook.com/coding.np"><span class="fab fa-facebook-f"></span></a>
            <a href="#"><span class="fab fa-twitter"></span></a>
            <a href="https://instagram.com/coding.np"><span class="fab fa-instagram"></span></a>
            <a href="https://youtube.com/c/codingnepal"><span class="fab fa-youtube"></span></a>
          </div>
        </div>
      </div>

      <div class="center box">
        <h2>Address</h2>
        <div class="content">
          <div class="place">
            <span class="fas fa-map-marker-alt"></span>
            <span class="text">Kathmandu,Nepal</span>
          </div>
          <div class="phone">
            <span class="fas fa-phone-alt"></span>
            <span class="text">+97798********</span>
          </div>
          <div class="email">
            <span class="fas fa-envelope"></span>
            <span class="text">2dolist@gmail.com</span>
          </div>
        </div>
      </div>

      <div class="right box">
        <h2>Contact us</h2>
        <div class="content">
          <form action="#">
            <div class="email">
              <div class="text">Email *</div>
              <input type="email" required>
            </div>
            <div class="msg">
              <div class="text">Message *</div>
              <textarea rows="2" cols="25" required></textarea>
            </div>
            <div class="btn">
              <button type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bottom">
      <center>
        <span class="credit">Created By <a href="home.php">2Do list</a> | </span>
        <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
      </center>
    </div>
  </footer>
</body>

</html>