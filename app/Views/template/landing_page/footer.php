<footer class="footer relative-bottom text-white text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">TOEIC Online Tests</h5>

        <p>
          This is a website for TOEIC materials and practice tests.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Our Social Media</h5>
        <!-- Facebook -->
        <a class="btn btn-primary" style="background-color: #3b5998;" href="https://www.facebook.com/binasaranaglobal" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-primary" style="background-color: #55acee;" href="https://twitter.com/kuliah_global" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-primary" style="background-color: #dd4b39;" href="#" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-primary" style="background-color: #ac2bac;" href="https://www.instagram.com/binasaranaglobal" role="button"><i class="fab fa-instagram"></i></a>

      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    ©<?= date('Y');?> Copyright:
    <a class="text-white" href="#">GlobalToeicTest.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script>
  $(document).ready(function() {
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });

    $(window).scroll(function() {
      $(".slideanim").each(function() {
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
      });
    });
  })
</script>