

//load core scripts
(function () {


  $("head").append("<link href='/Entak/assets/img/favicon.png' rel='icon'>");

  $("head").append("<link href='/Entak/assets/img/apple-touch-icon.png' rel='apple-touch-icon'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i"+
  ",600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap'>"
  );

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/animate.css/animate.min.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/aos/aos.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/bootstrap/css/bootstrap.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/bootstrap/css/bootstrap.css.map'>");

  $("head").append("<link rel='stylesheet' type='text/css' "+
  "href='/Entak/assets/vendor/bootstrap-icons/bootstrap-icons.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/boxicons/css/boxicons.min.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/glightbox/css/glightbox.min.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='/Entak/assets/vendor/swiper/swiper-bundle.min.css'>");

  /*$("head").append("<link rel='stylesheet' type='text/css'"+
  "href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2"+
  "/dist/css/bootstrap.min.css'>");

  $("head").append("<link rel='stylesheet' type='text/css'"+
  "href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0"+
  "/font/bootstrap-icons.css'>");*/

})();

$(function(){

  "use strict";

  //load Header
  $(".headerContainer")
  .load("/Entak/Header.html");

 //load Footer
  $(".footerContainer")
  .load("/Entak/Footer.html");

  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/purecounter/purecounter.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/aos/aos.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/bootstrap/js/bootstrap.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/isotope-layout/isotope.pkgd.min.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/glightbox/js/glightbox.min.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/swiper/swiper-bundle.min.js'></script>"
  );
  $("#mainBody").append(
  "<script src='/Entak/assets/vendor/waypoints/noframework.waypoints.js'></script>"
  );
  /*$("#mainBody").append(
  "<script src='https://cdn.jsdelivr.net/npm/"+
  "bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>"
);*/
  $("#mainBody").append(
  "<script src='/Entak/assets/js/home.js'></script>"
  );
});
