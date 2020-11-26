                    <ul class="account-nav__list">
                        <li class="account-nav__item <?php echo findBaseName('dashboard') ?>"><a href="dashboard">Dashboard</a></li>
                        <li class="account-nav__item <?php echo findBaseName('account-profile') ?>"><a href="account-profile">Edit Profile</a></li>
                        <li class="account-nav__item <?php echo findBaseName('history') ?>"><a href="history">Withdrawal History</a></li>
                        <li class="account-nav__item <?php echo findBaseName('account-direct-purchases') ?>"><a href="account-direct-purchases <?php echo findBaseName('account-profile') ?>">My Direct Purchases </a></li>
                        <!-- <li class="account-nav__item <?php //echo findBaseName('account-subscription-plan') ?>"><a href="account-subscription-plan">My Subscriptions </a></li> -->
                        <li class="account-nav__item <?php echo findBaseName('account-shipping-address') ?>"><a href="account-shipping-address">My Shipping Addresses </a></li>
                        <li class="account-nav__item <?php echo findBaseName('account-payment-history') ?>"><a href="account-payment-history">Payment History </a></li>
                        <li class="account-nav__item <?php echo findBaseName('account-password') ?>"><a href="account-password">Change Password</a></li>
                        <li class="account-nav__divider" role="presentation"></li>
                        <li class="account-nav__item"><a href="logout">Logout</a></li>
                    </ul>