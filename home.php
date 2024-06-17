<?php 
    session_start();
    include('avatar.php');
    include('config.php');
    include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<!------------------------------------------------------Header------------------------------------------->
<header>
<div class="grid">
        <div class="logo-container">
            <div class="logo-pic">
                <a href="home.php"><img src="ON.png"></a>
            </div>
        </div>
        <div class="profile-container">
            <div class="nav-side-profile">
                <div class="menu-button">
                    <button class="menubtn"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-baseline-density-medium"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h16" /><path d="M4 12h16" /><path d="M4 4h16" /></svg></button>
                    <div class="menu-content">
                        <a href="home.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>Home</a>
                        <a href="market_products.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-store"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" /><path d="M5 21l0 -10.15" /><path d="M19 21l0 -10.15" /><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>Market</a>
                    </div>
                </div>
                <div class="cart-side-profile">
                    <a href="cart.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z" /></svg></a>
                </div>
                <div class="notif-button">
                    <a href="#"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-bell"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" /><path d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z" /></svg></a>
                </div>
                <div class="users-admin-panel">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="admin_page.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></a>
                    <?php endif; 
                    ?>
                </div>

                <div class="profile-navigation">
                    <a href="profile.php">
                        <?php if (!empty($profile_pic) && $profile_pic !== 'default_profile.png'): ?>
                            <img src="upload_profile/<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture">
                        <?php else: ?>
                            <img src="upload_profile/default_profile.png" alt="Profile Picture">
                        <?php endif; ?>
                    </a>
                </div>

                <div class="dropdown">
                    <button class="dropbtn"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg></button>
                    <div class="dropdown-content">
                        <a href="/profile.php">About</a>
                        <a href="sell_form.php">Sell a Product</a>
                        <a href="#contact">Settings</a>
                        <a href="logout_function.php">Logout</a>
                    </div>
                </div>
            </div>           
        </div>
</div>
</header>
</head>
<!----------------------------------------------------Header-------------------------------------------------------->
<body>
<div class="content-homepage">
    <div class="contents">
        <div class="slider-frame">
            <div class="slide-images">
                <div class="image-container">
                    <img src="image/s32.png">
                </div>
                <div class="image-container">
                    <img src="image/s123.png">
                </div>
                <div class="image-container">
                    <img src="image/s22.png">
                </div>
            </div>
        </div>
        <div class="nav-link">
            <a href="market_products.php">Sports</a>
        </div>
    </div>

    <div class="contents">
        <div class="slider-frame">
            <div class="slide-images">
                <div class="image-container">
                    <img src="image/a1 (1).jpg">
                </div>
                <div class="image-container">
                    <img src="image/a2.jpg">
                </div>
                <div class="image-container">
                    <img src="image/a321.png">
                </div>
            </div>
        </div>
        <div class="nav-link">
            <a href="market_products.php">Appliances</a>
        </div>
    </div>

    <div class="contents">
        <div class="slider-frame">
            <div class="slide-images">
                <div class="image-container">
                    <img src="image/c11.png">
                </div>
                <div class="image-container">
                    <img src="image/c2.png">
                </div>
                <div class="image-container">
                    <img src="image/c3.png">
                </div>
            </div>
        </div>
        <div class="nav-link">
            <a href="market_products.php">Accesories</a>
        </div>
    </div>

    <div class="contents">
        <div class="slider-frame">
            <div class="slide-images">
                <div class="image-container">
                    <img src="image/o1 (1).jpg">
                </div>
                <div class="image-container">
                    <img src="image/o1 (2).jpg">
                </div>
                <div class="image-container">
                    <img src="image/o1 (3).jpg">
                </div>
            </div>
        </div>
        <div class="nav-link">
            <a href="market_products.php">Others</a>
        </div>
    </div>
</div>
</body>
<footer>
</footer>
</html>