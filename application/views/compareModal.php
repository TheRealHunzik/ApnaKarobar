<!-- Modal -->
<div id="selectproduct" class="modal fade"  role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal",><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
            <div class="container">
				<div class="row justify-content-center">
			                       
			                        <!--end of col-->
			                    </div>
        <div class="row" id="allProduct">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
        
    </div>
      

  </div>
</div>
<script>
$(document).ready(function(){
    // Start jQuery click function to view Bootstrap modal when view info button is clicked

    $('#additem').click(function () {
        $( "#item" ).clone().prependTo( "#comparecontainer" ); 
    });
    $('#removeitem').click(function(){
        $('#comparecontainer > #item:last').remove();
    });
 
}); 
</script>
