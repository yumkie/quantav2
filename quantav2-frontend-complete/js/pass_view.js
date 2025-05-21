function view() {
    if ($('#password-input').attr('type') == 'password'){
		$('.view_password').attr('class', 'no_view_password')
		$('#password-input').attr('type', 'text');
	} else {
        $('.no_view_password').attr('class', 'view_password')
		$('#password-input').attr('type', 'password');
	}
};