$(document).ready(function() {
  $('select').material_select();
});

/*product*/
$("#add").click(function(){
  var newRow = $('#myrow').clone();
  $('#repeat').append(newRow);
  $('#edit').wrap('<div class="theDiv" />');
    
});
$('#remove').click(function(){
          var divCount = $("#repeat").children("div[id=myrow]").length;
            while (divCount > 1) // comparing with 1 beacuse: It will keep default div and remove rest
            {
                $("#repeat").children("div[id=myrow]:last").remove();
                divCount--;
            }
});
// $(".dj").click(function(){
//   $(function(){
//     var $row = $('.myrow').clone();
//     $('#repeat').html($row);
//   });
// });
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imginp").change(function() {
  readURL(this);
});