<?php
session_start();
// Only allow logged-in users to access this page
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require_once 'settings.php';

// Delete EOIs by job reference
if (isset($_POST['delete_by_job'])) {
    $jobRef = $_POST['job_ref'];
    $stmt = $conn->prepare("DELETE FROM eoi WHERE job_ref=?");
    $stmt->bind_param("s", $jobRef);
    $stmt->execute();
}

// Update EOI status
if (isset($_POST['update_status'])) {
    $eoiid = $_POST['eoi_id'];
    $newStatus = $_POST['status'];
    $stmt = $conn->prepare("UPDATE eoi SET status=? WHERE eoi_id=?");
    $stmt->bind_param("si", $newStatus, $eoiid);
    $stmt->execute();
}

// Sorting
$orderBy = "eoi_id";
if (!empty($_GET['sort'])) {
    $allowed = ["first_name", "last_name", "job_ref", "status"];
    if (in_array($_GET['sort'], $allowed)) {
        $orderBy = $_GET['sort'];
    }
}

// Filtering (job ref / first / last name)
$where = "";
$params = [];
$types = "";
if (!empty($_GET['job_ref'])) {
    $where .= " job_ref=? ";
    $params[] = $_GET['job_ref'];
    $types .= "s";
}
if (!empty($_GET['first_name'])) {
    $where .= ($where ? " AND " : "") . " first_name=? ";
    $params[] = $_GET['first_name'];
    $types .= "s";
}
if (!empty($_GET['last_name'])) {
    $where .= ($where ? " AND " : "") . " last_name=? ";
    $params[] = $_GET['last_name'];
    $types .= "s";
}

$sql = "SELECT * FROM eoi";
if ($where)
    $sql .= " WHERE $where";
$sql .= " ORDER BY $orderBy ASC";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL prepare failed: " . $conn->error . "<br>SQL: " . $sql);
}

if ($params) {
    $stmt->bind_param($types, ...$params);
}

if (!$stmt->execute()) {
    die("SQL execute failed: " . $stmt->error);
}

$result = $stmt->get_result();
?>

<?php
$page_title = 'Manage EOIs';
$page_description = 'Cyber Snug staff area - manage expressions of interest';
$page_keywords = 'Cyber Snug, manage, EOI';
$body_id = 'manage';
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="manage-main">
    <div class="manage-header">
      <h1>EOI Management</h1>
      <div class="manage-user">
        <span>Welcome, <strong><?= htmlspecialchars($_SESSION['user']); ?></strong></span>
        <a class="logout-button" href="logout.php">Logout</a>
      </div>
    </div>

    <section class="manage-section">
      <h2>All EOIs</h2>
      <div class="table-wrap">
        <table class="manage-table">
          <thead>
            <tr>
              <th>EOI ID</th>
              <th>Job Ref</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['eoi_id']); ?></td>
                <td><?= htmlspecialchars($row['job_ref']); ?></td>
                <td><?= htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['status']); ?></td>
                <td>
                  <form method="post" class="status-form">
                    <input type="hidden" name="eoi_id" value="<?= htmlspecialchars($row['eoi_id']); ?>">
                    <select name="status">
                      <option value="New" <?= ($row['status'] == 'New') ? 'selected' : ''; ?>>New</option>
                      <option value="Current" <?= ($row['status'] == 'Current') ? 'selected' : ''; ?>>Current</option>
                      <option value="Final" <?= ($row['status'] == 'Final') ? 'selected' : ''; ?>>Final</option>
                    </select>
                    <button type="submit" name="update_status">Update</button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section class="manage-section">
      <h2>Search EOIs</h2>
      <form method="get" class="manage">
        <label>Job Reference: <input type="text" name="job_ref"></label>
        <label>First Name: <input type="text" name="first_name"></label>
        <label>Last Name: <input type="text" name="last_name"></label>
        <label>Sort by:
          <select name="sort">
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="job_ref">Job Reference</option>
            <option value="status">Status</option>
          </select>
        </label>
        <button type="submit">Filter/Sort</button>
      </form>
    </section>

    <section class="manage-section">
      <h2>Delete EOIs</h2>
      <form method="post" class="manage">
        <input type="text" name="job_ref" required placeholder="Job Ref">
        <button type="submit" name="delete_by_job" class="danger-button">Delete by Job Ref</button>
      </form>
    </section>
  </main>

<?php require_once 'footer.inc'; ?>
<?php
$conn->close();
?>