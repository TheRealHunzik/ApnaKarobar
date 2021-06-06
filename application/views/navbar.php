                <!-- *** NAVBAR ***
    _________________________________________________________ -->

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">

        <div class="container">
            <div class="navbar-header">

                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <a class="navbar-brand home" href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>assets/img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Apna Karobar</span>
                        </a>
                    </div>
                    <div class="col-sm-10 col-md-10 ">
                        <form class="navbar-form" action="<?php echo base_url().'search/'; ?>" role="search" >
                            <div class="row">
                                
                                    <div class="col-md-8" style="padding-right:0px;">
                                        <input type="text" height="40" size="200" class="form-control" placeholder="Search" name="searchAll" id="searchAll">
                                    </div>    
                                    <div class="col-md-2" style="padding-left:0px;">
                                        <button type="submit"   class="btn btn-primary" ><i class="fa fa-search"></i>SEARCH</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *** NAVBAR END *** -->

</header>
<script>  
 $(document).ready(function(){ 
    $("#searchAll").autocomplete({
    source: "/search_suggestions",
    autoFocus: true,
    select: function(event, ui) {
                    $(event.target).val(ui.item.value);
                    $('#searchform').submit();
                    return false;
                }
    });
 });  
 </script>  
<!-- *** LOGIN MODAL ***
_________________________________________________________ -->

