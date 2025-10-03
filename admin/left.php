
       <?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
      <div class="sidebar-wrapper">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/zenvic.png" alt="Logo" style="height:40px;">
        </div>
        <h4 class="logo-text">Zenview</h4>
        <div class="toggle-icon"><i class='bx bx-menu'></i></div>
    </div>
 
    <ul>
        <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>"><a href="index.php"><i class='bx bx-home'></i> Dashboard</a></li>
        
        <li class="<?= ($current_page == 'heading.php') ? 'active' : '' ?>"><a href="heading.php"><i class='bx bx-package'></i> Heading</a></li>
        <li class="<?= ($current_page == 'image.php') ? 'active' : '' ?>"><a href="image.php"><i class='bx bx-package'></i> Image</a></li>
        <li class="<?= ($current_page == 'video.php') ? 'active' : '' ?>"><a href="video.php"><i class='bx bx-package'></i> Video</a></li>
        
        
        
        
        <li class="<?= ($current_page == 'contact.php') ? 'active' : '' ?>"><a href="contact.php"><i class='bx bx-chart'></i> Contact</a></li>
        
    </ul>
</div>