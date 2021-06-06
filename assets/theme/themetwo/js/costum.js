$(document).ready(function(){
    $('.addToCart').click(function(){
        
        var itemID = $(this).attr('value');
        var quantity=1;
        $.ajax({
            url:'addToCart',
            method: "POST",
            ContentType: 'application/json',
            data: {"stock_id": itemID,"quantity": quantity},
            success:function(data)
            {   
                alert('successfully');
            },
            error: function(xhr, status, error) {
                console.log(error);
             }
             
        });
    });
    
});