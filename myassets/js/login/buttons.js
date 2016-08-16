$(document).ready(function(){
    $("#registrationbutton").click(function(){
      $(".errors").hide();

        var l = Ladda.create(this);
        l.start();

        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if(!($("#email").val()).match(re)) {

            $("#emailerror").show();
            l.stop();
            return;
        }

        var values = $("#registrationform").serialize();

        $.ajax({
            type: "POST",
            url:"../myassets/phpscripts/email/verification.php",
            data: values,
            dataType: "text",
            success: function( data ) {
              console.log(data);
              l.stop();

              $("#mainregister").hide("600", function(){
                  $("#registersuccess").show("600");
              });
            }
        });
    });
});
