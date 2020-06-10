$(document).ready(function(){
    $('#add-ingredient').click(function(){
        $.ajax({
            url: CONFIG.url+'/soap/add-ingredient',
            success: function(data){
                // console.log(data);
                $('#ingredient-row').append(data);
            },
            error: function(data){
                // console.log(data);
            }
        });
    });

    $(document).on('click','.remove-ingredient',function(){
        $(this).parents('tr').remove();
    })
});