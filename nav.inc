<header>
  <!--- added links to each page -->
  <!--main site navigation, including logo with lightbox popup-->
  <!-- used example from https://www.w3schools.com/howto/howto_js_lightbox.asp to create lightbox feature>
  <nav>
    <ul>
      <li>
        <a href="#logo-lightbox">
        <img id="logo" src="images/Cyber_Snug_FINAL.png" alt="Company Logo">
        </a>
      </li>
      <li><a href="./">Home</a></li>
      <li><a href="./jobs.php">Available Jobs</a></li>
      <li><a href="./apply.php">Application Form</a></li>
      <li><a href="./about.php">About Us</a></li>
    </ul>
  </nav>
</header>
 
<!--Hidden lightbox that displays enlarged version of logo when nav logo link is clicked-->
<div class="lightbox" id="logo-lightbox">
    <a href="#" aria-label="Close">
      <span style="background-image: url('images/Cyber_Snug_FINAL.png');"></span>
    </a>
</div>