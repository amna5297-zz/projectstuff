$(document).ready(function(){
    $("#createaccountbtn").click(function(){
        displayRegistrationForm();
    });

    $("#loginbtn").click(function(){
        displayLoginForm();
    });

    $("#backtologin").click(function(){
      $("#registersuccess").hide("600", function(){
          $("#mainlogin").show("600");
      });
    });

});

function displayRegistrationForm(){
    $("#mainlogin").hide("600", function(){
        $("#mainregister").show("600");
    });
}

function displayLoginForm(){
    $("#mainregister").hide("600", function(){
        $("#mainlogin").show("600");
    });
}
