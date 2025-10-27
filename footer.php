<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<footer class="footer" style="color:#222; font-family:'Poppins', sans-serif; padding:60px 0 25px 0; background-color:#f9f9f9;">
  <div class="container">
    <div class="row justify-content-between align-items-start">

      <!-- Logo & About -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="d-flex align-items-center mb-3">
          <img src="svg/logomusic.png" alt="DynamicStaccato" style="width:55px; height:auto; margin-right:12px;">
          <h4 style="font-family:'Bebas Neue', sans-serif; font-size:30px; letter-spacing:1px; margin:0; line-height:1;">
            <span style="color:#000;">Dynamic</span> <span style="color:#f7941d;">Staccato</span>
          </h4>
        </div>

        <p style="font-size:14px; line-height:1.8; color:#444; margin-bottom:15px;">
          At <strong>DynamicStaccato Musical Academy</strong>, we help you unlock your true potential in music — from Piano to Guitar, Drums, Violin, and Vocals.
        </p>

        <div class="d-flex align-items-center" style="gap:15px; margin-top:10px;">
          <a href="#" style="font-size:18px; color:#f7941d;"><i class="icon-facebook"></i></a>
          <a href="https://www.instagram.com/dynamicstaccato" target="_blank" style="font-size:18px; color:#f7941d;"><i class="icon-instagram"></i></a>
          <a href="#" style="font-size:18px; color:#f7941d;"><i class="icon-youtube"></i></a>
        </div>

        <div style="margin-top:15px; font-size:13px; line-height:1.8;">
          <a href="mailto:dynamicstaccato@gmail.com" style="color:#000; text-decoration:none; display:block;">
            <i class="icon-envelope"></i> dynamicstaccato@gmail.com
          </a>
          <a href="tel:+919876543210" style="color:#000; text-decoration:none;">
            <i class="icon-phone-solid"></i> +91-98765-43210
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-3 col-6 mb-4">
        <h5 style="font-family:'Bebas Neue', sans-serif; font-size:19px; text-transform:uppercase; letter-spacing:1px; color:#000; margin-bottom:15px;">Quick Links</h5>
        <ul style="list-style:none; padding:0; margin:0; font-size:14px; line-height:2;">
          <li><a href="about.php" style="color:#444; text-decoration:none;">About Us</a></li>
          <li><a href="courses.php" style="color:#444; text-decoration:none;">Courses</a></li>
          <li><a href="pricing.php" style="color:#444; text-decoration:none;">Events</a></li>
          <li><a href="contacts.php" style="color:#444; text-decoration:none;">Contact</a></li>
        </ul>
      </div>

      <!-- Popular Courses -->
      <div class="col-lg-2 col-md-3 col-6 mb-4">
        <h5 style="font-family:'Bebas Neue', sans-serif; font-size:19px; text-transform:uppercase; letter-spacing:1px; color:#000; margin-bottom:15px;">Courses</h5>
        <ul style="list-style:none; padding:0; margin:0; font-size:14px; line-height:2;">
          <li><a href="#" style="color:#444; text-decoration:none;">Piano</a></li>
          <li><a href="#" style="color:#444; text-decoration:none;">Guitar</a></li>
          <li><a href="#" style="color:#444; text-decoration:none;">Vocals</a></li>
        </ul>
      </div>

      <!-- Instagram -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 style="font-family:'Bebas Neue', sans-serif; font-size:19px; text-transform:uppercase; letter-spacing:1px; color:#000; margin-bottom:15px;">Instagram</h5>
        <div style="display:grid; grid-template-columns:repeat(2,80px); gap:12px;">
          <a href="https://www.instagram.com/dynamicstaccato" target="_blank"><img src="img/footer/dany.png" style="width:80px; height:80px; object-fit:cover; border-radius:8px;"></a>
          <a href="#"><img src="img/footer/dany1.png" style="width:80px; height:80px; object-fit:cover; border-radius:8px;"></a>
          <a href="#"><img src="img/footer/dany2.png" style="width:80px; height:80px; object-fit:cover; border-radius:8px;"></a>
          <a href="#"><img src="img/footer/dany3.png" style="width:80px; height:80px; object-fit:cover; border-radius:8px;"></a>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="row border-top mt-4 pt-3">
      <div class="col text-center">
        <p style="font-size:13px; color:#555; margin:0;">
          © <span id="currentYear"></span> DynamicStaccato Musical Academy | All Rights Reserved
        </p>
      </div>
    </div>
  </div>
</footer>

<script>
  document.getElementById("currentYear").textContent = new Date().getFullYear();
</script>
