<?php
    session_start();
    include('avatar.php');
    include('config.php');
    include('auth.php');
    include('header.php'); 
    @include 'add_purchase.php';

?>
<!---uwu---->
<div class="market-body">
<!---uwu---->

<div class="side-bar-store">
    <id class="title-nav-link"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-align-justified"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l12 0" /></svg>
        Dashboard
    </id>
    <div class="navigation-side-link">
        <a href="home.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>Home</a>
        <a href="/market_products.php"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-store"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" /><path d="M5 21l0 -10.15" /><path d="M19 21l0 -10.15" /><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>Market</a>
        <a href="/sell_form.php">Sell a Product</a>
        <a href="#"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>Videos</a>
        <a href="#"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-player-play"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 4v16l13 -8z" /></svg>Live</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a href="admin_page.php">Users</a>
        <?php endif; ?>
    </div>
</div>

<!------------------------------------------------Content-Store----------------------------->
<div class="market">
    <div class="store-body">
        <?php 

        $query = "SELECT * FROM product_sell";
        $result= mysqli_query($conn, $query);    

        while ($fetch_product = mysqli_fetch_assoc($result)) {
        ?>
        <div class="content-store-products">
            <div class="market-container">
                <div class="header-product">
                    <div class="image-product">
                        <img src="upload_storage/<?php echo $fetch_product['image']; ?>" alt="">
                    </div>
                    <div class="title-header">
                        <?php echo $fetch_product ['product']; ?>
                            <div class="letter">
                            <?php echo $fetch_product["description"]; ?>
                        </div>
                    </div>
                </div>
                <div class="footer-product">
                    <div class="price">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-peso"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 19v-14h3.5a4.5 4.5 0 1 1 0 9h-3.5" /><path d="M18 8h-12" /><path d="M18 11h-12" /></svg>
                    <id class="text-footer-price"><?php echo $fetch_product["price"]; ?></id>
                    </div>

                    <div class="map">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                    </svg>
                    <id class="map-location"><?php echo $fetch_product["location"]; ?></id>
                    </div>

                    <form method="post" class="cart" action="">
                        <input type="hidden" name="image" value="upload_storage/<?php echo htmlspecialchars($fetch_product['image']); ?>">
                        <input type="hidden" name="product" value="<?php echo htmlspecialchars($fetch_product['product']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($fetch_product['price']); ?>">
                        <input type="hidden" name="description" value="<?php echo htmlspecialchars($fetch_product['description']); ?>">
                        <input type="hidden" name="location" value="<?php echo htmlspecialchars($fetch_product['location']); ?>">
                        <button type="submit" name="add_to_cart"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12.5 17h-6.5v-14h-2" /><path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg></button>
                    </form>


                </div>
                    </div>
                </div>
                <?php }?>
                <?php $conn->close();?>
        </div>
    </div>
</div>
</html>