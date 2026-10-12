<!DOCTYPE html>
<html lang="en">

<!--- meta elements -->
<head>
  <meta charset="utf-8">
  <meta name="description" content="Cyber Snug homepage">
  <meta name="keywords" content="Cyber Snug, homepage, introduction">
  <meta name="author" content="html wizards">
  <title>Homepage</title>
<link rel="stylesheet" href="./styles/styles.css" type="text/css">
<!--- added the link to stylesheet -->

  <!-- Embedded CSS  -->
  <!--sets font sizes for h3 and h1 inside .title block-->
  <style>
    .title h3 {
    font-size: 2rem;
    padding: 0;
    margin: 0;
   }

    .title h1 {
   font-size: 3rem;
    padding: 0;
    margin: 0;
  }
  </style>
</head>

<body>
  <header>
  <!--- added links to each page -->
  <!--main site nav, including logo lightbox popup-->
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

  <main class="main">
    <!--company name/slogan and description to the left, image on the right-->
    <div class="content-row">
      <div class="left-content">
        <div class="title">
            <!-- inline CSS  -->
          <h3 style="-webkit-text-stroke: 1px #AEAFFF; ">Cyber Snug</h3>
          <h1>We put the hackers to bed</h1>
        </div>
        <aside class="company-description">
          <p>
            At Cyber Snug we pride ourselves on our ability to provide the friendliest
            and most effective cyber security solutions to our clients. Our team of experts
            is dedicated to staying ahead of the latest threats and providing top-notch
            protection for your business.
          </p> 
          <p>
            With the power of friendship and collaboration,
            we can build a world where everyone can feel safe and secure online.
            Join us in our mission to create a safer digital world for all.
          </p>
        </aside>
      </div>
      <img id="visual-slogan" src="images/putting_hackers_to_sleep.png" alt="visual representation of our slogan">
    </div>

<!---table demonstrating our services-->
    <table class="services-table">
      <thead>
        <tr>
          <th class="services-header" colspan="4" >Why Cyber Snug is the One-Stop for Your Cyber Security Needs</th>
        </tr>
        <tr>
          <th>Services</th>
          <th>Cyber Snug</th>
          <th>Competitor 1</th>
          <th>Competitor 2</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Cyber Security Consultation</td>
          <td class="checkmark-symbol"></td>
          <td class="checkmark-symbol"></td>
          <td></td>
        </tr>
        <tr>
          <td>Penetration Testing</td>
          <td class="checkmark-symbol"></td>
          <td></td>
          <td class="checkmark-symbol"></td>
        </tr>
        <tr>
          <td>Incident Response</td>
          <td class="checkmark-symbol"></td>
          <td class="checkmark-symbol"></td>
          <td></td>
        </tr>
        <tr>
          <td>Security Awareness Training</td>
          <td class="checkmark-symbol"></td>
          <td></td>
          <td class="checkmark-symbol"></td>
        </tr>
        <tr>
          <td>Managed Security Services</td>
          <td class="checkmark-symbol"></td>
          <td class="checkmark-symbol"></td>
          <td></td>
        </tr>
        <tr>
          <td>Compliance and Regulatory Support</td>
          <td class="checkmark-symbol"></td>
          <td class="checkmark-symbol"></td>
          <td></td>
        </tr> 
        <tr>
          <td>Vulnerability Assessment</td>
          <td class="checkmark-symbol"></td>
          <td></td>
          <td class="checkmark-symbol"></td>
      </tbody>
    </table>
    <!--acknowledgment of country statement-->
    <p class="acknowledgment-of-land">Cyber Snug acknowledges the Traditional Owners of the land on which we work and live.
       We pay our respects to Elders past, present and emerging.
    </p>
  </main>
  <footer>
  <!--Site footer with links Github repo, Jira Board and contact email-->
    <p ><a href="https://github.com/106131320/Project-part-1" target="_blank">Cyber Snug's Github Page!</a></p>
    <p ><a href="https://snugcyber.atlassian.net?continue=https%3A%2F%2Fsnugcyber.atlassian.net%2Fwelcome%2Fsoftware&atlOrigin=eyJpIjoiZGUwYWVmOGFkY2FlNDNkOGJjMmJmNWQ0NGI5NGQwYzEiLCJwIjoiaiJ9" 
    target="_blank">Cyber Snug's Jira portfolio </a></p>
    <p ><a href="mailto:snugcyber@gmail.com" target="_blank">snugcyber@gmail.com</a></p>
  </footer>
</body>



</html>
