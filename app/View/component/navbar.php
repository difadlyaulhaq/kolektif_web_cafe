<?php
$pages = isset($_GET['pages']) ? $_GET['pages'] : "";
?>

<div class="navbar">
    <h1>CAFE RAHAYU</h1>
    <div class="my-auto flex gap-x-4 font-navbar">
        <a href="home" class="<?php echo ($pages == "home" || $pages == "") ? 'active' : ''; ?> my-auto">Home</a>
        <a href="protected" class="<?php echo ($pages == "protected") ? 'active' : ''; ?> my-auto">Protected</a>
        <a href="dashboard" class="<?php echo ($pages == "dashboard") ? 'active' : ''; ?> my-auto">Dashboard</a>
        <a href="about" class="<?php echo ($pages == "about") ? 'active' : ''; ?> my-auto">About</a>
        <?php if ($pages == "signin"): ?>
            <a href="signin" class="button-primary my-auto">Sign In</a>
            <a href="signup" class="button-primary my-auto">Sign Up</a>
        <?php else: ?>
            <a href="signin" class="button-primary">Sign In</a>
        <?php endif; ?>
        <a href="logout" class="<?php echo ($pages == "logout") ? 'active' : 'button-primary'; ?>">Logout</a>
    </div>
</div>
