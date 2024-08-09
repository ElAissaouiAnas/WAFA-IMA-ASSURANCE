/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

require('bootstrap/dist/css/bootstrap.min.css')
// any CSS you require will output into a single css file (app.css in this case)

require('../plugins/slider.layerslider/css/layerslider.css');

require('../css/essentials.css');
require('../css/layout.css');
require('../css/header-1.css');
require('../css/color_scheme/blue.css');
require('../css/mine.css');

$(document).ready(function () {
    // alert('ffff')
    $(".descrip-slogan").hover(
        function () {
            var data_type = $(this).attr("data-type");
            $(this).find("p").addClass(data_type);
        },
        function () {
            var data_type = $(this).attr("data-type");
            $(this).find("p").removeClass(data_type);
        }
    );
    $(".description-co").hover(
        function () {
            var data_type = $(this).attr("data-type");
            $(this).find("p").addClass(data_type);
        },
        function () {
            var data_type = $(this).attr("data-type");
            $(this).find("p").removeClass(data_type);
        }
    );
})

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
