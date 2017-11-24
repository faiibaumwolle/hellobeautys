    <br/><br/><br/><br/>
    </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
      </div>


    <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    
    <script src="<?=asset_url();?>js/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?=asset_url();?>js/select2.min.js"></script>
    <script src="<?=asset_url();?>js/scripts.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/pages.min.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/summernote.min.js" type="text/javascript"></script>
    <script src="<?=asset_url();?>js/fileinput.min.js" type="text/javascript"></script>
    <script>
        function notify(order_id){
            $.ajax({
                 method: "GET",
                 url: '<?=index_url()?>order_notify/' + order_id
            })
            .done(function( response ) {
                $("#order_notify_" + order_id).removeClass("unread");
                if($(".unread").length == 0){
                    $(".bubble").remove();
                }
            });
        }
    </script>
  </body>
</html>