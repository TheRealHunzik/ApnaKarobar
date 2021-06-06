$(document).ready(function(){
    $('#orderTable').on('click','.orderID',function(){
          var id=$(this).val();
          $('#viewOrder').modal('show');
          $('#picbox').html('');
          $('#siteName').html('');
          $('#orderName').html('');
          $('#ordertContact').html('');
          $('#orderAddress').html('');
          $('#orderDate').html('');
          $('#orderstatus').html('');
          $("#rowItems").html('');
          $('#track').html('');
          $('#print').html('');
              
          
      $.ajax({
          url: 'shop/getOrderByID',
          type: 'POST',
          data: {
              orderID: id
          },
          dataType: 'json', 
          success: function(data) {
            var details=data['orderDetails'];
            var items=data['orderItems'];
            console.log(items);
            details.forEach(element => {
              $('#picbox').prepend('<img height="200" width="200" src="http://localhost/fyp/uploads/logos/'+element.site_logo+'" />');
              $('#siteName').html(element.site_title);
              $('#orderName').html(element.user_name);
              $('#ordertContact').html(element.user_phone);
              $('#orderAddress').html(element.order_addtress);
              $('#orderDate').html(element.order_date);
              $('#orderstatus').html(element.status);
              if(element.status=='dispatched'){
                $('#track').append('<button onclick="" class="btn btn-success"><i class="fas fa-map-marker-alt"></i>Track Order</button>');
              }
              $('#print').append('<button onclick="print_slip();" class="btn btn-primary"> <i class="fa fa-print"></i> Print</button>');
              
            });
            var id=1;
            items.forEach(element => {
               
              var name=element.stock_des;
              var price=element.stock_price;
              var amount=element.amount;
              var quantity=element.quantity;
              var row= [
                '<tr>',
                  '<td>'+id+'</td>',
                  '<td>'+name+'</td>',
                  '<td>'+price+'</td>',
                  '<td>'+quantity+'</td>',
                  '<td>'+amount+'</td>',
                '</tr>'
              ].join(' ');
              $("#rowItems").append(row);
              id=parseInt(id)+1;
            });
            
            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(errorThrown);
          }

      }); 
      
});
    // Start jQuery click function to view Bootstrap modal when view info button is clicked
}); 

function print_slip() {
    $('#print').html(' ');
    $('#track').html(' ');
    window.print();
}
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
 
function showPosition(position) {
    document.getElementById("latitude").value=position.coords.latitude;
    document.getElementById("longitude").value=position.coords.longitude;
    
}
var form = $("#example-advanced-form").show();
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18)
        {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
        {
            form.steps("next");
        }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3)
        {
            form.steps("previous");
        }
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        alert("Submitted!");
    }
}).validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password-2"
        }
    }
});


document.getElementById('button').addEventListener(click,function(){
    document.querySelector('.bg-modal').style.display="flex";
});
document.querySelector('.close').addEventListener('click',function(){
    document.querySelector('.bg-modal').style.display='none';
});

