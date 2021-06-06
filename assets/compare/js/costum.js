$(document).ready(function(){
    // Start jQuery click function to view Bootstrap modal when view info button is clicked
    
    $('#prod_detail').click(function(){
        $('#allProduct').html(" ");
           
           $.ajax({
               url:"shop/compare/getProduct",
               method: "POST",
               contentType: "json", 
               dataType:"JSON",
               success:function(data)
               {
                    for (i = 0; i < data.length; i++) {
                        
                        var name=data[i][0].product_description;
                        var pic=data[i][0].product_pic;
                        var cat=data[i][0].catagory;
                        var id=data[i][0].product_id;
                            var div= ['<div class="col-md-4" style="margin-bottom: 20px; "> ',
                                '<figure class="card card-product text-center" ',
                                '<div class="img-wrap">',
                                    '<a>',
                                    '   <img height="200" width="200" src="http://localhost/fyp/uploads/product/'+pic+'" > ',
                                        '<figcaption class="info-wrap">',
                                        ' <h2  class="title">'+name+'</h2>',
                                        ' <h2  class="desc">'+cat+'</h2>',
                                        '<button type="button" class="btn btn-info btn-sm selectedProduct" value="'+id+'" >Select</button>',
                                        '</a>',
                                        '</figcaption>',
                                        '</div>',
                                    
                                        '</figure>',
                                        '</div>'].join(' ');
                                        $("#allProduct").append(div);
                        }
               },
               error: function(xhr, status, error) {
                console.log(error);
                }
           });
           $('#selectproduct').modal('show');
        
    });
    $('#item_detail1').click(function(){
        $('#allProduct').html(" ");
        var proID=$(this).val();
        if (typeof attr !== typeof undefined && attr !== false) {
            alert('Please Add a Product');
        }
        $.ajax({
            url:"shop/compare/getItem",
            method: "POST",
            ContentType: 'application/json',
            data: {"proID": proID},
            success:function(item)
            {   
                var ara=JSON.parse(item);
                ara.forEach(element => {
                   var itemname=element.stock_des;
                     var itempic=element.stock_pic;
                     var itemid=element.stock_id;
                     var itemprice=element.stock_price;
                     var div = [
                            '<div class="col-md-4">',
                           '  <figure class="card card-product"  ',
                                 '<div class="img-wrap" >',
                                     ' <a name="lnkViews"> ',
                                        '<img height="200" width="200" src="http://localhost/fyp/uploads/stock/'+itempic+' " > ',
                                        '<figcaption class="info-wrap">',
                                        '<h2  class="title">'+itemname+'</h2>',
                                        '<h2  class="title">RS: '+itemprice+'</h2>',
                                        '<button type="button" class="btn btn-info btn-sm selectedItem1" value="'+itemid+'" >Select</button>',
                                        '</a>',
                                 '</figcaption>',
                                 '</div>',
                                 
                             '</figure>',
                         '</div>'
                     ].join(' ');
                     $('#allProduct').append(div);
                });
            },
            error: function(xhr, status, error) {
             console.log(error);
             }
             
        });
        $('#selectproduct').modal('show');
        
     
    });
    $('#item_detail2').click(function(){
        $('#allProduct').html(" ");
        var proID=$(this).val();
        $.ajax({
            url:"shop/compare/getItem",
            method: "POST",
            ContentType: 'application/json',
            data: {"proID": proID},
            success:function(item)
            {   
                var ara=JSON.parse(item);
                ara.forEach(element => {
                   var itemname=element.stock_des;
                     var itempic=element.stock_pic;
                     var itemid=element.stock_id;
                     var itemprice=element.stock_price;
                     var div = [
                            '<div class="col-md-4">',
                           '  <figure class="card card-product"  ',
                                 '<div class="img-wrap" >',
                                     ' <a name="lnkViews"> ',
                                        '<img height="200" width="200" src="http://localhost/fyp/uploads/stock/'+itempic+' " > ',
                                        '<figcaption class="info-wrap">',
                                        '<h2  class="title">'+itemname+'</h2>',
                                        '<h2  class="title">RS: '+itemprice+'</h2>',
                                        
                                        '<button type="button" class="btn btn-info btn-sm selectedItem2" value="'+itemid+'" >Select</button>',
                                        '</a>',
                                 '</figcaption>',
                                 '</div>',
                                 
                             '</figure>',
                         '</div>'
                     ].join(' ');
                     $('#allProduct').append(div);
                });
            },
            error: function(xhr, status, error) {
             console.log(error);
             }
             
        });
        $('#selectproduct').modal('show');
        
     
    });
    $('#item_detail3').click(function(){
        $('#allProduct').html(" ");
        var proID=$(this).val();
        $.ajax({
            url:"shop/compare/getItem",
            method: "POST",
            ContentType: 'application/json',
            data: {"proID": proID},
            success:function(item)
            {   
                var ara=JSON.parse(item);
                ara.forEach(element => {
                   var itemname=element.stock_des;
                     var itempic=element.stock_pic;
                     var itemid=element.stock_id;
                     var itemprice=element.stock_price;
                     var div = [
                            '<div class="col-md-4">',
                           '  <figure class="card card-product"  ',
                                 '<div class="img-wrap" >',
                                     ' <a name="lnkViews"> ',
                                        '<img height="200" width="200" src="http://localhost/fyp/uploads/stock/'+itempic+' " > ',
                                        '<figcaption class="info-wrap">',
                                        '<h2  class="title">'+itemname+'</h2>',
                                        '<h2  class="title">RS: '+itemprice+'</h2>',
                                        '<button type="button" class="btn btn-info btn-sm selectedItem3" value="'+itemid+'" >Select</button>',
                                        '</a>',
                                 '</figcaption>',
                                 '</div>',
                                 
                             '</figure>',
                         '</div>'
                     ].join(' ');
                     $('#allProduct').append(div);
                });
            },
            error: function(xhr, status, error) {
             console.log(error);
             }
             
        });
        $('#selectproduct').modal('show');
        
     
    });
    $('#allProduct').on('click','.selectedProduct',function(){
        $('#attrlist').html(" ");
        event.preventDefault();
        var proID = $(this).attr('value');
        
        $.ajax({
            url:'shop/compareProductMeta',
            method: "POST",
            ContentType: 'application/json',
            data: {"proId": proID},
            success:function(data)
            {   
                $('#selectproduct').modal('hide');
                //parse it first
                const arr = JSON.parse(data);
                $('#item_detail1').val(proID);
                $('#item_detail2').val(proID);
                $('#item_detail3').val(proID);
                //map names to the array
                const names = arr.map(obj => obj.name);
                const pic = arr.map(obj => obj.product_pic);
                
                $('#propic').html(' ');
                $('#propic').append('<img src="http://localhost/fyp/uploads/product/'+pic[0]+'." height="200" width="200">');
                for (i = 0; i < names.length; i++) {
                    $('#attrlist').append('<li>'+names[i]+'</li>');
                    
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
             }
             
        });
        
    });
    $('#allProduct').on('click','.selectedItem1',function(){
        event.preventDefault();
        var itemID = $(this).attr('value');
        var parent=$(this).closest('div').attr('id');       
        $.ajax({
            url:'shop/compareStocktMeta',
            method: "POST",
            ContentType: 'application/json',
            data: {"itemId": itemID},
            success:function(data)
            {   
                $('#selectproduct').modal('hide');
                const arr = JSON.parse(data);
                const pics = arr.map(obj => obj.stock_pic);
                $('#picbox1').html(" ");
                $('#picbox1').append('<img src="http://localhost/fyp/uploads/stock/'+pics[0]+'." height="200" width="200">');
                //map names to the array
                const names = arr.map(obj => obj.value);
                for (i = 0; i < names.length; i++) {
                    $('#valuelist1').append('<li>'+names[i]+'</li>');
                    
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
             }
             
        });
        
    });
    $('#allProduct').on('click','.selectedItem2',function(){
        event.preventDefault();
        var itemID = $(this).attr('value');
        var parent=$(this).closest('div').attr('id');       
        $.ajax({
            url:'shop/compareStocktMeta',
            method: "POST",
            ContentType: 'application/json',
            data: {"itemId": itemID},
            success:function(data)
            {   
                $('#selectproduct').modal('hide');
                const arr = JSON.parse(data);
                const pics = arr.map(obj => obj.stock_pic);
                var lastid=$('#comparecontainer').children().last().attr('id');
                $('#picbox2').html(" ");
                $('#picbox2').append('<img src="http://localhost/fyp/uploads/stock/'+pics[0]+'." height="200" width="200">');
                //map names to the array
                const names = arr.map(obj => obj.value);
                for (i = 0; i < names.length; i++) {
                    $('#valuelist2').append('<li>'+names[i]+'</li>');
                    
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
             }
             
        });
        
    });
    $('#allProduct').on('click','.selectedItem3',function(){
        event.preventDefault();
        var itemID = $(this).attr('value');      
        $.ajax({
            url:'shop/compareStocktMeta',
            method: "POST",
            ContentType: 'application/json',
            data: {"itemId": itemID},
            success:function(data)
            {   
                $('#selectproduct').modal('hide');
                const arr = JSON.parse(data);
                const pics = arr.map(obj => obj.stock_pic);
                $('#picbox3').html(" ");
                $('#picbox3').append('<img src="http://localhost/fyp/uploads/stock/'+pics[0]+'." height="200" width="200">');
                //map names to the array
                const names = arr.map(obj => obj.value);
                for (i = 0; i < names.length; i++) {
                    $('#valuelist3').append('<li>'+names[i]+'</li>');
                    
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
             }
             
        });
        
    });
    
    uniqueId=1;
    $('#additem').click(function () {
        var copy = $("#NewForm").clone(true);
         var formId = 'NewForm' + uniqueId;
         copy.attr('id', formId );
         
         $('#comparecontainer').append(copy);
         $('#' + formId).find('input,select').each(function(){
            $(this).attr('id', $(this).attr('id') + uniqueId);

         });
         uniqueId++;

    });
    $('#removeitem').click(function(){
        $('#comparecontainer > #item:last').remove();
    });
 
}); 