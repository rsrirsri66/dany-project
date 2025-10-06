<?php
include "admin/db/dbConnection.php";

// Fetch all events
$events = [];
$event_query = "SELECT `id`,`heading` FROM heading";
$event_result = mysqli_query($conn, $event_query);

while ($row = mysqli_fetch_assoc($event_result)) {
    $events[$row['id']] = [
        'id' => $row['id'],
        'name' => $row['heading'],
        'images' => []
    ];
}

// Fetch all images and group under event_id
$image_query = "SELECT `heading` as heading_id, `image` FROM `images` WHERE image_status ='Active'";
$image_result = mysqli_query($conn, $image_query);

while ($row = mysqli_fetch_assoc($image_result)) {
    $events[$row['heading_id']]['images'][] = $row['image'];
}


// Fetch all events
$video_events = [];
$video_event_query = "SELECT `id`, `heading` FROM `heading` WHERE status='Active';";
$video_event_result = mysqli_query($conn, $video_event_query);

while ($video_row = mysqli_fetch_assoc($video_event_result)) {
    $video_events[$video_row['id']] = [
        'id' => $video_row['id'],
        'name' => $video_row['heading'],
        'videos' => []
    ];
}

// Fetch all videos grouped by event
$video_query = "SELECT `id`, heading as heading_id, `video` FROM `video` WHERE video_status='Active'";
$video_result = mysqli_query($conn, $video_query);

while ($video_row = mysqli_fetch_assoc($video_result)) {
    $video_events[$video_row['heading_id']]['videos'][] = $video_row['video'];
}
?>


<!DOCTYPE html>
<html lang=en>
<!-- Mirrored from html.merku.love/DynamicStaccato/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 09:09:37 GMT -->

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>Prices | DynamicStaccato</title>
    <script id=www-widgetapi-script src=../../s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js async="">
    </script>
    <script src=https://www.youtube.com/player_api></script>
    <link rel="stylesheet preload" as=style href=css/preload.min.css>
    <link rel="stylesheet preload" as=style href=css/icomoon.css>
    <link rel="stylesheet preload" as=style href=css/libs.min.css>
    <link rel=stylesheet href=css/pricing.min.css>
    
    <style>
    /* Media Popup Styles */
    .media-popup {
        display: none;
        position: fixed;
        z-index: 99999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background: rgba(0, 0, 0, 0.85);
        justify-content: center;
        align-items: center;
    }

    .media-popup-content {
        max-width: 90%;
        max-height: 80%;
    }

    .media-popup-content img,
    .media-popup-content video {
        width: 100%;
        height: auto;
        border-radius: 6px;
    }

    .media-popup-close {
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 32px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        z-index: 99999;
    }

    .media-popup-close:hover {
        color: red;
    }

    /* Card wrapper styling */
    /* Card wrapper styling */
    .pricing_list-card {
        width: 100%;
        max-width: 350px;
        /* Consistent card width */
        margin: 0 auto;
    }

    .card-wrapper {
        border: 1px solid #ddd;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-wrapper:hover {
        transform: translateY(-5px);
    }

    /* Common media styling for both video and image */
    .card-wrapper video,
    .card-wrapper img {
        width: 100%;
        height: 220px;
        /* Fixed height for all */
        object-fit: cover;
        /* Crop nicely */
        border-radius: 0;
    }
    </style>
</head>

