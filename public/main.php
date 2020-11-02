<?php require_once("../resources/config.php"); ?>
<!-- HEADER AND NAVBAR -->
<?php include(TEMPLATE_FRONT . DS . "intro.php"); ?>

        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="slide_number">1 / 2</div>
                <img src="images/slide_padova.jpg">
                <div class="slide_text">Sede di Padova</div>
            </div>

            <div class="mySlides fade">
                <div class="slide_number">2 / 2</div>
                <img src="images/slide_roma.jpg">
                <div class="slide_text">Sede di Roma</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div class="dot-container">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
        </div>

        <script src="carousel.js"></script>

    </body>
</html>
