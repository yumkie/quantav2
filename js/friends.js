function friend() {
    $(".friends").css('display', 'flex');
    $(".sent").css('display', 'none');
    $(".friendship").css('display', 'none');
    $('.find').css('display', 'none');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:first-child > p").css('color', '#D19049');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > p").css('color', '#fff');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:first-child > img').attr('src', '../img/friends 1.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > img').attr('src', '../img/friends 2.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > img').attr('src', '../img/friends 3.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > img').attr('src', '../img/friends 4.svg');
}
function sent() {
    $(".friends").css('display', 'none');
    $(".sent").css('display', 'flex');
    $(".friendship").css('display', 'none');
    $('.find').css('display', 'none');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:first-child > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > p").css('color', '#D19049');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > p").css('color', '#fff');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > img').attr('src', '../img/friends 3.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > img').attr('src', '../img/friends 4.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:first-child > img').attr('src', '../img/friends 5.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > img').attr('src', '../img/friends 6.svg');

}
function friendship() {
    $(".friends").css('display', 'none');
    $(".sent").css('display', 'none');
    $(".friendship").css('display', 'flex');
    $('.find').css('display', 'none');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:first-child > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > p").css('color', '#D19049');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > p").css('color', '#fff');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:first-child > img').attr('src', '../img/friends 5.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > img').attr('src', '../img/friends 2.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > img').attr('src', '../img/friends 7.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > img').attr('src', '../img/friends 4.svg');
}
function find() {
    $(".friends").css('display', 'none');
    $(".sent").css('display', 'none');
    $(".friendship").css('display', 'none');
    $('.find').css('display', 'flex');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:first-child > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > p").css('color', '#fff');
    $("main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > p").css('color', '#D19049');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:first-child > img').attr('src', '../img/friends 5.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(2) > img').attr('src', '../img/friends 2.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(3) > img').attr('src', '../img/friends 3.svg');
    $('main > .friend_container > .left_chart_container > .menu_list > nav:nth-child(4) > img').attr('src', '../img/friends 8.svg');
}