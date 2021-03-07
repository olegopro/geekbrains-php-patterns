jQuery(document).ready(function ($) {


	const formNamePhone = $('#feedback_name_phone');
	const feedbackNamePhoneInput = $('#feedback_name_phone input')
	const submitFeedback = $('#submit-feedback')
	const submitFeedbackSpan = $('#submit-feedback span')

	// Сброс значений полей
	feedbackNamePhoneInput.on('blur', function () {
		feedbackNamePhoneInput.removeClass('error-popup-input');

		submitFeedbackSpan.text('Отправить сообщение')
		submitFeedback.attr("disabled", false);
	});

	feedbackNamePhoneInput.keypress(function(event) {
		feedbackNamePhoneInput.removeClass('error-popup-input');
		submitFeedbackSpan.text('Отправить сообщение');
	});


	// Отправка значений полей
	var options = {
		url: feedback_object.url,
		data: {
			action: 'feedback_action',
			nonce: feedback_object.nonce
		},
		type: 'POST',
		dataType: 'json',
		beforeSubmit: function (xhr) {
			// При отправке формы меняем надпись на кнопке
			if(($('[name="art_name"]').val().length && $('[name="art_tel"]').val().length) > 0) {
				submitFeedback.attr("disabled", true);
				submitFeedbackSpan.text('Отправляем...')
			}
		},
		success: function (request, xhr, status, error) {

			if (request.success === true) {
				// Если все поля заполнены, отправляем данные и меняем надпись на кнопке
				// add_form.after('<div class="message-success">' + request.data + '</div>')
				submitFeedbackSpan.text('Ждите, мы звоним');

				// При успешной отправке сбрасываем значения полей
				$('#feedback_name_phone')[0].reset();
			} else {
				// Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
				$.each(request.data, function (key, val) {
					$('.art_' + key).addClass('error-popup-input');
					// $('.art_' + key).before('<span class="error-' + key + '">' + val + '</span>');
				});


				if((!$('[name="art_name"]').val().length && !$('[name="art_tel"]').val().length)) {
					submitFeedbackSpan.text('Заполните поля...')
					submitFeedback.attr("disabled", true);
				} else if(!$('[name="art_name"]').val().length) {
					submitFeedbackSpan.text('Заполните имя...')
					submitFeedback.attr("disabled", true);
				} else if (!$('[name="art_tel"]').val().length){
					submitFeedbackSpan.text('Заполните телефон...')
					submitFeedback.attr("disabled", true);
				}

			}

		},
		error: function (request, status, error) {
			submitFeedbackSpan.text('Что-то пошло не так...');
		},

	};
	// Отправка формы
	formNamePhone.ajaxForm(options);




	const formRequest = $('#feedback_request');
	const feedbackRequestInput = $('#feedback_request input')
	const submitFeedbackRequest = $('#submit-feedback-request')
	const submitFeedbackRequestSpan = $('#submit-feedback-request span')


	// Сброс значений полей
	feedbackRequestInput.on('blur', function () {
		feedbackRequestInput.removeClass('error-popup-input');

		submitFeedbackRequestSpan.text('Отправить заявку')
		submitFeedbackRequest.attr("disabled", false);
	});

	feedbackRequestInput.keypress(function(event) {
		feedbackRequestInput.removeClass('error-popup-input');
		submitFeedbackRequestSpan.text('Отправить заявку');
	})




	// Отправка значений полей
	var options = {
		url: feedback_object.url,
		data: {
			action: 'feedback_action_request',
			nonce: feedback_object.nonce
		},
		type: 'POST',
		dataType: 'json',
		beforeSubmit: function (xhr) {
			// При отправке формы меняем надпись на кнопке
			if(($('[name="art_name_request"]').val().length && $('[name="art_tel_request"]').val().length) > 0) {
				submitFeedbackRequest.attr("disabled", true);
				submitFeedbackRequestSpan.text('Отправляем...')
			}
		},
		success: function (request, xhr, status, error) {

			if (request.success === true) {
				// Если все поля заполнены, отправляем данные и меняем надпись на кнопке
				// formRequest.after('<div class="message-success">' + request.data + '</div>')
				submitFeedbackRequestSpan.text('Ждите, мы звоним');

				// При успешной отправке сбрасываем значения полей
				$('#feedback_request')[0].reset();
			} else {
				// Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
				$.each(request.data, function (key, val) {
					$('.art_' + key + '_request').addClass('error-popup-input');
				});

				if((!$('[name="art_name_request"]').val().length && !$('[name="art_tel_request"]').val().length)) {
					submitFeedbackRequestSpan.text('Заполните поля...')
					submitFeedbackRequest.attr("disabled", true);
				} else if(!$('[name="art_name_request"]').val().length) {
					submitFeedbackRequestSpan.text('Заполните имя...')
					submitFeedbackRequest.attr("disabled", true);
				} else if (!$('[name="art_tel_request"]').val().length){
					submitFeedbackRequestSpan.text('Заполните телефон...')
					submitFeedbackRequest.attr("disabled", true);
				}

			}

		},
		error: function (request, status, error) {
			submitFeedbackRequestSpan.text('Что-то пошло не так...');
		}


	};
	// Отправка формы
	formRequest.ajaxForm(options);


	const formPhone = $('#feedback_phone')
	const feedbackPhoneInput = $('#feedback_phone input')
	const submitPhone = $('#submit-phone')
	const submitPhoneSpan = $('#submit-phone span')

	// Сброс значений полей
	feedbackPhoneInput.on('blur', function () {
		feedbackPhoneInput.removeClass('error-popup-input');
		submitPhoneSpan.text('Перезвоните мне')
		submitPhone.attr("disabled", false);
	});

	feedbackPhoneInput.keypress(function(event) {
		feedbackPhoneInput.removeClass('error-popup-input');
		submitPhoneSpan.text('Перезвоните мне');
	});

	// Отправка значений полей
	var options = {
		url: feedback_object.url,
		data: {
			action: 'feedback_action_phone',
			nonce: feedback_object.nonce
		},
		type: 'POST',
		dataType: 'json',
		beforeSubmit: function (xhr) {
			// При отправке формы меняем надпись на кнопке
			if($('[name="art_tel_phone"]').val().length) {
				submitPhone.attr("disabled", true)
				submitPhoneSpan.text('Отправляем...')
			}
		},
		success: function (request, xhr, status, error) {

			if (request.success === true) {
				// Если все поля заполнены, отправляем данные и меняем надпись на кнопке
				// formRequest.after('<div class="message-success">' + request.data + '</div>')
				submitPhoneSpan.text('Ждите, мы звоним');

				// При успешной отправке сбрасываем значения полей
				$('#feedback_phone')[0].reset();
			} else {
				// Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
				$.each(request.data, function (key, val) {
					$('.art_' + key + '_phone').addClass('error-popup-input');

				});

				submitPhoneSpan.text('Заполните поле...')
				submitPhone.attr("disabled", true);
			}

		},
		error: function (request, status, error) {
			submitPhone.text('Что-то пошло не так...');
		},

	};
	// Отправка формы
	formPhone.ajaxForm(options);



	const formQuestionSidebar = $('#feedback_question_sidebar')
	const feedbackQuestionSidebarInput = $('#feedback_question_sidebar input, #feedback_question_sidebar textarea')
	const submitQuestionSidebar = $('#submit-question-sidebar')
	const submitQuestionSidebarSpan = $('#submit-question-sidebar span')

	// Сброс значений полей
	feedbackQuestionSidebarInput.on('blur', function () {
		feedbackQuestionSidebarInput.removeClass('error-popup-input');
		submitQuestionSidebarSpan.text('Перезвоните мне')
		submitQuestionSidebar.attr("disabled", false);
	});

	feedbackQuestionSidebarInput.keypress(function(event) {
		feedbackQuestionSidebarInput.removeClass('error-popup-input');
		submitQuestionSidebarSpan.text('Перезвоните мне');
	});

	// Отправка значений полей
	var options = {
		url: feedback_object.url,
		data: {
			action: 'feedback_action_question_sidebar',
			nonce: feedback_object.nonce
		},
		type: 'POST',
		dataType: 'json',
		beforeSubmit: function (xhr) {
			// При отправке формы меняем надпись на кнопке
			if(
				($('[name="art_tel_question_sidebar"]').val().length) && ($('[name="art_name_question_sidebar"]').val().length)

			) {
				submitQuestionSidebar.attr("disabled", true)
				submitQuestionSidebarSpan.text('Отправляем...')
			}
		},
		success: function (request, xhr, status, error) {

			if (request.success === true) {
				// Если все поля заполнены, отправляем данные и меняем надпись на кнопке
				// formRequest.after('<div class="message-success">' + request.data + '</div>')
				submitQuestionSidebarSpan.text('Ждите, мы звоним');

				// При успешной отправке сбрасываем значения полей
				$('#feedback_question_sidebar')[0].reset();
			} else {
				// Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
				$.each(request.data, function (key, val) {
					$('.art_' + key + '_question_sidebar').addClass('error-popup-input');

				});

				submitQuestionSidebarSpan.text('Заполните поля...')
				submitQuestionSidebar.attr("disabled", true);
			}

		},
		error: function (request, status, error) {
			submitQuestionSidebarSpan.text('Что-то пошло не так...');
		},

	};
	// Отправка формы
	formQuestionSidebar.ajaxForm(options);


	const formQuestionContacts = $('#feedback_question_contacts')
	const feedbackQuestionContactsInput = $('#feedback_question_contacts input, #feedback_question_contacts textarea')
	const submitQuestionContacts = $('#submit-question-contacts')
	const submitQuestionContactsSpan = $('#submit-question-contacts span')

	// Сброс значений полей
	feedbackQuestionContactsInput.on('blur', function () {
		feedbackQuestionContactsInput.removeClass('error-popup-input');
		submitQuestionContactsSpan.text('Отправить сообщение')
		submitQuestionContacts.attr("disabled", false);
	});

	feedbackQuestionContactsInput.keypress(function(event) {
		feedbackQuestionContactsInput.removeClass('error-popup-input');
		submitQuestionContactsSpan.text('Отправить сообщение');
	});

	// Отправка значений полей
	var options = {
		url: feedback_object.url,
		data: {
			action: 'feedback_action_question_contacts',
			nonce: feedback_object.nonce
		},
		type: 'POST',
		dataType: 'json',
		beforeSubmit: function (xhr) {
			// При отправке формы меняем надпись на кнопке
			if(
				($('[name="art_tel_question_contacts"]').val().length) && ($('[name="art_name_question_contacts"]').val().length) && ($('[name="art_message_question_contacts"]').val().length)

			) {
				submitQuestionContacts.attr("disabled", true)
				submitQuestionContactsSpan.text('Отправляем...')
			}
		},
		success: function (request, xhr, status, error) {

			if (request.success === true) {
				// Если все поля заполнены, отправляем данные и меняем надпись на кнопке
				// formRequest.after('<div class="message-success">' + request.data + '</div>')
				submitQuestionContactsSpan.text('Ждите, мы звоним');

				// При успешной отправке сбрасываем значения полей
				$('#feedback_question_contacts')[0].reset();
			} else {
				// Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
				$.each(request.data, function (key, val) {
					$('.art_' + key + '_question_contacts').addClass('error-popup-input');

				});

				submitQuestionContactsSpan.text('Заполните поля...')
				submitQuestionContacts.attr("disabled", true);
			}

		},
		error: function (request, status, error) {
			submitQuestionContactsSpan.text('Что-то пошло не так...');
		},

	};
	// Отправка формы
	formQuestionContacts.ajaxForm(options);


});
