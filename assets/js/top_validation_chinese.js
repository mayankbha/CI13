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
				? '你错过了1场。 它不能留空。'
				: '你错过了 ' + errors + ' 字段。 它们不能留空。';
				noty({
					text: message,
					type: 'error',
					timeout: 2000
				});
			}
		}
	});
});