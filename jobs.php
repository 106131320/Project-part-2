<?php
session_start();
$page_title = 'Position Description';
$page_description = 'Job Description for available roles at Cyber Snug';
$page_keywords = 'Cyber Snug, careers, cyber security engineer, cyber security architect, cyber security assurance analyst, digital forensics examiner, job description';
$body_id = 'jobs_page';
$extra_css = '
  <!-- Embedded CSS  -->
  <!--Gives h1 and h2 a light purple outline effect using text-stroke-->
  <style>
    h2 {
        -webkit-text-stroke: 1px #AEAFFF;
        color: black;
    }
  </style>';

// shared layout: <head>, then site header/navigation
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="jobs_main">
    <?php
    require_once 'settings.php'; //include db settings
    
    
    if ($conn) { //check for succcessful connection
        $query = "SELECT * FROM jobs ORDER BY job_id"; // fetch jobs from db
        $result = mysqli_query($conn, $query); //execute query on given connection
        
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<!-- Jobs loaded from db -->";
            
            $job_count = 0; //initialize job counter
            while ($row = mysqli_fetch_assoc($result)) {
                $job_count++; // increase job count whenever loop runs
                
                if ($job_count > 1) {
                    echo '<div class="job_divider"></div>'; // adds divider between each job descriptions
                }
                ?>
                
                <section id="job<?php echo $job_count; ?>" class="jobs_main"> <!-- create sections for each job and apply css class for styles -->
                    <h2>Position <?php echo $job_count; ?>: <?php echo $row['job_title']; ?></h2>
                    
                    <div class="job_description"> <!-- div container to group job info together and apply css class for styles -->

                      <!-- retrieves job details from db & display onto webpage -->
                        <p><strong>Reference Number:</strong> <?php echo $row['job_reference_number']; ?></p>
                        <p><strong>Salary:</strong> <?php echo $row['salary_range']; ?></p>
                        <p><strong>Reporting Line:</strong> <?php echo $row['reporting_line']; ?></p>
                    </div>

                    <h3>Job Description</h3>
                    <p><?php echo $row['job_description']; ?></p> <!-- retrieves job desc from db & display onto webpage -->

                    <h3>Key Responsibilities</h3>
                    <ul>
                        <?php
                        $responsibilities = explode(';', $row['key_responsibilities']); //splits text whenever semicolon is detected
                        foreach ($responsibilities as $responsibility) { //loops through array
                            if (trim($responsibility)) { //removes whitespaces from beginning & end of string
                                echo '<li>' . trim($responsibility) . '</li>'; //display each as a bullet point
                            }
                        }
                        ?>
                    </ul>

                    <h3>Essential & Preferable Requirements</h3>
                    <h4>Essential Requirements</h4>
                    <ol>
                        <?php
                        $essentials = explode(';', $row['essential_requirements']);
                        foreach ($essentials as $essential) {
                            if (trim($essential)) {
                                echo '<li>' . trim($essential) . '</li>';
                            }
                        }
                        ?>
                    </ol>

                    <h4>Preferable Requirements</h4>
                    <ul>
                        <?php
                        if (!empty($row['preferable_requirements'])) {
                            $preferables = explode(';', $row['preferable_requirements']);
                            foreach ($preferables as $preferable) {
                                if (trim($preferable)) {
                                    echo '<li>' . trim($preferable) . '</li>';
                                }
                            }
                        } else {
                            echo '<li>None specified</li>';
                        }
                        ?>
                    </ul>
                </section>
                
                <?php
            }
            
            mysqli_free_result($result); // free the memory associated db
        } else {
            // if no jobs found in db
            echo '<div class="error-message">';
            echo '<h2>No Job Positions Available</h2>';
            echo '</div>';
        }
        
        mysqli_close($conn); //close db connection
    } else {
        // failed db connection
        echo '<div class="error-message">';
        echo '<h2>Database Connection Error</h2>';
        echo '<p>Unable to load job positions at this time. Please try again later.</p>';
        echo '</div>';
    }
    ?>
  </main>

<?php require_once 'footer.inc'; ?>

