$(function () {
  var formLogin = $('#formLogin')
  var url = formLogin.attr('action')
  console.log(url)
  formLogin.validate({
    ignore: ['.ignore'],
    rules: {
      email: {required: true, email: true},
      password: {required: true}
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
          $('#buttonLogin').html('Cargando... ').attr('disabled', true)
          var divErrors = $('#div_message_errors')
          divErrors.hide()
        },
        success: function (obj, statusText, xhr, $form) {
          $('#buttonLogin').html('Iniciar Sesion').removeAttr('disabled')
          var errors = (obj && obj.errors) || null
          var type = (obj && obj.type) || null
          var divErrors = $('#div_message_errors')
          var div = $('#message_errors')
          div.html('')
          if (type === 'error' && errors) {
            var errorsHTML = ''
            $.each(errors, function (i, val) {
              errorsHTML += "<p><strong>* " + val + "</strong></p>"
            })
            div.append(errorsHTML)
            divErrors.show()
          } else {
            divErrors.hide()
            window.location.href = obj.url
          }
        },
      })
    }
  })
})