let slide = 0;
let count2 = 3;
$('.gallary > img:last-child').click(function () {
    let count = document.querySelectorAll('.img > img').length;
    if (count != count2) {
        count2 += 1;
        slide -= 205;
    }
    $('.img > img').css('transform', "translateX("+slide+"px)");
    $('.img > img').css('transition', '.5s');
});
$('.gallary > img:first-child').click(function () {
    let count = document.querySelectorAll('.img > img').length;
    if (count2 > 3) {
        count2 -= 1;
        slide += 205;
    }
    $('.img > img').css('transform', "translateX("+slide+"px)");
    $('.img > img').css('transition', '.5s');
});
$('.info > img:first-child').click(function () {
    $('.edit_profile').css('display', 'block');
});
$('.btn').click(function () {
    $('.edit_profile').css('display', 'none');
});
$('main > .profile_container > .profile > .profile_info_container > img').click(function () {
    $('main > .profile_container > .profile > nav:first-child').css('display', 'block');
});
$('main > .profile_container > .profile > nav:first-child').click(function () {
    $('main > .profile_container > .profile > nav:first-child').css('display', 'none');
});