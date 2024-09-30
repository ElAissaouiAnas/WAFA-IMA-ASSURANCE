/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function wrongPassword(){
    $("#loginShakerContainer").delay(100).animate({
        left: "-=45"
    }, 90, "easeInCubic",
    function() {
        $("#loginShakerContainer").animate({
            left: "+=90"
        },
        90, "linear",
        function() {
            $("#loginShakerContainer").animate({
                left: "-=75"
            },
            90, "linear",
            function() {
                $("#loginShakerContainer").animate({
                    left: "+=60"
                },
                90, "linear",
                function() {
                    $("#loginShakerContainer").animate({
                        left: "-=30"
                    },
                    120, "easeOutCubic",
                    function() {
                        $("#loginProcessingDiv").hide();
                        $("#loginButton").show();
                        $("#loginBox").css({
                            "-moz-box-shadow": "0 2px 2px 0 red"
                        });
                        $("#loginBoxFooter").css({
                            "-moz-box-shadow": "0 2px 2px 0 red"
                        });
                    });
                });
            });
        });
    });
}
