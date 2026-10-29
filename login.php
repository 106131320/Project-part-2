<?php
session_start();

// already logged in? skip the form and go straight to the manage page
if (!empty($_SESSION['user'])) {
    header("Location: manage.php");
    exit;
}

require_once 'settings.php'; // Includes the DB connection $conn

// shown after logout.php redirects here
if (isset($_GET['loggedout'])) {
    $message = "You have been logged out.";
}

// --- HANDLE LOGIN ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user'] = $username;
        header("Location: manage.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
$conn->close();

// shared layout: <head>, then site header/navigation
$page_title = 'Staff Login';
$page_description = 'Cyber Snug staff login';
$page_keywords = 'Cyber Snug, staff login';
$body_id = 'login';
require_once 'header.inc';
require_once 'nav.inc';
?>

  <main class="login-main">
    <div class="login-container">
      <h2>Staff Login</h2>

      <?php if (!empty($message)): ?>
        <div class="success-message"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="post" action="login.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" required autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>

      <a href="index.php">&larr; Return to homepage</a>
    </div>
  </main>

<?php require_once 'footer.inc'; ?>