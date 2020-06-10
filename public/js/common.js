$(document).ready(function(e){
	$('.confirm-delete').on('submit',function(e){
		if(!confirm('Are you sure you want to delete this record'))
		{
			e.preventDefault();
		}
	});

	$('.datemask').mask('00-00-0000');
	$('.datemask').attr('placeholder','dd-mm-yyyy');

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
});