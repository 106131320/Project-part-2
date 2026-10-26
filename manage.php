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
<!DOCTYPE html>
<html>

<head>
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="styles/project.css" type="text/css">

</head>

<body>
    <h1>EOI Management (Welcome <?= $_SESSION['user']; ?>)</h1>

    <h2>All EOIs</h2>
    <table border="1">
        <tr>
            <th>EOI ID</th>
            <th>Job Ref</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['eoi_id']; ?></td>
                <td><?= $row['job_ref']; ?></td>
                <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <form method="post" style="display:inline">
                        <input type="hidden" name="eoi_id" value="<?= $row['eoi_id']; ?>">
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
    </table>

    <h2>Search EOIs</h2>
    <form method="get" class="manage">
        Job Reference: <input type="text" name="job_ref">
        First Name: <input type="text" name="first_name">
        Last Name: <input type="text" name="last_name">
        <label>Sort by:</label>
        <select name="sort">
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="job_ref">Job Reference</option>
            <option value="status">Status</option>
        </select>
        <button type="submit">Filter/Sort</button>
    </form>

    <h2>Delete EOIs</h2>
    <form method="post" class="manage">
        <input type="text" name="job_ref" required placeholder="Job Ref">
        <button type="submit" name="delete_by_job">Delete by Job Ref</button>
    </form>
    <a href="logout.php">Logout</a>
</body>

</html>
<?php
$conn->close();
?>