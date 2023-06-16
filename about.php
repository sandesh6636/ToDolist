<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About us</title>
  <link rel="stylesheet" href="static\css\about.css">
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
<section class="about" id="halfContent">
  <div class="main">
    <img src="static/images/about.jpg" alt="">
    <div class="text">
      <h1 id="simpleUsage"></h1>
      <h5><a href="home.php"><span>2Do</span>-list</a></h5>
            <p>Welcome to ToDoList, your go-to application for managing your tasks and getting things done!
            Our mission is to provide a simple and intuitive to-do list application that helps you stay organized and increase productivity.</p>
            <button type="button" onclick="showFullContent()">Read more</button>
    </div>
  </div>
</section>
<section class="about" id="fullContent" style="display:none";>
  <div class="key-features">
      <h2>Key Features</h2>
      <ul>
        <li>Create and manage multiple to-do lists: Stay organized by creating separate to-do lists for work, personal tasks, or any other category you need.</li>
        <li>Add tasks with due dates and priorities: Set due dates and prioritize your tasks to ensure timely completion and effective task management.</li>
        <li>Mark tasks as complete and track your progress: Easily track completed tasks to stay motivated and monitor your productivity over time.</li>
        <li>Set reminders and receive notifications: Never miss an important task or deadline with customizable reminders and notifications.</li>
        <li>Collaborate and share lists with others: Work together with colleagues, friends, or family members by sharing your to-do lists and collaborating in real-time.</li>
      </ul>
  </div>
  <div class="team-section">
    
  <h2>Meet the Team</h2>
  <div class="team-member">
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
</body>

</html>