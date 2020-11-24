<header class="site__header">

<div class="header">

<div class="header__megamenu-area megamenu-area">
</div>

<div class="header__topbar-classic-bg">
</div>

<div class="header__topbar-classic">

<div class="topbar topbar--classic">

<div class="topbar__item-text"><a class="topbar__link" href="#email"><?php echo $dcomm_email; ?></a>
</div>

<div class="topbar__item-text"><a class="topbar__link" href="#phone"><?php echo $dcomm_phone; ?></a>
</div>



<div class="topbar__item-spring">
</div>
<?php 
    if(isset($_SESSION['logged'])){?> 
    <div class="topbar__item-button"><a href="dashboard" class="topbar__button"><span class="topbar__button-label">Dashboard </span> </a>  </div>
    <div class="topbar__item-button"><a href="logout" class="topbar__button"> <span class="topbar__button-label">Logout </span> </a> </div>
    <?php }else{ ?>
    <div class="topbar__item-button"><a href="signup" class="topbar__button"> <span class="topbar__button-label">Sign Up </span> </a> </div>
    <div class="topbar__item-button"><a href="login" class="topbar__button"><span class="topbar__button-label">Login</span> </a></div>
<?php	} ?>

</div>
</div>

<div class="header__navbar">

<div class="header__navbar-departments">

<div class="departments"><button class="departments__button" type="button">

<span class="departments__button-icon"><svg width="16px" height="12px">

<path d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z"/></svg> 
</span>

<span class="departments__button-title">Shop By Category
</span> 

<span class="departments__button-arrow"><svg width="9px" height="6px">

<path d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z"/></svg>
</span></button>

<div class="departments__menu">

<div class="departments__arrow">
</div>

<div class="departments__body">
	
<ul class="departments__list">
<li class="departments__list-padding" role="presentation"></li>

<?php 
	$sw =$conn->query("SELECT * FROM `categories` WHERE status='active' ORDER BY name "); 
	if($sw->num_rows>0){
		while($top=$sw->fetch_assoc()):
			$name=$conn->real_escape_string($top['name']);
	?>
	
	
    <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
		<a href="#" class="departments__item-link"><?php echo $name; ?>
		<?php 
			$jcats = mysqli_query($conn, "SELECT * FROM `sub_categories` where dcategory='$name' and status='active' order by name asc"); 
			if($jcats->num_rows>=1){ ?>
			<span class="departments__item-arrow">
				<svg width="7" height="11">
					<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9 C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
				</svg>
			</span>
			<?php } ?>
		</a>
		<?php if($jcats->num_rows>=1){ ?>
    <div class="departments__item-menu">

    <div class="megamenu departments__megamenu departments__megamenu--size--xl">

    

        <div class="row">

        <div class="col-1of5">
        <ul class="megamenu__links megamenu-links megamenu-links--root">
			<!-- <li class="megamenu-links__item megamenu-links__item--has-submenu">
				<a class="megamenu-links__item-link" href="#">Body Parts</a>
			</li> -->
			<?php while($jcrow = $jcats->fetch_assoc()) { ?>
				<!-- <li class="megamenu-links__item megamenu-links__item--has-submenu">
					<a class="megamenu-links__item-link" href="#">Body Parts</a>
					<ul class="megamenu-links">
						<li class="megamenu-links__item"><a class="megamenu-links__item-link" href="#">Bumpers</a></li>
					</ul>
				</li> -->

		<li class="megamenu-links__item"><a class="megamenu-links__item-link"  href="shop-list?dcat=<?php echo $name; ?>&subcat=<?php echo $jcrow['name']; ?>"><?php echo $jcrow['name']; ?></a></li>
		<?php }  ?>
		
        </ul>
        </div>


        </div>
    </div>
	</div>
	
	<?php	} ?>

    </li>



<!-- <li class="departments__item"><a href="#" class="departments__item-link"></a></li> -->
		<?php endwhile; }  ?>
<li class="departments__list-padding" role="presentation"></li>
</ul>

<div class="departments__menu-container">
</div>
</div>
</div>
</div>
</div>

<div class="header__navbar-menu">

