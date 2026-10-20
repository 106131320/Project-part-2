<?php
$page_title = 'Job Application';
$page_description = 'Application form for Cyber Snug';
$page_keywords = 'Cyber Snug, application form, application, apply';
$extra_head = '
  <!-- Embedded CSS  -->
  <!--style the fieldset legends-->
  <style>
  legend {
    font-size: 1.4rem;
    font-weight: 600;
    color: black;
    padding: 0 10px;
  }
  </style>';
 
// shared layout: <head>, then site header/navigation
require_once 'header.inc';
require_once 'nav.inc';
?>

<main class="application_body">

  <h1>Application Form</h1>
  <!--submits via POST to swinburne endpoint-->
    <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
      <fieldset class="applicant-info-fieldset">
        <legend>Applicant Information</legend>
          <!--- job reference input only allows people to type 6 alphanumeric characters  -->

        <label for="Job_reference_number">Job reference number:</label>
        <input class="selectable" type="text" id="Job_reference_number" name="Job_reference_number"  pattern=".{6}" placeholder="abc123" required>

       <label for="First_name">First name:</label>
       <!--Letters only, up to 20 characters-->
        <input class="selectable" type="text" id="First_name" name="First_name"  pattern="[A-Za-z]{1,20}" placeholder="Jane" required>
        
        <label for="Last_name">Last name:</label>
        <input class="selectable" type="text" id="Last_name" name="Last_name"  pattern="[A-Za-z]{1,20}" placeholder="Doe" required>

       <label for="Date_of_birth">Date of birth:</label>
       <!--restricts data picker so no date after Jan 1st 2026 can be chosen-->
       <input class="selectable" type="date" id="Date_of_birth" name="Date_of_birth" max="2026-01-01" required>
  
      <!--gender roles, radio group-->
      <fieldset class="gender-fieldset">
        <legend>Gender</legend>
       <label for="male">Male</label>
       <input type="radio" name="gender" id="male" value="male" required>

       <label for="female">Female</label>
       <input type="radio" name="gender" id="female" value="female" required>

        <label for="non-binary">Non-Binary</label>
       <input type="radio" name="gender" id="non-binary" value="non-binary" required>

       <label for="other">Other</label>
       <input type="radio" name="gender" id="other" value="other" required>
    </fieldset>
    
      <!--address fields: street, town/suburb, state dropdown, postcode-->
      <label for="street-address">Street Address</label>
      <input class="selectable" type="text" name="street-address" id="street-address" pattern=".{1,40}" placeholder="123 Example Road" required="">

      <label for="town">Town/Suburb</label>
      <input class="selectable" type="text" name="town" id="town" pattern=".{1,40}" placeholder="Example" required="">

  
     <label for="state">State:</label>
      <select class="selectable" id="state" name="state" required>
        <option value="">Please Select a state</option>
        <option value="VIC">VIC</option>
        <option value="NSW">NSW</option>
        <option value="QLD">QLD</option>
        <option value="NT">NT</option>
        <option value="WA">WA</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="ACT">ACT</option>
      </select>

      <label for="postcode">Postcode:</label>
      <input class="selectable" type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="1234" required="">

    </fieldset>

    <!--contact details, email and phone number-->
    <fieldset>
      <legend>Applicant Contact Information</legend>

      <label for="email">Email:</label>
      <input class="selectable" type="email" id="email" name="email" placeholder="example@email.com" required="">
    
      <label for="phone">Phone:</label>
      <!--Must be exactly 10 digits-->
      <input class="selectable" type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="0412345678" required="">
    </fieldset>

<!--skills section, set of checkboxes and optional "other skills" text area-->
<fieldset>
      <legend>Applicant Skills</legend>

      <div class="skill-group-standard">

        <label for="skill1">
         <input type="checkbox" name="communication" id="skill1" > Communication
        </label>
        <label for="skill2">
          <input type="checkbox" name="teamwork" id="skill2" > Teamwork
        </label>
        <label for="skill3">
          <input type="checkbox" name="problem-solving" id="skill3" > Problem Solving
       </label>
        <label for="skill4">
          <input type="checkbox" name="adaptability" id="skill4" > Adaptability
       </label>
      </div>

      <!--checking "other skills" reveal text area for applicant to describe additional skills-->
      <div class="other-skills-control">
        <input type="checkbox" name="other-skills" id="other-skills">
        <label for="other-skills">Other Skills</label>
        <div id="hidden">
          <label for="other-skills-long">What are your other skills?</label>
          <textarea
            class="selectable"
            name="other-skills-long"
            id="other-skills-long"
            placeholder="Type your other skills here"></textarea>
        </div>
      </div>
    </fieldset>
    <div class="buttons"> <!--- Inline CSS for button text color -->
      <input class="button" type="submit" value="Submit" style="color: black;">
      <input class="button" type="reset" value="Reset form">
    </div>
    </form>
</main>

<?php require_once 'footer.inc'; ?>