<body>
    <?php include 'header.php' ; ?>
    <main>
        <div class=underlay></div>
        <section class="hero" style="background: url('img/eventmusic.jpg') no-repeat center center / cover; 
           
           min-height: 100vh; 
           display: flex; 
           align-items: center;">
            <div class="container d-lg-flex flex-row-reverse align-items-center">
                <div class="hero_main col-lg-6">
                    <h1 class="hero_main-title" data-aos="fade-left">Experience DynamicStaccato Musical Events</h1>
                    <p class="hero_main-text" data-aos="fade-left" data-aos-delay="50" style="color: black">
                        Join us at DynamicStaccato Musical Academy for unforgettable live performances, student
                        recitals, cultural fests, and grand concerts.
                        Our events showcase the incredible talents of budding musicians and celebrated artists, creating
                        a magical blend of classical, contemporary, and fusion music.
                        Be part of our journey where passion meets performance and every event becomes a melody to
                        remember.
                    </p>
                </div>
            </div>

            <div class=hero_media>
                <lottie-player src=lottie/scene.json background=404.html speed=1 style="width: 100%; height: 100%" loop
                    autoplay></lottie-player>
            </div>
            </div>
        </section>
        <section class="pricing">
            <div class="container">
                <div class="pricing_header">
                    <h2 class="pricing_header-title">Our Events Photos</h2>
                </div>

                <!-- Tabs -->
                <ul class="pricing_nav d-flex align-items-center justify-content-center nav nav-tabs" role="tablist">
                    <?php 
            $first = true;
            foreach ($events as $event) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $first ? 'active' : '' ?>" id="tab-<?= $event['id'] ?>"
                            data-bs-toggle="tab" data-bs-target="#photos-<?= $event['id'] ?>" type="button" role="tab"
                            aria-controls="photos-<?= $event['id'] ?>" aria-selected="<?= $first ? 'true' : 'false' ?>">
                            <span class="nav-link_text"><?= htmlspecialchars($event['name']) ?></span>
                        </button>
                    </li>
                    <?php $first = false; } ?>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <?php 
            $first = true;
            foreach ($events as $event) { ?>
                    <div class="tab-pane fade <?= $first ? 'show active' : '' ?>" id="photos-<?= $event['id'] ?>"
                        role="tabpanel" aria-labelledby="tab-<?= $event['id'] ?>">
                        <ul class="pricing_list d-md-flex flex-wrap">
                            <?php foreach ($event['images'] as $img) { ?>
                            <li class="pricing_list-card col-md-6 col-lg-4 mb-4">
                                <div class="card-wrapper">
                                    <div class="top top--basic">
                                        <h5 class="top_title"><?= htmlspecialchars($event['name']) ?> Celebration</h5>
                                    </div>
                                    <div class="main">
                                        <img src="admin/<?= $img ?>" class="img-fluid rounded w-100"
                                            alt="<?= $event['name'] ?> Image">
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php $first = false; } ?>
                </div>
            </div>
        </section>


        <!-- Second Section (Videos) -->
        <section class="pricing">
            <div class="container">
                <div class="pricing_header">
                    <h2 class="pricing_header-title">Our Events Videos</h2>
                </div>

                <!-- Tabs -->
                <ul class="pricing_nav d-flex align-items-center justify-content-center nav nav-tabs" role="tablist">
                    <?php 
            $first = true;
            foreach ($events as $event) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $first ? 'active' : '' ?>" id="tab-video-<?= $event['id'] ?>"
                            data-bs-toggle="tab" data-bs-target="#videos-<?= $event['id'] ?>" type="button" role="tab"
                            aria-controls="videos-<?= $event['id'] ?>" aria-selected="<?= $first ? 'true' : 'false' ?>">
                            <span class="nav-link_text"><?= htmlspecialchars($event['name']) ?></span>
                        </button>
                    </li>
                    <?php $first = false; } ?>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <?php 
            $first = true;
            foreach ($video_events as $video_event) { ?>
                    <div class="tab-pane fade <?= $first ? 'show active' : '' ?>" id="videos-<?= $video_event['id'] ?>"
                        role="tabpanel" aria-labelledby="tab-video-<?= $video_event['id'] ?>">
                        <ul class="pricing_list d-md-flex flex-wrap">
                            <?php foreach ($video_event['videos'] as $video) { ?>
                            <li class="pricing_list-card col-md-6 col-lg-4 mb-4">
                                <div class="card-wrapper">
                                    <div class="top top--advanced">
                                        <h5 class="top_title"><?= htmlspecialchars($event['name']) ?> Performance</h5>
                                    </div>
                                    <div class="main">
                                        <video class="w-100 rounded" controls>
                                            <source src="admin/<?= $video ?>" type="video/mp4">
                                            Your browser does not support video.
                                        </video>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php $first = false; } ?>
                </div>
            </div>
        </section>
         <section class=faq>
            <div class=phone>
                <lottie-player src=lottie/phone.json background=404.html speed=1 style="width: 100%; height: 100%" loop
                    autoplay></lottie-player>
            </div>
            <div class=sphere>
                <lottie-player src=lottie/sphere.json background=404.html speed=1.5 style="width: 100%; height: 100%"
                    loop autoplay></lottie-player>
            </div>
            <div class="container d-flex flex-column align-items-center">
                <div class=faq_header>
                    <h2 class=faq_header-title data-aos=fade-down>Answering Your Questions 🎶</h2>
                    <p class=faq_header-text data-aos=fade-up>
                        At DynamicStaccato Musical Academy, we know students and parents have many questions before
                        starting
                        their musical journey. Here are some common queries answered for you.
                    </p>
                </div>
                <div class=faq_accordion id=faq_accordion>

                    <!-- FAQ 1 -->
                    <div class=faq_accordion-item>
                        <div class=item-wrapper>
                            <h4 class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                                data-bs-toggle=collapse data-bs-target=#item-1 aria-expanded=true>
                                <span class=text>What instruments can I learn at DynamicStaccato? </span><span
                                    class="icon transform"></span>
                            </h4>
                            <div id=item-1 class="accordion-collapse collapse show">
                                <div class=faq_accordion-item_body>
                                    We offer a wide range of courses including Piano, Guitar, Drums, Violin, and Vocal
                                    training.
                                    Each program is designed for beginners as well as advanced learners, with
                                    personalized mentoring.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class=faq_accordion-item>
                        <div class=item-wrapper>
                            <h4 class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                                data-bs-toggle=collapse data-bs-target=#item-2 aria-expanded=false>
                                <span class=text>Do you provide online music classes? </span><span class=icon></span>
                            </h4>
                            <div id=item-2 class="accordion-collapse collapse">
                                <div class=faq_accordion-item_body>
                                    Yes! We provide both <strong>in-person</strong> and <strong>live online
                                        classes</strong>.
                                    Our online programs are interactive, with one-on-one feedback from professional
                                    mentors.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class=faq_accordion-item>
                        <div class=item-wrapper>
                            <h4 class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                                data-bs-toggle=collapse data-bs-target=#item-3 aria-expanded=false>
                                <span class=text>Will I get a certificate after completing the course? </span><span
                                    class=icon></span>
                            </h4>
                            <div id=item-3 class="accordion-collapse collapse">
                                <div class=faq_accordion-item_body>
                                    Absolutely! Every student completing a course at DynamicStaccato receives a
                                    <strong>certificate of completion</strong>, recognizing your skills and progress.
                                    This can be helpful for auditions, competitions, and future career opportunities.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class=faq_accordion-item>
                        <div class=item-wrapper>
                            <h4 class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                                data-bs-toggle=collapse data-bs-target=#item-4 aria-expanded=false>
                                <span class=text>Do you conduct student performances or concerts? </span><span
                                    class=icon></span>
                            </h4>
                            <div id=item-4 class="accordion-collapse collapse">
                                <div class=faq_accordion-item_body>
                                    Yes, we regularly organize <strong>student recitals, concerts, and
                                        competitions</strong>.
                                    These events help students showcase their talent, build stage confidence,
                                    and experience the joy of live performance.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a class="faq_btn btn--arrow" href=faq.html>View all<i class="icon-arrow-right-solid icon"></i></a> -->
            </div>
        </section>
    </main>
    <?php include 'footer.php' ; ?>
    <script src=../../unpkg.com/%40lottiefiles/lottie-player%402.0.12/dist/lottie-player.js></script>
    <script src=js/common.min.js></script>
    <script src=js/demo.js></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J2SRB925J5"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-J2SRB925J5');
    </script>
</body>
<!-- Media Popup -->
<div id="mediaPopup" class="media-popup">
    <span class="media-popup-close">&times;</span>
    <div class="media-popup-content" id="mediaPopupContent"></div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("mediaPopup");
    const popupContent = document.getElementById("mediaPopupContent");
    const closeBtn = document.querySelector(".media-popup-close");
    const header = document.querySelector("header"); // your header include
    const footer = document.querySelector("footer"); // your footer include

    // Open popup on image/video click
    document.querySelectorAll(".pricing_list img, .pricing_list video").forEach(el => {
        el.addEventListener("click", () => {
            popup.style.display = "flex";
            popupContent.innerHTML = "";

            // Disable page scroll
            document.body.style.overflow = "hidden";

            // Hide header & footer
            if (header) header.style.display = "none";
            if (footer) footer.style.display = "none";

            if (el.tagName.toLowerCase() === "img") {
                let img = document.createElement("img");
                img.src = el.src;
                popupContent.appendChild(img);
            } else if (el.tagName.toLowerCase() === "video") {
                let video = document.createElement("video");
                video.src = el.querySelector("source").src;
                video.controls = true;
                video.autoplay = true;
                popupContent.appendChild(video);
            }
        });
    });

    // Function to close popup
    function closePopup() {
        popup.style.display = "none";
        popupContent.innerHTML = "";
        document.body.style.overflow = ""; // Restore scroll

        // Show header & footer back
        if (header) header.style.display = "";
        if (footer) footer.style.display = "";
    }

    // Close on X
    closeBtn.addEventListener("click", closePopup);

    // Close on outside click
    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            closePopup();
        }
    });

    // Close on ESC key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && popup.style.display === "flex") {
            closePopup();
        }
    });
});
</script>


<!-- Mirrored from html.merku.love/DynamicStaccato/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 09:09:38 GMT -->

</html>