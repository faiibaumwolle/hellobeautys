
                    <form action="<?=index_url()?>video/<?=$video->id?>" id="video_form" method="POST" class="" role="form">
                      <div class="form-group form-group-default required">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$video->name?>" required="">
                      </div>
                        <iframe width="420" height="315" src="<?=$video->source?>" frameborder="0" allowfullscreen></iframe>
                      <div class="form-group form-group-default required">
                        <label>Source</label>
                        <input type="text" name="source" class="form-control" value="<?=$video->source?>" required="">
                      </div>
                    </form>
                    <button class="btn btn-default btn-cons" onclick="back()">
                         <i class="fa fa-backward" aria-hidden="true"></i> Back
                    </button>
                    <button class="btn btn-success btn-cons" onclick="submit()">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                    </button>

    <script>
      $("#video").addClass("bg-success");
      function submit(){
          $("#video_form").submit();
      }
      function back(){
          window.location = '<?=index_url()?>video';
      }
    </script> 