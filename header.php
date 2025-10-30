<header style="background:#ffffff; padding:22px 60px 30px; border-bottom:6px solid #f6eedb; position:relative; z-index:1000;">
  <div style="max-width:1300px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; gap:30px;">

    <!-- Logo -->
    <div style="display:flex; align-items:center; gap:16px;">
      <a href="index.php" style="display:flex; align-items:center; text-decoration:none;">
        <img src="svg/frame.png" alt="DynamicStaccato" style="height:68px; width:auto; display:block;">
       
      </a>
    </div>

    <!-- Navigation -->
    <nav style="flex:0 0 auto;">
      <ul style="display:flex; align-items:center; gap:44px; list-style:none; margin:0; padding:0;">
        <li style="list-style:none; margin:0; padding:0;">
          <a href="index.php"
             style="position:relative; display:inline-block; text-decoration:none; font-family:'Arial', sans-serif; color:#2b3543; font-weight:500; font-size:17px; padding-bottom:8px;">
            Home
            <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? '<span style="position:absolute; left:50%; transform:translateX(-50%); bottom:-14px; height:6px; width:44px; border-radius:6px; background:#ff3366; box-shadow:0 1px 0 rgba(0,0,0,0.06);"></span>' : '' ?>
          </a>
        </li>

        <li style="list-style:none; margin:0; padding:0;">
          <a href="courses.php"
             style="position:relative; display:inline-block; text-decoration:none; font-family:\'Arial\', sans-serif; color:#2b3543; font-weight:500; font-size:17px; padding-bottom:8px;">
            Our Courses
            <?= (basename($_SERVER['PHP_SELF']) == 'courses.php') ? '<span style="position:absolute; left:50%; transform:translateX(-50%); bottom:-14px; height:6px; width:44px; border-radius:6px; background:#ff3366; box-shadow:0 1px 0 rgba(0,0,0,0.06);"></span>' : '' ?>
          </a>
        </li>

        <li style="list-style:none; margin:0; padding:0;">
          <a href="about.php"
             style="position:relative; display:inline-block; text-decoration:none; font-family:\'Arial\', sans-serif; color:#2b3543; font-weight:500; font-size:17px; padding-bottom:8px;">
            About Us
            <?= (basename($_SERVER['PHP_SELF']) == 'about.php') ? '<span style="position:absolute; left:50%; transform:translateX(-50%); bottom:-14px; height:6px; width:44px; border-radius:6px; background:#ff3366; box-shadow:0 1px 0 rgba(0,0,0,0.06);"></span>' : '' ?>
          </a>
        </li>

        <li style="list-style:none; margin:0; padding:0;">
          <a href="pricing.php"
             style="position:relative; display:inline-block; text-decoration:none; font-family:\'Arial\', sans-serif; color:#2b3543; font-weight:500; font-size:17px; padding-bottom:8px;">
            Events
            <?= (basename($_SERVER['PHP_SELF']) == 'pricing.php') ? '<span style="position:absolute; left:50%; transform:translateX(-50%); bottom:-14px; height:6px; width:44px; border-radius:6px; background:#ff3366; box-shadow:0 1px 0 rgba(0,0,0,0.06);"></span>' : '' ?>
          </a>
        </li>

        <li style="list-style:none; margin:0; padding:0;">
          <a href="contacts.php"
             style="position:relative; display:inline-block; text-decoration:none; font-family:\'Arial\', sans-serif; color:#2b3543; font-weight:500; font-size:17px; padding-bottom:8px;">
            Contact Us
            <?= (basename($_SERVER['PHP_SELF']) == 'contacts.php') ? '<span style="position:absolute; left:50%; transform:translateX(-50%); bottom:-14px; height:6px; width:44px; border-radius:6px; background:#ff3366; box-shadow:0 1px 0 rgba(0,0,0,0.06);"></span>' : '' ?>
          </a>
        </li>
      </ul>
    </nav>

  </div>
</header>
