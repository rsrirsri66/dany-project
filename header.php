<header class=header data-page=home>
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="logo header_logo"><a class="d-inline-flex align-items-center" href=index.php><span
                    class=logo_picture><img src=svg/logoframe.png alt=DynamicStaccato> </span>
                    <!-- <span class=text><span
                        class=brand>DynamicStaccato</span> <span class=text_secondary>courses</span></span> -->
                    </a></div><button
            class=header_trigger type=button data-bs-toggle=collapse data-bs-target=#headerMenu
            aria-controls=headerMenu><span class=line></span> <span class=line></span> <span class=line></span></button>
        <nav class="header_nav collapse" id=headerMenu>
            <ul class=header_nav-list>

                <li class=header_nav-list_item>
                    <a class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'current' : '' ?>" href=index.php data-page=index>Home</a>
                </li>
                <li class=header_nav-list_item>
                    <a class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'current' : '' ?>" href=courses.php data-page=course>Our Courses</a>
                </li>
                <li class=header_nav-list_item>
                    <!-- <a class=nav-item href=about.php data-page=about>About Us</a> -->
                    <a class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'current' : '' ?>" href="about.php" data-page=about>About Us</a>
                </li>
                <li class=header_nav-list_item>
                    <a class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'pricing.php' ? 'current' : '' ?>" href=pricing.php data-page=pricing>Events</a>
                </li>

                <li class=header_nav-list_item>
                    <a class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'contacts.php' ? 'current' : '' ?>" href=contacts.php data-page=contacts>Contact
                        Us</a>
                </li>
            </ul>
            <ul class="promobar_socials d-flex align-items-center justify-content-center">
                <li class=promobar_socials-item><a class=link href=# target=_blank rel="noopener noreferrer"><i
                            class=icon-facebook></i></a></li>
                <li class=promobar_socials-item><a class=link href=# target=_blank rel="noopener noreferrer"><i
                            class=icon-twitter></i></a></li>
                <li class=promobar_socials-item><a class=link href="https://www.instagram.com/dynamicstaccato/?utm_source=qr&igsh=OHYxZW4weTI4bXJ4#" target=_blank rel="noopener noreferrer"><i
                            class=icon-instagram></i></a></li>
            </ul>
        </nav>
    </div>
</header>