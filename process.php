<?php
require_once("settings.php");

// Initialize an array to store validation errors
$errors = [];

// prevents users from accessing this page directly
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
    header("Location: apply.php");
    exit();
}

$table = 'eoi';

// sanitises and removes backslashes, whitespaces and converts any html characters to prevent attacks
function sanitise_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

$fields = [
    'reference-number',
    'first-name',
    'last-name',
    'date-of-birth',
    'gender',
    'street-address',
    'town',
    'state',
    'postcode',
    'email',
    'phone-number',
    'other-skills-long'
];

//loops each field and sanitises input
$data = [];
foreach ($fields as $field) {
    $data[$field] = sanitise_input($_POST[$field] ?? '');
}

$skills = ['communication', 'teamwork', 'problem-solving', 'adaptability'];
foreach ($skills as $skill) {
    $data[$skill] = isset($_POST[$skill]) ? 'Yes' : 'No';
}

$data['other-skills'] = isset($_POST['other-skills']) ? 'Yes' : 'No';

// --- Server-side Validation ---

// Validate 'reference-number'
if (empty($data['reference-number'])) {
    $errors[] = "Reference Number is required.";
} elseif (!preg_match('/^[a-zA-Z0-9]{5}$/', $data['reference-number'])) {
    $errors[] = "Reference Number must be 5 alphanumeric characters.";
}

// Validate 'first-name'
if (empty($data['first-name'])) {
    $errors[] = "First Name is required.";
} elseif (!preg_match('/^[a-zA-Z]{1,20}$/', $data['first-name'])) {
    $errors[] = "First Name must be 1-20 alphabetic characters.";
}

// Validate 'last-name'
if (empty($data['last-name'])) {
    $errors[] = "Last Name is required.";
} elseif (!preg_match('/^[a-zA-Z]{1,20}$/', $data['last-name'])) {
    $errors[] = "Last Name must be 1-20 alphabetic characters.";
}

// Validate 'date-of-birth'
if (empty($data['date-of-birth'])) {
    $errors[] = "Date of Birth is required.";
} else {
    // Validate DD/MM/YYYY format
    if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/\d{4}$/', $data['date-of-birth'])) {
        $errors[] = "Invalid Date of Birth format. Use DD/MM/YYYY.";
    } else {
        $dob_parts = explode('/', $data['date-of-birth']);
        if (count($dob_parts) === 3) {
            $data['date-of-birth'] = $dob_parts[2] . '-' . $dob_parts[1] . '-' . $dob_parts[0];
        } else {
            $errors[] = "Invalid date format. Use DD/MM/YYYY.";
        }
    }
}


// Validate 'gender'
$allowedGenders = ['male', 'female', 'non-binary', 'other'];
if (empty($data['gender'])) {
    $errors[] = "Gender is required.";
} elseif (!in_array($data['gender'], $allowedGenders)) {
    $errors[] = "Invalid gender selection.";
}

// Validate 'street-address'
if (empty($data['street-address'])) {
    $errors[] = "Street Address is required.";
} elseif (strlen($data['street-address']) > 40) {
    $errors[] = "Street Address cannot exceed 40 characters.";
}

// Validate 'town'
if (empty($data['town'])) {
    $errors[] = "Town/Suburb is required.";
} elseif (strlen($data['town']) > 40) {
    $errors[] = "Town/Suburb cannot exceed 40 characters.";
}

// Validate 'state'
$allowedStates = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
if (empty($data['state'])) {
    $errors[] = "State is required.";
} elseif (!in_array($data['state'], $allowedStates)) {
    $errors[] = "Invalid state selection.";
}

// Validate 'postcode'
if (empty($data['postcode'])) {
    $errors[] = "Postcode is required.";
} elseif (!preg_match('/^[0-9]{4}$/', $data['postcode'])) {
    $errors[] = "Postcode must be 4 digits.";
}

// Validate 'email'
if (empty($data['email'])) {
    $errors[] = "Email is required.";
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Validate 'phone-number'
if (empty($data['phone-number'])) {
    $errors[] = "Phone Number is required.";
} elseif (!preg_match('/^[0-9\s\-]{8,12}$/', $data['phone-number'])) { // Allows spaces and hyphens, 8-12 digits
    $errors[] = "Phone Number must be 8-12 digits and can include spaces or hyphens.";
}

// If other skills checkbox is checked, 'other-skills-long' should not be empty
if ($data['other-skills'] === 'Yes' && empty($data['other-skills-long'])) {
    $errors[] = "Please describe your other skills.";
}

// --- End Server-side Validation ---

// If there are any errors, display them and stop execution
if (!empty($errors)) {
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';
    echo '<head?>';
    echo '<title>Application Error</title>';
    echo '<link rel="stylesheet" href="styles/project.css" type="text/css">';
    echo '</head>';
    echo '<body>';
    echo "<h1>Application Submission Failed!</h1>";
    echo "<h2>Please correct the following errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<p><a href='apply.php'>Go back to the application form</a></p>";
    echo "</body>";
    exit();
}


// Create the EOI table if it doesn't already exist

$createTableSQL = "
CREATE TABLE IF NOT EXISTS `$table` (
    eoi_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_ref CHAR(5) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male', 'female', 'non-binary', 'other'),
    street_address VARCHAR(150),
    town VARCHAR(100),
    state CHAR(3),
    postcode CHAR(4),
    email VARCHAR(150),
    phone_number VARCHAR(15),
    communication ENUM('Yes','No'),
    teamwork ENUM('Yes','No'),
    problem-solving ENUM('Yes','No'),
    adaptability ENUM('Yes','No'),
    other_skills ENUM('Yes','No'),
    other_skills_long TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
) ENGINE=InnoDB;
";
if (!mysqli_query($conn, $createTableSQL)) {
    die("<p>Error creating table: " . mysqli_error($conn) . "</p>");
}


$insertSQL = "INSERT INTO `$table`
    (job_ref, first_name, last_name, date_of_birth, gender, street_address, town, state, postcode,
     email, phone_number, communication, teamwork, problem-solving, adaptability, other_skills, other_skills_long)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insertSQL);

if (!$stmt) {
    die("<p>SQL Prepare failed: " . mysqli_error($conn) . "</p>");
}

$genderForDB = $data['gender'];

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssssssss",
    $data['reference-number'],
    $data['first-name'],
    $data['last-name'],
    $data['date-of-birth'],
    $genderForDB,
    $data['street-address'],
    $data['town'],
    $data['state'],
    $data['postcode'],
    $data['email'],
    $data['phone-number'],
    $data['communication'],
    $data['teamwork'],
    $data['problem-solving'],
    $data['adaptability'],
    $data['other-skills'],
    $data['other-skills-long']
);


// Execute and check if it was successful
if (mysqli_stmt_execute($stmt)) {
    $eoi_id = mysqli_insert_id($conn);
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';
    echo '<head?>';
    echo '<title>Application Success!</title>';
    echo '<link rel="stylesheet" href="styles/project.css" type="text/css">';
    echo '</head>';
    echo '<body>';
    echo "<h2>Application submitted successfully!</h2>";
    echo "<p>Your Expression of Interest ID is: <strong>" . htmlspecialchars($eoi_id) . "</strong>. Please keep this for your records.</p>";
    echo "<p><a href='apply.php'>Submit another application</a> | <a href='jobs.php'>View Available Jobs</a></p>";
    echo "</body>";
} else {
    echo "<p>Database error: " . mysqli_error($conn) . "</p>";


mysqli_stmt_close($stmt);
mysqli_close($conn);}
?>