
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
    var screenHeight = $(window).height();

    if(screenWidth < 768)
    {
        if(screenHeight > 480){
            $('#banner-fifty-left').height(screenHeight/2);
            $('#banner-fifty-left > .row').height(screenHeight/2);
        } else {
            $('#banner-fifty-left').height(screenHeight*0.8);
            $('#banner-fifty-left > .row').height(screenHeight*0.8);
        }
    }
    else
    {
        $('#banner-fifty-left').height(screenHeight*0.8);
        $('#banner-fifty-left > .row').height(screenHeight*0.8);
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
   $("#icon-map").hide();
    $("#maps-list").fadeIn('slow');
    $("#icon-list").fadeIn('slow');
});

$('#icon-list > i').on('click',function(){

    $("#maps-list").fadeOut('fast');
    $("#icon-list").hide();
    $("#regular-list").fadeIn('slow');
    $("#icon-map").fadeIn('slow');
});

// animations:
AOS.init();

// peut etre rendu générique :
$('#offerModal').on('show.bs.modal', function (e) {
    $(this).find('.modal-body').load(e.relatedTarget.href);
});


