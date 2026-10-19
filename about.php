<?php
$page_title = 'About Us';
$page_description = 'About Cyber Snug team';
$page_keywords = 'Cyber Snug, about us, our team, meet the team';
$extra_head = '
  <!-- Embedded CSS  -->
  <!--Gives h1 and h2 a light purple outline effect using text-stroke-->
  <style>
    h1 , h2 {
        -webkit-text-stroke: 1px #AEAFFF;
      color: black;
    }
  </style>';
 
// shared layout: <head>, then site header/navigation
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="main">
    <h1>Meet the Cyber Snug Team</h1>
    <p> We call ourselves the <strong>HTML WIZARDS</strong> and we are behind the static recruitment website for the Cyber Security company <strong>Cyber Snug</strong></p>
    <h2>Meet the Team!</h2>
    <!--Nested list-->
      <ul>
      <li>Group Details
        <ul>
          <li>Group Number: 01</li>
          <li>Tutorial Class: Tuesday, 12:30pm</li>
        </ul>
      </li>
      </ul>
    <!--combined group photo, compressed file to 283KB-->
   <figure class="group-photo">
      <img src="images/Combined_Group_Photo.png" alt="The HTML Wizards team group photo" width="2201" height="636">
      <figcaption><em>Current Team Members: Allegra, Freshta, Zoe and An</em></figcaption>
    </figure>

    <!--grid of team member profiles: name, quote and contribution list-->
      <div class="team-grid">
   <dl class="team-member">
     <dt>Allegra Masri</dt>
      <dd>Puedo terminar el trabajo más rápido que peluquear un calvo.</dd>
      <dd><em>I finish work faster than giving a haircut to a bald guy</em></dd>
      <dd>
       <ul>
          <li><strong>Contribution</strong>
            <ol>
              <li>Wrote HTML code for job descriptions of Cyber Security Engineer and Architect</li>
             <li>Wrote nested list structure and table for about.html page</li>
             <li>Wrote CSS code for about.html page</li>
             <li>Wrote HTML and CSS code for lightbox logo feature</li>
             <li>Validated my HTML and CSS and corrected any warnings and errors</li>
           </ol>
         </li>
       </ul>
      </dd>
    </dl>
   <dl class="team-member">
     <dt>Freshta Ahmadi</dt>
     <dd>خار د جان خودخو ده، سيزو د جان ديگا</dd>  
      <dd><em>Thrust a thorn into your own body, and a needle into someone else's. (Do to others as you would do to yourself)</em></dd>
      <dd>
       <ul>
         <li><strong>Contribution</strong>
            <ol>
             <li>Wrote HTML code for job application form</li>
             <li>Wrote HTML code and CSS for index.html page</li>
             <li>Wrote table demonstrating cell merging for index.html page</li>
             <li>Validated my HTML and CSS and corrected any warnings and errors</li>
           </ol>
         </li>
       </ul>
     </dd>
   </dl>
    <dl class="team-member">
     <dt>Zoe Ballantyne</dt>
     <dd>Mən yalnız ingiliscə bilirəm; ümid edirəm ki, tərcümə yaxşı alınıb.</dd>  
     <dd><em>i only know english, i hope it translated okay.</em></dd>
     <dd>
        <ul>
          <li><strong>Contribution</strong>
           <ol>
              <li>Wrote HTML code for job application form, home page</li>
              <li>Wrote CSS and html for footer and header</li>
              <li>Wrote CSS for apply.html, background, and some styling across the pages</li>
              <li>wrote CSS for basic page layouts and style</li>
              <li>Validated my HTML and CSS and corrected any warnings and errors</li>


           </ol>
         </li>
       </ul>
      </dd>
   </dl>
   <dl class="team-member">
     <dt>Ngo My An Dang</dt>
     <dd> Das Leben und dazu eine Katze, das gibt eine unglaubliche Summe.</dd>  
     <dd><em>Life and a cat, that adds up to an incredible sum.</em></dd>
     <dd>
       <ul>
          <li><strong>Contribution</strong>
            <ol>
              <li>Wrote HTML code for job descriptions of Cyber Security Assurance Analyst and Digital Forensic Examiner.</li>
              <li>Wrote CSS for jobs.html</li>
              <li>Validated my HTML and CSS and corrected any warnings and errors</li>
            </ol>
         </li>
       </ul>
      </dd>
   </dl>
   </div>

   <!--Table of fun facts-->
   <table class="fun-facts-table">
     <caption><strong>Team Member Fun Facts :D</strong></caption>
     <tr>
       <th>Team Member</th>
       <th>Fun Fact #1</th>
       <th>Fun Fact #2</th>
     </tr>
     <tr>
        <td>Allegra Masri</td>
        <td>I have an unhealthy obsession with collecting stickers and art prints</td>
        <td>I have over 1350 hours on animal crossing new horizons</td>
      </tr>
      <tr>
        <td>Freshta Ahmadi</td>
        <td>I held a snake in my hands when I was in Grade 3</td>
        <td>I was in the top 1% of monthly listeners for 3 different artists this year</td>
      </tr>
      <tr>
        <td>Zoe Ballantyne</td>
        <td>I made jewellery out of my wisdom teeth</td>
        <td>I have grey eyes, which is really rare and cool</td>
      </tr>
      <tr>
        <td>Ngo My An Dang</td>
        <td>I'm a big fan of 3rd gen hit boygroup Seventeen</td>
        <td>I saw one of my top artists at a concert last year</td>
      </tr>
    </table>
  </main>
  
<?php require_once 'footer.inc'; ?>
