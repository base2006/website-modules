$(function() {
    // Set up an event listener for the contact form.
    $('form').submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

        resetErrors();

        // Serialize the form data.
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        // Submit the form using AJAX.
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: $('form').attr('action'),
            data: {
				name: name,
				email: email,
				message: message,
				captcha: grecaptcha.getResponse()
			}
        })
        .done(function(response) {
            $('input[type="text"], textarea, .g-recaptcha').parent().addClass('has-success');
            $.each(response, function(i, v) {
                console.log(i + ' => ' + v);
                var msg = '<div class="form-control-feedback">' + v + '</div>';
                $('input[name="' + i + '"], textarea[name="' + i + '"]').parent().removeClass('has-success');
                $('input[name="' + i + '"], textarea[name="' + i + '"]').parent().addClass('has-danger');
                $('input[name="' + i + '"], textarea[name="' + i + '"]').after(msg);
				if (i == 'recaptcha') {
					$('.g-recaptcha').parent().removeClass('has-success');
					$('.g-recaptcha').parent().addClass('has-danger');
					$('.g-recaptcha').after(msg);
				}
            });

            if (response.success) {
                $('#form-messages').addClass('alert-success').text(response.success)
                $('.form-group, input[type="submit"]').remove();
            } else if (response.error) {
				$('#form-messages').addClass('alert-danger').text(response.error)
                $('.form-group, input[type="submit"]').remove();
            }
        })
        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
            $('#form-messages').removeClass('alert-success');
            $('#form-messages').addClass('alert-danger');
            $('#form-messages').text(msg);
        });
    });
});

function resetErrors() {
    $('form input, form textarea').parent().removeClass('has-danger').removeClass('has-success');
    $('div.form-control-feedback').remove();
}
