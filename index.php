<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>Home | DynamicStaccato Institute</title>

    <!-- Styles -->
    <link rel="stylesheet preload" as=style href="css/preload.min.css">
    <link rel="stylesheet preload" as=style href="css/icomoon.css">
    <link rel="stylesheet preload" as=style href="css/libs.min.css">
    <link rel="stylesheet" href="css/index.min.css">
    <link rel="stylesheet" href="css/floatbutton.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="underlay"></div>

        <!-- Hero Section -->
        <section class="hero" style="background: url('img/musbg.jpg') no-repeat center center / cover; 
           background-color: rgba(0,0,0,0.63); 
           background-blend-mode: overlay; 
           min-height: 100vh; 
           display: flex; 
           align-items: center;">
            <div class="container d-lg-flex align-items-center">
                <div class="hero_content">
                    <h1 class="hero_content-header" data-aos="fade-up" style="color: white;">Master the Art of Music
                        with DynamicStaccato</h1>
                    <div class="hero_content-rating d-flex flex-column flex-sm-row align-items-center">
                        <p class="text" data-aos="fade-left">Our music programs are rated excellent by 5,000+ students
                            worldwide</p>
                        <div class="wrapper" data-aos="fade-left" data-aos-delay="50">
                            <ul class="rating d-flex align-items-center">
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                            </ul>
                        </div>
                    </div>
                    <p class="hero_content-text" data-aos="fade-up" data-aos-delay="50" style="color: white;">
                        Join DynamicStaccato Institute to explore Piano, Guitar, Drums, Violin, and Vocal training —
                        from beginner to advanced, all taught by world-class musicians.
                    </p>
                    <div class="hero_content-action d-flex flex-wrap">
                        <a class="btn btn--gradient" href="courses.php" data-aos="fade-left"><span class="text">Explore
                                Courses</span></a>
                        <a class="btn btn--highlight" href="pricing.php" data-aos="fade-left" data-aos-delay="50"><span
                                class="text">See Events</span></a>
                    </div>
                </div>
                <div class="hero_media col-lg-6">
                    <lottie-player src="lottie/music.json" background="transparent" speed="1"
                        style="width: 100%; height: 100%" loop autoplay></lottie-player>
                </div>
            </div>
        </section>

        <!-- Features -->
        <div class="features">
            <div class="container">
                <ul class="features_list d-md-flex flex-wrap">
                    <li class="features_list-item col-md-4" data-aos="fade-up">
                        <div class="card">
                            <div class="content">
                                <div class="card_media"><i class="icon-user-graduate-solid icon"></i></div>
                                <div class="card_main">
                                    <h5 class="card_main-title">Internationally Recognized Certificates</h5>
                                    <p class="card_main-text">Earn certificates that showcase your musical journey and
                                        open doors to opportunities worldwide.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="features_list-item col-md-4" data-aos="fade-up" data-aos-delay="50">
                        <div class="card">
                            <div class="content">
                                <div class="card_media"><i class="icon-globe-solid icon"></i></div>
                                <div class="card_main">
                                    <h5 class="card_main-title">Global Reach</h5>
                                    <p class="card_main-text">DynamicStaccato connects students from across the globe,
                                        offering online live classes and recordings.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="features_list-item col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="content">
                                <div class="card_media"><i class="icon-headset-solid icon"></i></div>
                                <div class="card_main">
                                    <h5 class="card_main-title">Live Music Sessions</h5>
                                    <p class="card_main-text">Participate in live jamming, practice sessions, and
                                        interactive online workshops with mentors.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- About -->
        <section class="about">
            <div class="container">
                <div class="about_main">
                    <div class="content">
                        <h2 class="about_main-header" data-aos="fade-in">Why Choose DynamicStaccato?</h2>
                        <ul class="about_main-list">
                            <li class="about_main-list_item" data-aos="fade-up">
                                <i class="icon-check icon"></i>
                                <div class="content">
                                    <h5 class="title">Personalized Training with Expert Musicians</h5>
                                    <p class="text">Learn directly from trained professionals who perform and teach
                                        worldwide.</p>
                                </div>
                            </li>
                            <li class="about_main-list_item" data-aos="fade-up" data-aos-delay="50">
                                <i class="icon-check icon"></i>
                                <div class="content">
                                    <h5 class="title">Access to Sheet Music & Video Tutorials</h5>
                                    <p class="text">Practice anytime with curated resources that supplement live
                                        classes.</p>
                                </div>
                            </li>
                            <li class="about_main-list_item" data-aos="fade-up" data-aos-delay="100">
                                <i class="icon-check icon"></i>
                                <div class="content">
                                    <h5 class="title">Perform & Get Certified</h5>
                                    <p class="text">After completing your course, perform in recitals and earn a
                                        certificate from DynamicStaccato.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="about_review" data-aos="zoom-in">
                    <div class="about_review-wrapper">
                        <div class="media">
                            <picture>
                                <source data-srcset="img/reviews/music-student.webp"
                                    srcset="img/reviews/music-student.webp">
                                <img class="lazy" data-src="img/reviews/music-student.jpg"
                                    src="img/reviews/music-student.jpg" alt="Student Review">
                            </picture>
                        </div>
                        <div class="main">
                            <h5 class="main_name">Arjun Rao</h5>
                            <ul class="rating d-flex align-items-center">
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                                <li class="rating_star"><i class="icon-star icon"></i></li>
                            </ul>
                            <q class="main_review quote">“DynamicStaccato transformed my passion into profession. From
                                guitar basics to advanced performance, their mentors are simply the best!”</q>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Courses -->
        <section class="popular">
            <div class="container">
                <div class="popular_header">
                    <h2 class="popular_header-title" data-aos="fade-up">Popular Music Courses</h2>
                    <p class="popular_header-text" data-aos="fade-down">Choose your instrument, practice consistently,
                        and become stage-ready with us.</p>
                </div>
                <ul class="popular_list d-md-flex flex-wrap">
                    <!-- Piano -->
                    <li class="popular_list-card course-card col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="course-card_wrapper">
                            <div class="top d-flex align-items-start">
                                <span class="top_icon top_icon--blue"><i class="icon-music icon"></i></span>
                                <div class="wrapper d-flex flex-column">
                                    <h5 class="top_title">Piano for Beginners</h5>
                                    <span class="top_author">by DynamicStaccato Faculty</span>
                                    <span class="top_details">30 lectures (120 Hours)</span>
                                </div>
                            </div>
                            <!-- Removed Pricing -->
                            <div class="bottom">
                                <a class="bottom_btn btn btn--bordered btn--arrow" href="courses.php">
                                    View Course <i class="icon-arrow-right-solid icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- Guitar -->
                    <li class="popular_list-card course-card col-12 col-md-6 col-lg-4" data-aos="fade-up"
                        data-aos-delay="50">
                        <div class="course-card_wrapper">
                            <div class="top d-flex align-items-start">
                                <span class="top_icon top_icon--orange"><i class="icon-music icon"></i></span>
                                <div class="wrapper d-flex flex-column">
                                    <h5 class="top_title">Acoustic & Electric Guitar</h5>
                                    <span class="top_author">by DynamicStaccato Faculty</span>
                                    <span class="top_details">36 lectures (150 Hours)</span>
                                </div>
                            </div>
                            <!-- Removed Pricing -->
                            <div class="bottom">
                                <a class="bottom_btn btn btn--bordered btn--arrow" href="courses.php">
                                    View Course <i class="icon-arrow-right-solid icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- Vocals -->
                    <li class="popular_list-card course-card col-12 col-md-6 col-lg-4" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="course-card_wrapper">
                            <div class="top d-flex align-items-start">
                                <span class="top_icon top_icon--sky"><i class="icon-microphone icon"></i></span>
                                <div class="wrapper d-flex flex-column">
                                    <h5 class="top_title">Indian & Western Vocals</h5>
                                    <span class="top_author">by DynamicStaccato Faculty</span>
                                    <span class="top_details">40 lectures (180 Hours)</span>
                                </div>
                            </div>
                            <!-- Removed Pricing -->
                            <div class="bottom">
                                <a class="bottom_btn btn btn--bordered btn--arrow" href="courses.php">
                                    View Course <i class="icon-arrow-right-solid icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="popular_btn btn btn--gradient" href="courses.php"><span class="text">Explore All
                        Courses</span></a>
            </div>
        </section>

        <!-- Banner -->
        <div class="banner">
            <div class="underlay"></div>
            <div class="container d-lg-flex align-items-center">
                <div class="banner_content">
                    <h4 class="banner_content-title" data-aos="fade-up">Unlimited access to musical resources, live
                        sessions & recorded lectures for subscribers</h4>
                    <div class="wrapper" data-aos="fade-up" data-aos-delay="50">
                        <a class="banner_content-btn btn btn--yellow" href="contacts.php">Register Now</a>
                    </div>
                </div>
                <div class="banner_media">
                    <picture>
                        <source data-srcset="img/banners/music.webp" srcset="img/banners/music.webp">
                        <img class="lazy" data-src="img/banners/music.jpg" src="img/banners/music.jpg"
                            alt="Music Banner">
                    </picture>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <!-- Contact Form Popup -->

    <div id="contactPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" id="closePopup">&times;</span>
            <section class="contacts_form">
                <div class="container">
                    <div class="contacts_form-header">
                        <h2 class="contacts_form-header_title">Get in Touch with DynamicStaccato Musical Academy</h2>
                        <p class="contacts_form-header_text text">
                            Have questions about our music courses, admission process, or choosing the right instrument
                            for you?
                            Fill out the form below – our experts will guide you in starting your musical journey with
                            us.
                        </p>
                    </div>
                    <form class="contacts_form-form" id="contact_form" novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="field" name="name" placeholder="Your Name" required>
                                <span class="error-msg">Please enter your name</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="field" name="email" placeholder="Your Email" required>
                                <span class="error-msg">Please enter a valid email</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" class="field" name="mobile" placeholder="Phone Number" required>
                                <span class="error-msg">Please enter your phone number</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="field" name="inrest"
                                    placeholder="Interested Course (e.g., Piano, Guitar)" required>
                                <span class="error-msg">Please enter your interested course</span>
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <textarea class="field" name="message"
                                placeholder="Your message here (e.g., I want to join violin classes)"
                                required></textarea>
                            <span class="error-msg">Please enter your message</span>
                        </div>

                        <button class="btn btn--gradient" type="submit">
                            <span class="text">Send a Message</span>
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="js/common.min.js"></script>
    <script src="js/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
    // Show popup after 2 seconds on page load
    window.addEventListener("load", function() {
        setTimeout(() => {
            document.getElementById("contactPopup").style.display = "flex";
        }, 2000);
    });

    // Close popup when clicking (X)
    document.getElementById("closePopup").addEventListener("click", function() {
        document.getElementById("contactPopup").style.display = "none";
    });

    // Close popup if user clicks outside
    window.addEventListener("click", function(e) {
        const popup = document.getElementById("contactPopup");
        if (e.target === popup) popup.style.display = "none";
    });

    // Form validation
    // document.getElementById("contact_form").addEventListener("submit", function(e) {
    //     e.preventDefault();
    //     let valid = true;


    //     document.querySelectorAll(".error-message").forEach(el => el.innerText = "");

    //     const name = document.querySelector('[name="name"]').value.trim();
    //     const email = document.querySelector('[name="email"]').value.trim();
    //     const mobile = document.querySelector('[name="mobile"]').value.trim();
    //     const subject = document.querySelector('[name="inrest"]').value.trim();
    //     const message = document.querySelector('[name="message"]').value.trim();

    //     if (!name) {
    //         document.getElementById("errorName").innerText = "Name is required";
    //         valid = false;
    //     }
    //     if (!email) {
    //         document.getElementById("errorEmail").innerText = "Email is required";
    //         valid = false;
    //     } else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
    //         document.getElementById("errorEmail").innerText = "Invalid email format";
    //         valid = false;
    //     }
    //     if (!mobile) {
    //         document.getElementById("errorMobile").innerText = "Phone number is required";
    //         valid = false;
    //     } else if (!/^[0-9]{10}$/.test(mobile)) {
    //         document.getElementById("errorMobile").innerText = "Enter a valid 10-digit phone number";
    //         valid = false;
    //     }
    //     if (!subject) {
    //         document.getElementById("errorCourse").innerText = "Please mention your interested course";
    //         valid = false;
    //     }
    //     if (!message) {
    //         document.getElementById("errorMessage").innerText = "Message cannot be empty";
    //         valid = false;
    //     }

    //     if (valid) {
    //         alert("Thank you! Your message has been sent successfully.");
    //         this.reset();
    //         document.getElementById("contactPopup").style.display = "none";
    //     }
    // });
    </script>
    <script>
    $(document).ready(function() {
        $('#contact_form').on('submit', function(e) {
            e.preventDefault();

            // Form data
            var formData = new FormData(this);

            $.ajax({
                url: 'admin/action/contact/insert_contact',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.btn--gradient').prop('disabled', true).text('Processing...');
                },
                success: function(response) {
                    $('.btn--gradient').prop('disabled', false).text('SEND A MESSAGE');
                    var data = JSON.parse(response);

                    if (data.status === 'success') {
                        // Show SweetAlert based on the response
                        if (data.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'success',
                                text: response.message,
                                timer: 2000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }

                        // $('#contact_form')[0].reset();
                        document.getElementById("contact_form").reset();
                        // $('#addFoodForm').removeClass('was-validated');

                    } else {
                        alert('Error: ' + data.message);
                    }
                },
                error: function() {
                    alert('Unexpected error occurred.');
                    $('.btn--gradient').prop('disabled', false).text('SEND A MESSAGE');
                }
            });
        });
    });
    </script>
</body>

</html>