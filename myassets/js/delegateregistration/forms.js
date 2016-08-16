$(document).ready(function(){
    $('#continuestepone').click(function(e){

        e.preventDefault();
        var l = Ladda.create(this);
        l.start();

        var values = $("#delegatereg-one").serialize();

        $.ajax({
            type: "POST",
            url:"delegateregistration.php",
            data: values,
            dataType: "text",
            success: function( data ) {
                if(data == "y"){
                    l.stop;
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $("#step2").addClass("active");
                }
                else{
                    l.stop;
                }
            }
        });


        });
});
