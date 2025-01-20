<header class="header">

    <a href="/index.php" class="logo"> <!--<i class="fas fa-hiking"></i>--> HikeHaven </a>

    <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="index.php">Home</a>
        <a href="blogs.php">Posts</a>
        <a href="shop.php">Shop</a>
        <a href="package.php">Packages</a>
        <?php if (isset($user)): ?>
            <p><a href="logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="login.php">Log in</a></p>
        <?php endif; ?>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="shop.php" class="fas fa-shopping-cart"></a>
        <div id="search-btn" class="fas fa-search"></div>
    </div>

</header>

<!-- Search form  -->

<div class="search-form">

<div id="close-search" class="fas fa-times"></div>

<form action="">
    <input type="search" name="" placeholder="Search here..." id="search-box">
    <label for="search-box" class="fas fa-search"></label>
</form>
</div>