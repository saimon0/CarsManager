/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app_css.css in this case)
import '../css/app_css.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

console.log('it also works!');



$("#add-car-btn").on('click', function()
{
    if ($("#remove-car-form-div").is(":visible"))
    {
        $("#remove-car-form-div").toggle();
    }
    console.log("clicked!!");
    $("#create-car-form-div").toggle();

});

$("#remove-car-btn").on('click', function()
{
    if ($("#create-car-form-div").is(":visible"))
    {
        $("#create-car-form-div").toggle();
    }
    console.log("clicked!!");
    $("#remove-car-form-div").toggle();

});


