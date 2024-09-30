/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function() {
    var BaseUrl ='http://localhost/MyTickets/';   
//    firstSelected = false;
//    selected = new Array();
    $("#loginButton").show();
    $("#loginProcessingDiv").hide();
    $("#loginText").empty().append("...authentification en cours");
    
    
    $("#loginButton").click(function(){
        $(this).hide();
        $("#loginProcessingDiv").show();
        $.ajax({
            url: $('#UserLoginForm').attr('action'),
            method: "POST",
            data: $('#UserLoginForm').serialize(),
            success: function(data){
                data =$.parseJSON(data);
                
                //                console.log(data);
                if(data.login)
                {                    
                    //redirect user with data.redirect
                    window.location.href  = data.redirect.replace('\\','');
                }
                else
                {
                    //display error   with data.error
                                    
                    wrongPassword();
                    
                }
            },
            error: function(resultXML){
                wrongPassword();
            }
        });
    });
    
    $("#merchantDropdown").click(function() {
        if ($(this).hasClass("merchantDropdownEnabled")) {
            $("#merchantDropdownBoxBottom").hide();
            $(this).removeClass("merchantDropdownEnabled");
        } else {
            $("#messagesDropdownButtonDiv").next().hide();
            $("#messagesDropdownButtonDiv").removeClass("open");
            $(this).addClass("merchantDropdownEnabled");
            $("#merchantDropdownBoxBottom").show();
        }
    });

    $("#categories").append('<option value=0>Bloquée</option>');
    
    $("#event_link").mouseover(function(){
        $("#sous_links").show();
    });
    $("#event_link").mouseout(function(){
        $("#sous_links").hide();
    });

    // $("#menuStep2").click(function(){
    //    $('#step1').slideUp();
    //    $('#step1').hide('slide', {
    //        direction: 'left'
    //    }, 1000);
    //    $('#step2').show('slide', {
    //        direction: 'right'
    //    }, 1000);
    //    }); 
    //    
    //    $("#menuStep3").click(function(){
    //    $('#step2').slideUp();
    //    $('#step2').hide('slide', {
    //        direction: 'left'
    //    }, 1000);
    //    $('#step3').show('slide', {
    //        direction: 'right'
    //    }, 1000);
    //    }); 
    


});
