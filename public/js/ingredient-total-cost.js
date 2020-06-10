$(document).ready(function(){
	$('#ingredient_id').change(function(e){
        var ingredientId = $(this).val();
        if(ingredientId.length)
        {
            $.ajax({
                url: CONFIG.url+'/ingredient-purchase/rate?ingredient_id='+ingredientId,
                data: {ingredient_id:ingredientId},
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#rate').val(data.rate);
                },
                error: function(data){
                    console.log(data);
                }
            })
        }
    });
    $('#rate,#quantity').on('input',function(e){
        var rate = $('#rate').val();
        var quantity = $('#quantity').val();
        if($.isNumeric(rate) && $.isNumeric(quantity))
        {
            $('#total_cost').val(rate*quantity);
        }
    });
});