$(document).ready(function(){

    // welcome message at admin
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade');
        });


    //sidebar menu for users-section
    $('#toggle_user01').click(function () {
        $('#user_sidebar1').sidebar('toggle');
    });

    $('#toggle_user02').click(function () {
        $('#user_sidebar2').sidebar('toggle');
    });

    //sidebar menu for admin-section
    $('#toggle-02').click(function () {
        $('#sidebar-02').sidebar('toggle');
    });
    //sidebar menu for admin-section
    $('#toggle-03').click(function () {
        $('#sidebar-03').sidebar('toggle');
    });


    // price animated slideup
    $('#img-1, #img-2, #img-3, #img-4 ,#img-5, #img-6, #img-7, #img-8, #img-9, #img-10, #img-11, #img-12').hide();

    $('#gallery_section #imgOne').mouseenter(function() {
        $('#img-1').slideDown(400);
    });
    $('#gallery_section #imgOne').mouseleave(function() {
        $('#img-1').slideUp();
    });

    $('#gallery_section #imgTwo').mouseenter(function() {
        $('#img-2').slideDown(400);
    });
    $('#gallery_section #imgTwo').mouseleave(function() {
        $('#img-2').slideUp();
    });

    $('#gallery_section #imgThree').mouseenter(function() {
        $('#img-3').slideDown(400);
    });
    $('#gallery_section #imgThree').mouseleave(function() {
        $('#img-3').slideUp();
    });

    $('#gallery_section #imgFour').mouseenter(function() {
        $('#img-4').slideDown(400);
    });
    $('#gallery_section #imgFour').mouseleave(function() {
        $('#img-4').slideUp();
    });

    $('#gallery_section #imgFive').mouseenter(function() {
        $('#img-5').slideDown(400);
    });
    $('#gallery_section #imgFive').mouseleave(function() {
        $('#img-5').slideUp();
    });

    $('#gallery_section #imgSix').mouseenter(function() {
        $('#img-6').slideDown(400);
    });
    $('#gallery_section #imgSix').mouseleave(function() {
        $('#img-6').slideUp();
    });

    $('#gallery_section #imgSeven').mouseenter(function() {
        $('#img-7').slideDown(400);
    });
    $('#gallery_section #imgSeven').mouseleave(function() {
        $('#img-7').slideUp();
    });

    $('#gallery_section #imgEight').mouseenter(function() {
        $('#img-8').slideDown(400);
    });
    $('#gallery_section #imgEight').mouseleave(function() {
        $('#img-8').slideUp();
    });

    $('#gallery_section #imgNine').mouseenter(function() {
        $('#img-9').slideDown(400);
    });
    $('#gallery_section #imgNine').mouseleave(function() {
        $('#img-9').slideUp();
    });

    $('#gallery_section #imgTen').mouseenter(function() {
        $('#img-10').slideDown(400);
    });
    $('#gallery_section #imgTen').mouseleave(function() {
        $('#img-10').slideUp();
    });

    $('#gallery_section #imgEleven').mouseenter(function() {
        $('#img-11').slideDown(400);
    });
    $('#gallery_section #imgEleven').mouseleave(function() {
        $('#img-11').slideUp();
    });

    $('#gallery_section #imgTwelve').mouseenter(function() {
        $('#img-12').slideDown(400);
    });
    $('#gallery_section #imgTwelve').mouseleave(function() {
        $('#img-12').slideUp();
    });


    //CAROUSEL IMAGES
    $('.carousel').carousel({
        interval: 2000
    })



});// on load document


