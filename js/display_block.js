let cheked = 0
function ds_b() {
    let element = document.getElementById('chat');
    console.log(cheked++);
    if( cheked === 1) {
        $('#window_message_chat').attr('id', 'window_message_chat_reverse')
        element.style.display = 'block';
        $(".ava > img").css("margin", "10px 0 0 12px");
        $("#reverse > p").css("margin-top", "12px")



    }
    else {
        $('#window_message_chat_reverse').attr('id', 'window_message_chat')
        element.style.display = 'none';
        $(".ava > img").css("margin", "15px 0 0 17px");
        $("#reverse > p").css("margin", "17px 0 0 10px")
        cheked = 0;
    }
}
function ds_1() {

    $('.friends_list').css("display", "flex");
    $('.requests_list').css("display", "none");
    $('.friendship_list').css("display", "none");
    $('.find_list').css("display", "none");

}
function ds_3() {

    $('.friendship_list').css("display", "flex");
    $('.requests_list').css("display", "none");
    $('.friends_list').css("display", "none");
    $('.find_list').css("display", "none");

}
function ds_2() {

    $('.requests_list').css("display", "flex");
    $('.friends_list').css("display", "none");
    $('.friendship_list').css("display", "none");
    $('.find_list').css("display", "none");

}
function ds_4() {

    $('.requests_list').css("display", "none");
    $('.friends_list').css("display", "none");
    $('.friendship_list').css("display", "none");
    $('.find_list').css("display", "block");
}