$(document).ready(function(){
    $("#createaccountbtn").click(function(){
        displayRegistrationForm();
    });
    
    $("#loginbtn").click(function(){
        displayLoginForm();
    })
   
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