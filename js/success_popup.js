@if (\Session::has('success'))
	$.sweetModal({
			content: 'Thank you.',
			title: '<?php echo (\Session::get('success')) ?>',
			icon: $.sweetModal.ICON_SUCCESS,
		theme: $.sweetModal.THEME_DARK,
			buttons: {
				'That\'s fine': {
					classes: 'greenB'
				}
			}
		});  
@endif