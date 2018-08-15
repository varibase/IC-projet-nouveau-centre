
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function () {
    'use strict'

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    })
});

$(function () {
    'use strict'

    $('.offcanvas-outside').on('click', function () {
        $('.offcanvas-collapse').removeClass('open')
    })
});

function responsiveness(){
    var screenWidth = $(window).width();
    if(screenWidth < 768)
    {
        var screenHeight = $(window).height();
        $('#banner-fifty-left').height(screenHeight/2);
        $('#banner-fifty-left > .row').height(screenHeight/2);
        $('#banner-fifty-left > .row').removeClass('align-items-center');

        $('#banner-fifty-left > .row').addClass('pt-5');
        $('#banner-fifty-right').height(screenHeight/2);
        $('#banner-fifty-right > .row').height(screenHeight/2);
        var align = screenHeight/2 + 88;
        $('.c-logo').css("top", -align);
        $('.img-title').css("height", screenHeight/4);

        if(screenHeight < 480){
            $('#banner-fifty-right > .row').removeClass('align-items-center');
            $('#banner-fifty-right > .row').addClass('align-items-end');
            $('#banner-fifty-right > .row').addClass('pb-4');
        }

    }
    else
    {
        $('#banner-fifty-left').height(650);
        $('#banner-fifty-left > .row').height(650);
        $('#banner-fifty-left > .row').addClass('align-items-center');
        $('#banner-fifty-right > .row').addClass('align-items-center');
        $('#banner-fifty-right > .row').removeClass('align-items-end');
        $('#banner-fifty-right > .row').removeClass('pb-4');
        $('#banner-fifty-left > .row').removeClass('pt-5');
        $('#banner-fifty-right').height(650);
        $('#banner-fifty-right > .row').height(650);
        $('.c-logo').css("top", "-183px");
        $('.img-title').css("height", "auto");
    }
}


$(window).ready(function(){
    responsiveness();
});

$(window).resize(function(){
   responsiveness();
});

$('#icon-map > i').on('click',function(){
   $("#regular-list").fadeOut('fast');
   $("#icon-map").fadeOut('fast');
    $("#maps-list").fadeIn('slow');
    $("#icon-list").fadeIn('slow');
});

$('#icon-list > i').on('click',function(){

    $("#maps-list").fadeOut('fast');
    $("#icon-list").fadeOut('fast');
    $("#regular-list").fadeIn('slow');
    $("#icon-map").fadeIn('slow');
});


