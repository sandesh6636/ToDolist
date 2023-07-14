<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About us</title>
  <link rel="stylesheet" href="static\css\about.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
        body {
            font-family: 'Alata', sans-serif;
            font-weight: 400;
        }
        </style>
  
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
      <h2 class="logo"><a href="home.php">2Do List</a></h2>
      <nav class="navigation">
        <a href="home.php">Home</a>
        <a href="#">About us</a>
        <a href="contactus.php">Contact</a>
        <a href="login.php">Login</a>
        <button type="submit" class="btn-login">
          <a href="register.php">
  
            Sign up
          </a>
        </button>
      </nav>
    </header>
<section class="about" id="halfContent">
  <div class="main" data-aos="fade-in">
    <img src="static/images/about.jpg" alt="">
    <div class="text r">
      <h1 id="simpleUsage"></h1>
      <h5><a href="home.php"><span>2Do</span>-list</a></h5>
            <p>Welcome to ToDoList, your go-to application for managing your tasks and getting things done!
            Our mission is to provide a simple and intuitive to-do list application that helps you stay organized and increase productivity.</p>
           
            <div class="container">
            <div class="btn"><a href="#"  onclick="showFullContent()">Read more </a></div>
            </div>
		
			

	</div>		
    
  </div>
</section>
<section class="about" id="fullContent" style="display:none";>
  <div class="key-features" data-aos="flip-left">
      <h2>Key Features</h2>
      <ul>
        <li>Create and manage multiple to-do lists: Stay organized by creating separate to-do lists for work, personal tasks, or any other category you need.</li>
        <li>Add tasks with due dates and priorities: Set due dates and prioritize your tasks to ensure timely completion and effective task management.</li>
        <li>Mark tasks as complete and track your progress: Easily track completed tasks to stay motivated and monitor your productivity over time.</li>
        <li>Set reminders and receive notifications: Never miss an important task or deadline with customizable reminders and notifications.</li>
        <li>Collaborate and share lists with others: Work together with colleagues, friends, or family members by sharing your to-do lists and collaborating in real-time.</li>
      </ul>
  </div>
  <div class="team-section" data-aos="fade-in">
    
  <h2>Meet the Team</h2>
  <div class="team-member" data-aos="fade-right">
    <img src="static/images/sandesh.jpg" alt="Sandesh Rai">
    <div>
      <h3>Sandesh Rai</h3>
      <p>Sandesh is the leader of our team. He contributed to the login page, home page, and to-do list functionality.</p>
      <button type="button"><a href="https://www.facebook.com/profile.php?id=100031102463841">Let's Talk</a></button>
      
    </div>
  </div>
  <div class="team-member">
    <img src="static/images/ruma.jpg" alt="Ruma Roka">
    <div>
      <h3>Ruma Roka</h3>
      <p>Ruma is a member of our team. She helped to create the registration page for our to-do list application.</p>
      <button type="button"><a href="https://www.facebook.com/ruma.rokka.1">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="static/images/kabin.jpg" alt="Kabin Munankarmi">
    <div>
      <h3>Kabin Munankarmi</h3>
      <p>Kabin is another member of our team. He contributed to the design of the homepage and create the about us page.</p>
      <button type="button"><a href="https://www.facebook.com/kabin.munankarmi">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="static/images/bharat.jpg" alt="Bharat Rijal">
    <div>
      <h3>Bharat Rijal</h3>
      <p>Bharat is a member of our team. He assisted us in the development of various features of the to-do list application.</p>
    <button type="button"><a href="https://www.facebook.com/profile.php?id=100071550348497">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="Rekha-Tharu.jpg" alt="Rekha Tharu">
    <div>
      <h3>Rekha Tharu</h3>
      <p>Rekha is also a member of our team. She provided valuable input and support throughout the project.</p>
      <button type="button"><a href="#">Let's Talk</a></button>
    </div>
  </div>
  </div>
  <div class="thank-you-section">
    <p>Whether you're a student, professional, or anyone looking to stay organized, ToDoList i
    <span>
      
    Thank you for choosing <a href="home.php">2Do-List</a>
    </span>
    </p>
    
  </div>
</section> 
<!-- Remove the container if you want to extend the Footer to full width. -->
<footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; padding-top: 59px;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
    <!-- Left -->
    <div class="me-5">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container-fluid text-center text-md-start mt-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">2do-List</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p>
          Are you looking for a seamless and efficient way to manage your tasks and stay organized? Look no further! We are thrilled to present our cutting-edge to-do list app designed to transform the way you approach productivity and task management.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><a href="login.php" class="text-dark">Login</a></p>
          <p><a href="register.php" class="text-dark">Register</a></p>
          <p><a href="contact.php" class="text-dark">Contact</a></p>
          <p><a href="home.php" class="text-dark">Home</a></p>
       
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><i class="fas fa-home mr-3"></i>Kathamandu , Nepal</p>
          <p><i class="fas fa-envelope mr-3"></i> <a href="mailto:2dolist99@gmail.com">2dolist99@gmail.com"</a></p>
          <p><i class="fas fa-phone mr-3"></i><a href="tel:+9779849140637">+9779849140637</a></p>
          
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 2do-list.com
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
<script>
  function showFullContent(){
    document.getElementById('fullContent').style.display="block";
    
  }
  new TypeIt("#simpleUsage", {
  strings: "About Us",
  speed: 50,
  waitUntilVisible: true,
}).go();
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <!-- our aos data -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        AOS.init({
            offset: 300,
            duration: 1000,
        });
        </script>

</body>

</html>