<div class="main-menu">
<ul class="main-menu__list">
    <li class="main-menu__item"><a href="home" class="main-menu__link" >Home</a></li>
    <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
            <a href="shop-list" class="main-menu__link" >Shop <svg
                width="7px" height="5px">
                <path
                    d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                </svg>
            </a>
            
            <div class="main-menu__submenu">
                <ul class="menu">											
                    <li class="menu__item"><a class="menu__link" href="shop-list">Shop List</a></li>                                                
                    <li class="menu__item"><a class="menu__link" href="compare">Compare</a></li> 
                </ul>
            </div>
    </li>
    
    <li class="main-menu__item"><a href="about-us" class="main-menu__link" >About Us</a></li>
    <li class="main-menu__item"><a href="contact-us" class="main-menu__link" >Help</a></li>
    <li class="main-menu__item"><a href="track-order" class="main-menu__link" >Track order</a></li>
    <li class="main-menu__item"><a href="new-store" class="main-menu__link" >Create Store</a></li>
</ul>
</div>
</div>

<div class="header__navbar-phone phone"><a href="#" class="phone__body">

<div class="phone__title">Call Us:
</div>

<div class="phone__number"><?php echo $dcomm_phone; ?>
</div></a>
</div>
</div>

<div class="header__logo"><a href="home" class="logo">

<div class="logo__slogan">
</div>

<div class="logo__image">
<!-- logo --> <svg width="168" height="26">

<path class="logo__part-primary" d="M50,26h-5c-1.1,0-2-0.9-2-2V2c0-1.1,0.9-2,2-2h5c6.6,0,12,5.4,12,12v2C62,20.6,56.6,26,50,26z M57,12
	c0-3.9-3.1-7-7-7h-0.8C48.5,5,48,5.5,48,6.2v13.6c0,0.7,0.5,1.2,1.2,1.2H50c3.9,0,7-3.1,7-7V12z M38.5,26h-13h-2
	c-0.8,0-1.5-0.7-1.5-1.5v-2v-9v-2v-8v-2C22,0.7,22.7,0,23.5,0h2h13C39.3,0,40,0.7,40,1.5v2C40,4.3,39.3,5,38.5,5H27v5h9.5
	c0.8,0,1.5,0.7,1.5,1.5v2c0,0.8-0.7,1.5-1.5,1.5H27v6h11.5c0.8,0,1.5,0.7,1.5,1.5v2C40,25.3,39.3,26,38.5,26z M18.8,23.8
	c0.6,1-0.1,2.3-1.3,2.3h-2.3c-0.5,0-1-0.3-1.3-0.8L9.7,18H5v6.5C5,25.3,4.3,26,3.5,26h-2C0.7,26,0,25.3,0,24.5v-23
	C0,0.7,0.7,0,1.5,0H10c5,0,9,4,9,9c0,3.2-1.7,6.1-4.3,7.7L18.8,23.8z M10,5H6C5.5,5,5,5.4,5,6v6c0,0.6,0.4,1,1,1h4c2.2,0,4-1.8,4-4
	S12.2,5,10,5z"></path>

