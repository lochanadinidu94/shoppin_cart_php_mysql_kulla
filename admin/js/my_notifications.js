function error(mess, time, postition){
			
		$.notify({
			// options
			
			message: mess
		},
		{
			// settings
			type: "danger",
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: postition,
				align: "right"
			},		
			z_index: 1031,
			delay: time,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		}
		);
	}
	
	function success(mess, time, postition){
		
		$.notify({
			// options
			
			message: mess
		},
		{
			// settings
			type: "success",
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: postition,
				align: "right"
			},		
			z_index: 1031,
			delay: time,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		}
		);
	}