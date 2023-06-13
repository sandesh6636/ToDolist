<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About us</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto:wght@100;300&family=Rubik+Pixels&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Geologica:wght@600&family=Montserrat:wght@100&family=Roboto:wght@100;300&family=Rubik+Pixels&display=swap');
:root {
  --dark-color: #00203FFF;
  --darker-color: #084C61FF;
  --darkest-color: #07689F;
  --light-color: #B5D9EB;
  --lighter-color: #CEE6F2;
  --lightest-color: #FEFFFF;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  padding-top:100px;
}
    header { 
       display: flex; 
       position: fixed; 
       top: 0; 
       left: 0; 
       width: 100%; 
       padding: 20px 30px; 
       justify-content: space-between; 
       align-items: center; 
       z-index: 99; 
       background-color: var(--lightest-color); 
  
     } 
  
     .logo { 
       font-size: 2rem; 
  
     } 
  
     .logo a { 
       text-decoration: none; 
       color: var(--dark-color); 
       font-family: Arial, sans-serif; 
       font-family: 'Montserrat', sans-serif; 
       font-weight: bold; 
     } 
  
     .navigation a { 
       position: relative; 
       color: var(--dark-color); 
       margin-left: 40px; 
       font-family: 'Geologica', sans-serif; 
       font-size: 20px; 
       text-decoration: none; 
     } 
  
     .navigation .btn-login { 
       width: 130px; 
       height: 50px; 
       background: transparent; 
       border: 2px solid var(--dark-color); 
       background-color: var(--dark-color); 
       border-radius: 17px; 
       color: var(--lightest-color); 
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
       margin-left: 40px; 
       transition: .5s; 
     } 
  
     .navigation .btn-login:hover { 
       /* background-color: var(--lightest-color); */ 
       color: var(--dark-color); 
     } 
  
     .navigation .btn-login a { 
       color: var(--lightest-color); 
       margin: 0; 
     } 
  
     .navigation a::after { 
       content: ''; 
       position: absolute; 
       width: 100%; 
       height: 4px; 
       background: var(--darker-color); 
       border-radius: 5px; 
       left: 0; 
       bottom: -6px; 
       transform: scaleX(0); 
       transition: transform .4s; 
       transform-origin: right; 
     } 
  
     .navigation a:hover::after { 
       transform-origin: left; 
       transform: scaleX(1); 
     } 
 

.about {
  width: 100%;
  padding: 78px 0;
  background-color: var(--lightest-color);
}

.about img {
  width: auto;
  height: 420px;
}

.about .text {
  
  width: 550px;
}

.main {
  width: 1130px;
  max-width: 90%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

.about .text h1 {
         font-family: 'Montserrat', sans-serif; 
  font-size: 50px;
  text-transform: capitalize;
  margin-bottom: 20px;
}

.about .text h5 {
         font-family: 'Montserrat', sans-serif; 
  font-size: 29px;
  text-transform: capitalize;
  margin-bottom: 20px;
  letter-spacing: 2px;
}

.about .text a {
  text-decoration: none;
  color: var(--dark-color);
  cursor: pointer;
}

.about .text span {
  color: var(--darkest-color);
}

.about .text p {
  letter-spacing: 1px;
  line-height: 28px;
  font-size: 19px;
  margin-bottom: 48px;
}

.about .main .text button {
  background-color: var(--dark-color);
  color: var(--lightest-color);
  text-decoration: none;
  border: 2px solid transparent;
  border-radius: 20px;
  padding: 12px 13px;
  font-weight: bold;
  transition: 0.5s;
}

.about .main .text button:hover {
  background-color: transparent;
  color: var(--dark-color);
  border: 2px solid var(--dark-color);
  cursor: pointer;
}

.key-features {
  
  margin-top: 50px;
  font-size:20px;
}

.key-features h2 {
         font-family: 'Montserrat', sans-serif; 
  font-size: 36px;
  text-transform:capitalize;
  font-weight:bold;
  letter-spacing:2px;
  text-align: center;
  margin-bottom: 30px;
}

.key-features ul {
  list-style-type: disc;
  text-transform:capitalize;
  letter-spacing:1px;
  margin-left: 40px;
  margin-bottom:40px;
  font-size: 19px;
  line-height: 32px;
}

.team-section {
  margin-top: 50px;
}

.team-section h2 {
         font-family: 'Montserrat', sans-serif; 
  font-size: 36px;
  text-align: center;
  margin-bottom: 30px;
  text-transform:capitalize;
  letter-spacing:2px;
  font-weight:bold;
}

.team-member {
  display: flex;
  align-items: center;
  justify-content: center;
  text-transform:capitalize;
  margin-bottom: 30px;
  margin-left:30px;
}

.team-member img {
  width: 180px;
  height: 180px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 20px;
}
.team-member button{
background-color: var(--darkest-color);
  color: var(--lightest-color);
  text-decoration:
fonts.googleapis.com
You sent
none;
  border: 2px solid transparent;
  border-radius: 20px;
  padding: 12px 13px;
  font-weight: bold;
  transition: 0.5s;
}
.team-member button:hover{
  background-color: transparent;
  color: var(--dark-color);
  border: 2px solid var(--dark-color);
  cursor: pointer;
}
.team-member button a{
  text-decoration:none;
  color:var(--lightest-color);
}

.team-member button a:hover{
  color:var(--dark-color);
  
}
.team-member div {
  flex-grow: 1;
}

.team-member h3 {
  font-family: 'Montserrat', sans-serif; 
  text-transform:capitalize;
  letter-spacing:2px;
  font-size: 24px;
  margin-bottom: 10px;
}

.team-member p {
  text-transform:capitalize;
  letter-spacing:1px;
  font-size: 19px;
  line-height: 28px;
}
.thank-you-section {
  margin-top: 50px;
  text-align: center;
}

.thank-you-section p {
  text-transform:capitalize;
  letter-spacing:1px;
  font-size: 19px;
  line-height: 28px;
}

.thank-you-section span {
  font-weight: bold;
}
.thank-you-section span a{
  text-decoration:none;
  color:var(--darkest-color);
}
</style>
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
      <h1>About Us</h1>
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
    <img src="Sandesh-Rai.jpg" alt="Sandesh Rai">
    <div>
      <h3>Sandesh Rai</h3>
      <p>Sandesh is the leader of our team. He contributed to the login page, home page, and to-do list functionality.</p>
      <button type="button"><a href="https://www.facebook.com/profile.php?id=100031102463841">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="Ruma-Roka.jpg" alt="Ruma Roka">
    <div>
      <h3>Ruma Roka</h3>
      <p>Ruma is a member of our team. She helped to create the registration page for our to-do list application.</p>
      <button type="button"><a href="https://www.facebook.com/ruma.rokka.1">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="Kabin-Munankarmi.jpg" alt="Kabin Munankarmi">
    <div>
      <h3>Kabin Munankarmi</h3>
      <p>Kabin is another member of our team. He contributed to the design of the homepage and create the about us page.</p>
      <button type="button"><a href="https://www.facebook.com/kabin.munankarmi">Let's Talk</a></button>
    </div>
  </div>
  <div class="team-member">
    <img src="Bharat-Rijal.jpg" alt="Bharat Rijal">
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
<script>
  function showFullContent(){
    document.getElementById('fullContent').style.display="block";
    
  }
</script>
</body>

</html>