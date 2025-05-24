let cheked = 0;
function ds() {
    cheked++;
    if  (cheked == 1) {
        $('.chat_container_view').css('display', 'block');
        $('.chat_container').css('display', 'none');
    }
    else {
        $('.chat_container_view').css('display', 'none');
        $('.chat_container').css('display', 'block');
        cheked = 0;
    }
}