<path class="logo__part-secondary" d="M166.5,8h-2.3c-0.6,0-1.1-0.4-1.4-1c-0.5-1.2-2-2-3.8-2c-2.2,0-4,1.3-4,3c0,0.9,0.6,1.8,1.5,2.3
	c0.2,0.1,0.5,0.3,0.7,0.4c0.9,0.3,1.2,1.3,0.7,2.1l-1,1.7c-0.4,0.7-1.2,0.9-1.9,0.6c-1.2-0.5-2.3-1.3-3.1-2.2c-1.2-1.4-2-3.1-2-5
	c0-4.4,4-8,9-8c4.3,0,8,2.6,8.9,6.2C168.2,7.1,167.4,8,166.5,8z M151.5,18h2.3c0.6,0,1.1,0.4,1.4,1c0.5,1.2,2,2,3.8,2
	c2.2,0,4-1.3,4-3c0-0.9-0.6-1.8-1.5-2.3c-0.2-0.1-0.5-0.3-0.7-0.4c-0.9-0.3-1.2-1.3-0.7-2.1l1-1.7c0.4-0.6,1.2-0.9,1.9-0.6
	c1.2,0.5,2.3,1.3,3.1,2.2c1.2,1.4,2,3.1,2,5c0,4.4-4,8-9,8c-4.3,0-8-2.6-8.9-6.2C149.8,18.9,150.6,18,151.5,18z M146.5,5H140v19.5
	c0,0.8-0.7,1.5-1.5,1.5h-2c-0.8,0-1.5-0.7-1.5-1.5V5h-6.5c-0.8,0-1.5-0.7-1.5-1.5v-2c0-0.8,0.7-1.5,1.5-1.5h18
	c0.8,0,1.5,0.7,1.5,1.5v2C148,4.3,147.3,5,146.5,5z M125.8,23.8c0.6,1-0.2,2.3-1.3,2.3h-2.3c-0.5,0-1-0.3-1.3-0.8l-4.2-7.3H112v6.5
	c0,0.8-0.7,1.5-1.5,1.5h-2c-0.8,0-1.5-0.7-1.5-1.5v-23c0-0.8,0.7-1.5,1.5-1.5h8.5c5,0,9,4,9,9c0,3.2-1.7,6.1-4.3,7.7L125.8,23.8z
	 M117,5h-4c-0.5,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h4c2.2,0,4-1.8,4-4S119.2,5,117,5z M103.8,26h-2.3c-0.7,0-1.4-0.4-1.6-1.1l-2.4-6.7
	c0-0.1-0.1-0.1-0.2-0.1h-7.5c-0.1,0-0.2,0.1-0.2,0.1l-2.4,6.7c-0.2,0.7-0.9,1.1-1.6,1.1h-2.3c-0.8,0-1.4-0.8-1.1-1.6l8.3-23.3
	C90.7,0.4,91.3,0,92,0H95c0.7,0,1.4,0.4,1.6,1.1l8.3,23.3C105.2,25.2,104.6,26,103.8,26z M95.5,12.7l-1.8-4.9
	c-0.1-0.2-0.3-0.2-0.4,0l-1.8,4.9c0,0.1,0.1,0.3,0.2,0.3h3.5C95.4,13,95.5,12.9,95.5,12.7z M83.9,10.2c0,0.2-0.1,0.4-0.1,0.6
	c0,0.2-0.1,0.4-0.1,0.6c-0.1,0.5-0.3,1.1-0.6,1.6c-0.1,0.1-0.1,0.3-0.2,0.4c-0.1,0.1-0.1,0.2-0.2,0.4c-0.2,0.4-0.5,0.7-0.8,1.1
	c-0.1,0.1-0.2,0.2-0.3,0.3c-0.1,0.1-0.2,0.2-0.3,0.3c-0.5,0.5-1.1,0.9-1.7,1.3c-1.4,0.8-3,1.3-4.7,1.3h-5v6.5c0,0.8-0.7,1.5-1.5,1.5
	h-2c-0.8,0-1.5-0.7-1.5-1.5v-23C65,0.7,65.7,0,66.5,0H75c1.7,0,3.3,0.5,4.7,1.3c0.6,0.4,1.2,0.8,1.7,1.3c0.1,0.1,0.2,0.2,0.3,0.3
	c0.1,0.1,0.2,0.2,0.3,0.3c0.3,0.3,0.5,0.7,0.8,1.1c0.1,0.1,0.1,0.2,0.2,0.3C83,4.8,83.1,5,83.1,5.1c0.2,0.5,0.4,1,0.6,1.6
	c0,0.2,0.1,0.4,0.1,0.6c0,0.2,0.1,0.4,0.1,0.6C83.9,8,84,8.2,84,8.4c0,0.2,0,0.4,0,0.6s0,0.4,0,0.6C84,9.8,83.9,10,83.9,10.2z M75,5
	h-4c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h4c2.2,0,4-1.8,4-4S77.2,5,75,5z"></path></svg>
<!-- logo / end -->
</div></a>
</div>

<div class="header__search">

<div class="search" style="margin-left: 150px;">

<form action="shop-list" class="search__body">

