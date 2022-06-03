$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back',
            next : '<i class="zmdi zmdi-chevron-right"></i>',
            finish : '<i class="zmdi zmdi-chevron-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            var fullname = $('#first_name').val() + ' ' + $('#last_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var gender = $('form input[type=radio]:checked').val();
            var units = $('#unitsVal').val();
            var transactionId = $('#transactionId').val();
            var meterId = $('#meterId').val();
            var totalPrice = Number(units)*12.5;
          //  var account_name = $('#account_name').val();
          //  var account_number = $('#account_number').val();

            $('#fullname-val').text(fullname);
            $('#email-val').text(email);
            $('#phone-val').text(phone);
            $('#address-val').text(address);
            $('#gender-val').text(gender);
            $('#totalPrice-val').text(totalPrice);
            $('#units-val').text(units);
            $('#meterId-val').text(meterId);
            $('#transactionId-val').text(transactionId);

            return true;
        }
    });

    $("[href='#finish']").on("click",function() {
      alert("noted");
      event.preventDefault();
      event.stopPropagation();
      var first_name = $('#first_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var address = $('#address').val();
      var units = $('#unitsVal').val();
      var tPrice = Number(units)*12.5;
      var transactionDesc = "gas purchase"

      $.post("/Entak/Flutterwave/paymentForm.php",
        {
          first_name : first_name,
          last_name : last_name,
          email : email,
          phone : phone,
          address : address,
          tPrice : tPrice,
          transactionDesc :transactionDesc
        },
        function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
        //load data and initialize portal
        window.location.assign("/Entak/Flutterwave/paymentForm.php");
        });

    });
});
