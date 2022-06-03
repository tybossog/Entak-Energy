$(function(){

  $.post("/Entak/Database/database.php", {},function(data, status){
      //alert("Data: " + data + "\nStatus: " + status);
    });

  //load Create Account form
  $("#createAccountBtn").on("click",function(event){
    event.preventDefault();
    event.stopPropagation();
    window.location.assign("/Entak/CreateAccount/CreateAccount.html");
  });

$("#loginForm").on("submit",function(event){
   alert("noted login");
    event.preventDefault();
    event.stopPropagation();

    let loginEmail = $("#loginEmail").val();
    let loginPwd = $("#loginPwd").val()

    $.post("/Entak/UserLogin/Forms/login.php",
      {
        email:loginEmail,
        password:loginPwd
      },
      function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
      //load data and initialize portal
      window.location.assign("/Entak/Portal/Customer/customer.php");
      });
  });

  $("#forgotPwdBtn").on("click",function(event){
    event.preventDefault();
    event.stopPropagation();
    alert("noted");
    //remove elements
    //$("#userLogin").remove();
    //alert("load account form");

  //  $("<div id='account'></div>")
  //  .insertAfter("#header")
  //  .load("account.html");
  });

});
