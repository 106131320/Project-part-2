<?php
$page_title = 'Position Descriptions';
$page_description = 'Job Description for available roles at Cyber Snug';
$page_keywords = 'Cyber Snug, careers, cyber security engineer, cyber security architect, cyber security assurance analyst, digital forensics examiner, job description';
$body_id = 'jobs_page';

// shared layout: <head>, then site header/navigation
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="jobs_main">
    <!--- job search bar -->
    <div class="job_search">
        <form method="get" action="jobs.php">
           <label class="search-label" for="search">Search available positions:</label>
           <input class="search-input" type="text" id="search" name="search" placeholder="Enter a job title or keyword..."
              value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
           <button type="submit">Search</button>
            <a href="jobs.php">Clear search</a>
    </form>
</div>

    <?php
    
    require_once 'settings.php'; //include db settings
    
    
    if ($conn) { //check for succcessful connection
    $search = trim($_GET['search'] ?? '');
// searches database for any matching words in any table for jobs, and only shows the one with keywords

    if ($search !== '') {
        $query = "SELECT * FROM jobs
              WHERE CONCAT_WS(' ',
                  job_reference_number,
                  job_title,
                  salary_range,
                  reporting_line,
                  job_description,
                  key_responsibilities,
                  essential_requirements,
                  preferable_requirements
              ) LIKE ?
              ORDER BY job_id";

        $stmt = mysqli_prepare($conn, $query);
        $search_term = '%' . $search . '%';
        mysqli_stmt_bind_param($stmt, "s", $search_term);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        $query = "SELECT * FROM jobs ORDER BY job_id";
        $result = mysqli_query($conn, $query);
    }

        
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<!-- Loading jobs from db -->";
            
            $job_count = 0; //initialize job counter
            while ($row = mysqli_fetch_assoc($result)) {
                $job_count++; // increase job count whenever loop runs
                
                if ($job_count > 1) {
                    echo '<div class="job_divider"></div>'; // adds divider between each job descriptions
                }
                ?>
                
                <section id="job<?php echo $job_count; ?>" class="job_description"> <!-- create sections for each job and apply css class for styles -->
                    <h2>Position <?php echo $job_count; ?>: <?php echo $row['job_title']; ?></h2>
                    
                    <div class="job_description"> <!-- div container to group job info together and apply css class for styles -->

                      <!-- retrieves job details from db & display onto webpage -->
                        <p><strong>Reference Number:</strong> <?php echo $row['job_reference_number']; ?></p>
                        <p><strong>Salary:</strong> <?php echo $row['salary_range']; ?></p>
                        <p><strong>Reporting Line:</strong> <?php echo $row['reporting_line']; ?></p>
                    </div>

                    <h3>Job Description</h3>
                    <p><?php echo htmlspecialchars($row['job_description']); ?></p> <!-- retrieves job desc from db & display onto webpage -->

                    <h3>Key Responsibilities</h3>
                    <ul>
                        <?php
                        $responsibilities = explode(';', $row['key_responsibilities']); //splits text whenever semicolon is detected
                        foreach ($responsibilities as $responsibility) { //loops through array
                            if (trim($responsibility)) { //removes whitespaces from beginning & end of string
                                echo '<li>' . htmlspecialchars(trim($responsibility)) . '</li>'; //display each as a bullet point
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
                                echo '<li>' . htmlspecialchars(trim($essential)) . '</li>';
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
                                    echo '<li>' . htmlspecialchars(trim($preferable)) . '</li>';
                                }
                            }
                        } else {
                            echo '<li>None specified.</li>';
                        }
                        ?>
                    </ul>
                </section>
                
                <?php
            }
            
            mysqli_free_result($result); // free the memory associated db
        } else {
            // if no jobs found in db
            echo '<h2>No job positions listed.</h2>';
        }
        
        mysqli_close($conn); //close db connection
    } else {
        // failed db connection
        echo '<h2>Unable to load job positions at this time. Please try again later.</h2>';
    }
    ?>
  </main>

<?php require_once 'footer.inc'; ?>