<div class="search__shadow">
</div>
<input class="search__input" type="text" id="searchBase" autocomplete="off" name="search" value="<?php if(isset($_GET['search']))echo $_GET['search']; ?>" placeholder="Enter Keyword "> 
<button class="search__button search__button--end" type="submit">

<span class="search__button-icon"><svg width="20" height="20">

<path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/></svg>
</span></button>

<div class="search__box"></div>

<div class="search__decor">
<div class="search__decor-start"></div>
<div class="search__decor-end"></div>
</div>

<div class="search__dropdown search__dropdown--suggestions suggestions">

<div class="suggestions__group">

<div class="suggestions__group-title">Products</div>




<div class="suggestions__group-content">

    <!-- <a class="suggestions__item suggestions__product" href="#">
        <div class="suggestions__product-info">
            <div class="suggestions__product-name">Brandix Brake Kit BDX-750Z370-S</div>
        </div>
	</a>	 -->
	
</div>




</div>

</div>


</form>
</div>
</div>

<div class="header__indicators">

<?php 
						
        if(isset($_SESSION['logged'])){
            $id = $conn->real_escape_string($_SESSION["userid"]);
            $sl = $conn->query("SELECT * FROM login WHERE userid='$id'")->fetch_assoc();
            ?>
        <div class="indicator indicator--trigger--click"><a href="#account-login"
                class="indicator__button"><span class="indicator__icon"><svg width="32" height="32">
                        <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7	C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" /></svg>
                </span><span class="indicator__title">Hello, <?php echo $sl['dname']; ?></span> <span class="indicator__value">My
                    Account</span></a>
            <div class="indicator__content">
                <div class="account-menu">
                    
                    <div class="account-menu__divider"></div>
                    <ul class="account-menu__links">
                        <li><a href="dashboard">Dashboard</a></li>									
                        <li><a href="wishlist">Wishlist</a></li>
                        <li><a href="account-profile">Edit Profile</a></li>
                        <li><a href="account-password">Change Password</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php }else{?>


        <div class="indicator indicator--trigger--click"><a href="#account-login" class="indicator__button">

        <span class="indicator__icon"><svg width="32" height="32">

        <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
            C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"/></svg> 
        </span>

        <span class="indicator__title">Hello, Log In
        </span> 

        <span class="indicator__value">My Account
        </span></a>

        <div class="indicator__content">

        <div class="account-menu">

            <form class="account-menu__form" method="post" action="login-process">

            <div class="account-menu__form-title">Log In to Your Account
            </div>

            <div class="form-group">
            <label for="header-signin-email" class="sr-only">Email address
            </label> 
            <input id="header-signin-email" type="email" name="email" required class="form-control form-control-sm" placeholder="Email address">
            </div>

            <div class="form-group">
            <label for="header-signin-password" class="sr-only">Password
            </label>

            <div class="account-menu__form-forgot">
            <input id="header-signin-password" type="password"  name="pass" required class="form-control form-control-sm" placeholder="Password"> 
            <a href="forgot" class="account-menu__form-forgot-link">Forgot?</a>
            </div>
            </div>

            <div class="form-group account-menu__form-button"><button type="submit" name="log"  class="btn btn-primary btn-sm">Login</button>
            </div>

            <div class="account-menu__form-link"><a href="signup">Create An Account</a>
            </div>
            </form>

        <div class="account-menu__divider"></div>

        </div>
        </div>
        </div>

                <?php } ?>




    <div class="indicator indicator--trigger--click">
        <a href="cart" class="indicator__button">
            <span class="indicator__icon">
                <svg width="32" height="32">
                    <circle cx="10.5" cy="27.5" r="2.5" />
                    <circle cx="23.5" cy="27.5" r="2.5" />
                    <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
                </svg> 
            <span class="indicator__counter ball">0</span> </span><span
                class="indicator__title">Shopping Cart</span> <span
                class="indicator__value" id="total">&#8358;0.00</span></a>
        <div class="indicator__content">
            <div class="dropcart">
                <ul class="dropcart__list" id="sub">
                    
                    <li class="dropcart__divider" role="presentation"></li>
                    
                </ul>
                <div class="dropcart__actions" id="outl">
                </div>
            </div>
        </div>
    </div>





</div>
</div></header>