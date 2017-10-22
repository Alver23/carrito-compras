$(function(){
  var formRegistroUsuario = $('#formRegistroUsuario')
  var url = formRegistroUsuario.attr('action')
  formRegistroUsuario.validate({
		rules: {
			confirm_password: {equalTo: '#password'}
		},
		messages: {
			confirm_password: {equalTo: 'Las contraseñas no coinciden'}
		},
    highlight: function (element) { // hightlight error inputs
      $(element).closest('.form-group').addClass('has-error') // set error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
      $(element).closest('.form-group').removeClass('has-error') // set error class to the control group
    },
    submitHandler: function (form) {
      $(form).ajaxSubmit({
        url: url,
        type: 'post',
        dataType: 'json',
        beforeSubmit: function (arr, $form, options) {
          $('#btnRegister').html('Cargando... ').attr('disabled', true)
          var divErrors = $('#msgRegistro')
          divErrors.hide()
        },
        success: function (obj, statusText, xhr, $form) {
          $('#btnRegister').html('Registrarse').removeAttr('disabled')
          var errors = (obj && obj.errors) || null
          var type = (obj && obj.type) || null
          var divErrors = $('#msgRegistro')
          if (type === 'error' && errors) {
            var errorsHTML = ''
            $.each(errors, function (i, val) {
              errorsHTML += "<p><strong>* " + val + "</strong></p>"
            })
            divErrors.append(errorsHTML).show()
          } else {
            divErrors.hide()
            window.location.href = obj.url
          }
        },
      })
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