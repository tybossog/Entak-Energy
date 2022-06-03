$(function () {

  $("#purchaseBtn").on("click",function () {
    alert("purchasebtn clkd");
    $("#purchase").load("/Entak/Portal/Purchase/purchase.html",{},function () {

      })
    });

    $("#profileBtn").on("click",function () {
      alert("profilebtn clkd");
      $("#profile").load("/Entak/Portal/Customer/profile.php",{},function () {

        })
      });
  });
