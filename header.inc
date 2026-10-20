<?php
if (!isset($page_title)) {
    $page_title = 'Cyber Snug';
}
if (!isset($page_description)) {
    $page_description = 'Cyber Snug - friendly and effective cyber security';
}
if (!isset($page_keywords)) {
    $page_keywords = 'Cyber Snug, cyber security';
}
?>
<!DOCTYPE html>
<html lang="en">
 
<!--- meta elements -->
<--- use source for htmlspecialchars() from https://coddy.tech/docs/php/htmlspecialchars --->
<head>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
  <meta name="author" content="html wizards">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <link rel="stylesheet" href="./styles/styles.css" type="text/css">
<?php
// page-specific embedded CSS
if (!empty($extra_css)) {
    echo $extra_css;
}
?>
</head>
 
<body<?php if (!empty($body_id)) { echo ' id="' . htmlspecialchars($body_id) . '"'; } ?>>