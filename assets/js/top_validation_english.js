$(document).ready(function() {
	"use strict";

	App.init(); // Init layout and core plugins
	Plugins.init(); // Init all plugins
	FormComponents.init(); // Init all form-specific plugins

	$.extend($.validator.defaults, {
		invalidHandler: function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
				? 'You missed 1 field. It can not be left blank.'
				: 'You missed ' + errors + ' fields. They can not be left blank';
				noty({
					text: message,
					type: 'error',
					timeout: 2000
				});
			}
		}
	});
});