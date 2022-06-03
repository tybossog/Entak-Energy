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
            previous : 'Previous',
            next : 'Next Step',
            finish : 'Submit',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            var fullname = $('#first_name').val() + ' ' + $('#last_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var username = $('#username').val();
            var gender = $('form input[type=radio]:checked').val();
            var address = $('#address').val();

            $('#fullname-val').text(fullname);
            $('#email-val').text(email);
            $('#phone-val').text(phone);
            $('#username-val').text(username);
            $('#address-val').text(address);
            $('#gender-val').text(gender);

            return true;
        }
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });

    $("#createAcctForm").on("submit",function(event){
      alert("noted");
      event.preventDefault();
      event.stopPropagation();

      let firstName = $('#first_name').val();
      let lastName = $('#last_name').val();
      let email = $('#email').val();
      let phone = $('#phone').val();
      let userName = $('#username').val();
      let gender = $('form input[type=radio]:checked').val();
      let address = $('#address').val();
      let password = $('#password_1').val();

      const person = {
        firstName: firstName,
        lastName: lastName,
        email: email,
        phone:phone,
        address:address,
        gender:gender,
        password:password
      };

      const newUser = JSON.stringify(person);

      $.post("/Entak/CreateAccount/Forms/createAccount.php",
        {
          newUser:newUser
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
          //if status okay and data response okay
          //retrieve data needed for portal
          //redirect to portal
          window.location.assign("/Entak/Portal/index.html");
        });
    });
});
