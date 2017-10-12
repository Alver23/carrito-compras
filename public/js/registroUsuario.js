$(function(){
	$('#formRegistroUsuario').validate({
		rules: {
			confirm_password: {equalTo: '#password'}
		},
		messages: {
			confirm_password: {equalTo: 'Las contraseñas no coinciden'}
		}
	})

	$(document).on('change', '#tipo_cliente_id', function (ev) {
		var id = $(this).val()
		var lblIdentification = $('#lbl_identificacion')
		if (id) {
			if (id == 2) {
				lblIdentification.html('<strong class="text-red">*</strong> Nit')
				return true
			}
		}
		lblIdentification.html('<strong class="text-red">*</strong> Cedula')
	})
})