jQuery(document).ready(function($) {
    var buildWrap = document.querySelector('.build-wrap'),
    fbOptions = {
      dataType: 'json',
      showActionButtons: false,
      formData: $('#formSavedData').val()
    };

  var formBuilder = $(buildWrap).formBuilder(fbOptions).data('formBuilder');

  $('#submit0btn').click(function() {
		$('#formSavedData').val(formBuilder.formData);
			
	$('input', $('.build-wrap')).removeAttr('required');
	$('textarea', $('.build-wrap')).removeAttr('required');
	$('select', $('.build-wrap')).removeAttr('required');
  });

});

