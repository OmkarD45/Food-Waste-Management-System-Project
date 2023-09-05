<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-left">
            <span class="menu"><img src="images/menu.png" alt=""/></span>
                <ul class="nav1">
                    <li><a href="index.php">HOME</a></li>
                    <li><a class="active" href="about.php">ABOUT</a></li>
                    <li><a href="food-available.php"> AVAILABLE FOOD LIST</a></li>
                    
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="donor/login.php">DONOR</a></li>
                    <li><a href="admin/login.php">ADMIN</a></li>
                    
                </ul>
                <!-- script for menu -->
                    <script> 
                        $( "span.menu" ).click(function() {
                        $( "ul.nav1" ).slideToggle( 300, function() {
                         // Animation complete.
                        });
                        });
                    </script>
                <!-- //script for menu -->
        </div>
        <div class="header-right">
            <a href="index.php"><img src="images/logo.png" alt=""></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->