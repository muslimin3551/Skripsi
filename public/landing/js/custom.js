
  $(function () {

    // MENU
    $('.nav-link').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });


    // AOS ANIMATION
    AOS.init({
      disable: 'mobile',
      duration: 800,
      anchorPlacement: 'center-bottom'
    });


    // SMOOTH SCROLL
    $(function() {
      $('.nav-link').on('click', function(event) {
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
          }, 1000);
            event.preventDefault();
      });
    });  


    // PROJECT SLIDE
    $('#project-slide').owlCarousel({
      loop: true,
      center: true,
      autoplayHoverPause: false,
      autoplay: true,
      margin: 30,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          768:{
              items:2,
          }
      }
    });

  });

  $(document).on('click', '.send_form', function() {
    var input_blanter = document.getElementById('email');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '62881024130321',
        walink2 = 'Halo Trinary',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir lalu klik Send.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if ("" != input_blanter.value) {

        /* Call Input Form */
        var input_nama = $("#nama").val(),
            input_email = $("#email").val(),
            input_subjek = $("#subjek").val(),
            input_pesan = $("#pesan").val();

        /* Final Whatsapp URL */
        var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*Name* : ' + input_nama+ '%0A' +
            '*Email Address* : ' + input_email + '%0A' +
            '*Subjek* : ' + input_subjek + '%0A' +
            '*Description* : ' + input_pesan + '%0A';

        /* Whatsapp Window Open */
        window.open(blanter_whatsapp, '_blank');
    } else {
        document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
    }
});


    

