
$('.btn__menu').on('click', function () { $('.header .nav, .btn__menu, body').toggleClass('is_active'); })
$('.nav__link').on('click', function () { $('.header .nav, .btn__menu, body').removeClass('is_active'); })

// $('input[name="uphone"]').inputmask({ "mask": "+7-999-999-99-99" });

$('.galery-slider').slick({
    infinite: true,
    dots: false,
    arrows: false,
    slidesToShow: 1,
    swipeToSlide: true,
    // autoplay: true,
    autoplaySpeed: 2200,
    centerMode: true,
    slidesToShow: 3,
    variableWidth: true,
    slidesToScroll: 1,
    touchThreshold: 9,
    centerPadding: '0',
    slidesToScroll: 1,
});

$('.review-slider').slick({
    infinite: false,
    dots: false,
    arrows: false,
    slidesToShow: 1,
    swipeToSlide: true,
    slidesToShow: 1,
    variableWidth: true,
    slidesToScroll: 1,
    touchThreshold: 9,
    centerPadding: '0',
    slidesToScroll: 1,
});


$("form").submit(function () {
    $('form .btn').attr('disabled', 'disabled');
    var sender = "../smart.php";
    $.ajax({
        type: "POST",
        method: 'POST',
        url: sender,
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            $('form .btn').removeAttr('disabled');
            $('form').trigger('reset');
            $('.modal').fadeOut();
            alert('Спасибо, за заявку, ожидайте с вами свяжется специалист');
        }
    });
    return false;
});

function hideModals() {
    $('.modal').fadeOut();
    $('body').removeClass('active');
};

$(function () {
    function showModal(id) {
        $('body').addClass('active');
        $(id).addClass('active').fadeIn(300);
    }
    $('[data-modal]').on('click', function (e) {
        e.preventDefault();
        showModal('#' + $(this).attr("data-modal"));
    });

    $('.modal-close').on('click', () => { hideModals(); });
    $(document).on('click', function (e) {
        if (!(($(e.target).parents('.modal-content').length) ||
            ($(e.target).parents('.btn').length) ||
            ($(e.target).hasClass('btn')) ||
            ($(e.target).hasClass('modal-content'))
        )) { hideModals(); }
    });
});

