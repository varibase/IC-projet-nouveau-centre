
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

    if ($('#showpopin').val() != undefined)
        ShowModal2($('#showpopin').val(), $('#popinurl').val(), $('#popinaction').val());

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

//modals :
var ModalOptions = {
    'register' : {
        class  : "",
        dialog : "modal-lg",
        footer : 1
    },
    'profile' : {
        class  : "",
        dialog : "modal-lg",
        footer : 1
    },
    'confirm' : {
        class  : "",
        dialog : "modal-sm",
        footer : 1
    },
    'loginstep1': {
        class  : "",
        dialog : "modal-sm",
        footer : 1
    },
    'passwordreset': {
        class  : "",
        dialog : "modal-sm",
        footer : 1
    },
    'passwordchange': {
        class  : "",
        dialog : "modal-sm",
        footer : 1
    },
    'mycard': {
        class  : "cardModal",
        dialog : "modal-lg",
        footer : 0
    },
    'offer':{
        class  : "offerModal",
        dialog : "modal-lg",
        footer : 0
    }
};

$(document).on("click",".toggle-modal", function(event){
    event.preventDefault();
    event.stopPropagation();
    
    ShowModal2($(this).data('modaltype'), $(this).attr('href'), $(this).data('action'));
  });

function ShowModal2(modal, href, action) {

    $('.modal-body').html("");

    $('#actionModal').addClass(ModalOptions[modal].class);

    $('.modal-dialog').removeClass("modal-lg modal-sm").addClass(ModalOptions[modal].dialog);

    if ( ModalOptions[modal].footer == 1 ) {
        $('.modal-footer').show();
        $('#call2action').html(action);
        $('#call2action').show();
        $('#call2action').prop('disabled', false);
    } else {
        $('.modal-footer').hide();
    }

    $('.modal-body').load(href);
    $('#actionModal').modal('show');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#call2action').on('click',function(event){

    var forms = $('#call2actionform');
    $('#errors').hide();

    var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            $('#call2action').prop('disabled', true);

            $.ajax({
                url: $('#call2actionform').data('action'),
                type: 'post',
                dataType: 'json',
                data: $('#call2actionform').serialize(),
                success: function(response) {

                    if (response.success) {

                        if (response.msg) {
                            $("#call2actionform").fadeOut('slow');
                            $('#call2action').fadeOut('slow');
                            $("#result").html( response.msg).fadeIn('slow');
                        }

                        if (response.view) {
                            $('.modal-body').html(response.view).fadeIn('slow');
                            $('#call2action').html(response.action).fadeIn('slow');
                            $('#call2action').prop('disabled', false);
                        }

                        if (response.refresh) {
                            $('p').hide();
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    } else {
                        $('#call2action').prop('disabled', false);
                        $("#errors").html( response.msg).fadeIn('slow');
                    }
                },
                error: function (request, status, error) {
                    json = $.parseJSON(request.responseText);
 
                    $.each(json.errors, function(key, value){
                        $('#errors').append('<p>'+value+'</p>');
                    });
                    $('#errors').fadeIn('slow');
                    $("#result").hide();
                    $('#call2action').prop('disabled', false);
                }
            });

            event.preventDefault();
        }
        form.classList.add('was-validated');
    });
});

