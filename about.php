<?php
$page_title = 'About Us';
$page_description = 'About Cyber Snug team';
$page_keywords = 'Cyber Snug, about us, our team, meet the team';
$extra_css = '
  <!-- Embedded CSS  -->
  <!--Gives h1 and h2 a light purple outline effect using text-stroke-->
  <style>
    h1 , h2 {
        -webkit-text-stroke: 1px #AEAFFF;
      color: black;
    }
  </style>';
require_once 'settings.php';   // database connection: $conn
 
// Run a SELECT query and return every row as an array.
// Returns false if the query fails
function get_rows($conn, $query)
{
    $result = mysqli_query($conn, $query);
    if (!$result) {
        return false;
    }
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_free_result($result);
    return $rows;
}
 
$team = false;               // one row: group details
$members = array();          // team members, in display order
$projects = array();         // Project Part 1, Project Part 2
$contributions = array();    // $contributions[member_id][project_id][] = description
$facts = array();            // $facts[member_id][] = fun fact
$max_facts = 0;              // most fun facts any member has (table columns)
$name_list = '';             // "Allegra, Freshta, Zoe and An"
 
if ($conn) {
    // names and quotes
    mysqli_set_charset($conn, 'utf8mb4');
 
    $rows = get_rows($conn, "SELECT * FROM team_info ORDER BY team_id LIMIT 1");
    if ($rows) {
        $team = $rows[0];
        $team_id = (int) $team['team_id'];
 
        $rows = get_rows($conn, "SELECT member_id, full_name, preferred_name, quote_original, quote_translation
                                 FROM team_members WHERE team_id = $team_id ORDER BY display_order");
        if ($rows) {
            $members = $rows;
        }
 
        $rows = get_rows($conn, "SELECT project_id, project_name, project_summary FROM projects ORDER BY project_id");
        if ($rows) {
            $projects = $rows;
        }
 
        $rows = get_rows($conn, "SELECT member_id, project_id, description FROM member_contributions
                                 ORDER BY member_id, project_id, display_order");
        if ($rows) {
            foreach ($rows as $row) {
                $contributions[$row['member_id']][$row['project_id']][] = $row['description'];
            }
        }
 
        $rows = get_rows($conn, "SELECT member_id, fact_text FROM member_fun_facts ORDER BY member_id, display_order");
        if ($rows) {
            foreach ($rows as $row) {
                $facts[$row['member_id']][] = $row['fact_text'];
            }
        }
    }
    mysqli_close($conn);
 
    // build the figure caption and the number of fun fact columns
    $names = array();
    foreach ($members as $member) {
        $names[] = $member['preferred_name'];
        if (isset($facts[$member['member_id']])) {
            $max_facts = max($max_facts, count($facts[$member['member_id']]));
        }
    }
    if (count($names) > 1) {
        $last_name = array_pop($names);
        $name_list = implode(', ', $names) . ' and ' . $last_name;
    } else {
        $name_list = implode('', $names);
    }
}
// shared layout: <head>, then site header/navigation
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="main">
 
<?php if ($team && $members) { ?>
    <h1>Meet the <?php echo htmlspecialchars($team['company_name']); ?> Team</h1>
    <p> We call ourselves the <strong><?php echo htmlspecialchars($team['team_name']); ?></strong> and we are behind the recruitment website for the Cyber Security company <strong><?php echo htmlspecialchars($team['company_name']); ?></strong></p>
    <h2>Meet the Team!</h2>
    <!--Nested list-->
      <ul>
      <li>Group Details
        <ul>
          <li>Group Number: <?php echo htmlspecialchars($team['group_number']); ?></li>
          <li>Tutorial Class: <?php echo htmlspecialchars($team['tutorial_class']); ?></li>
        </ul>
      </li>
      </ul>
    <!--combined group photo, compressed file to 283KB-->
   <figure class="group-photo">
      <img src="<?php echo htmlspecialchars($team['group_photo']); ?>" alt="<?php echo htmlspecialchars($team['group_photo_alt']); ?>" width="2201" height="636">
      <figcaption><em>Current Team Members: <?php echo htmlspecialchars($name_list); ?></em></figcaption>
    </figure>
 
    <!--grid of team member profiles: name, quote and contributions for each project (from the database)-->
      <div class="team-grid">
<?php foreach ($members as $member) {
        $member_id = $member['member_id']; ?>
   <dl class="team-member">
     <dt><?php echo htmlspecialchars($member['full_name']); ?></dt>
     <dd><?php echo htmlspecialchars($member['quote_original']); ?></dd>
     <dd><em><?php echo htmlspecialchars($member['quote_translation']); ?></em></dd>
     <dd>
       <ul>
<?php foreach ($projects as $project) {
            $project_id = $project['project_id'];
            if (isset($contributions[$member_id][$project_id])) { ?>
         <li><strong><?php echo htmlspecialchars($project['project_name'] . ': ' . $project['project_summary']); ?></strong>
           <ol>
<?php foreach ($contributions[$member_id][$project_id] as $description) { ?>
             <li><?php echo htmlspecialchars($description); ?></li>
<?php           } ?>
           </ol>
         </li>
<?php       }
        } ?>
       </ul>
     </dd>
   </dl>
<?php } ?>
   </div>
 
<?php   if ($max_facts > 0) { ?>
   <!--Table of fun facts-->
   <table class="fun-facts-table">
     <caption><strong>Team Member Fun Facts :D</strong></caption>
     <tr>
       <th>Team Member</th>
<?php       for ($n = 1; $n <= $max_facts; $n++) { ?>
       <th>Fun Fact #<?php echo $n; ?></th>
<?php       } ?>
     </tr>
<?php       foreach ($members as $member) {
                $member_id = $member['member_id']; ?>
     <tr>
       <td><?php echo htmlspecialchars($member['full_name']); ?></td>
<?php           for ($n = 0; $n < $max_facts; $n++) { ?>
       <td><?php if (isset($facts[$member_id][$n])) { echo htmlspecialchars($facts[$member_id][$n]); } ?></td>
<?php           } ?>
     </tr>
<?php       } ?>
   </table>
<?php   } ?>
<?php } else { ?>
    <h1>Meet the Team</h1>
    <p>Sorry, our team information is unavailable at the moment. Please try again later.</p>
<?php } ?>
  </main>

<?php require_once 'footer.inc'; ?>
