
                    <form action="<?=index_url()?>category/<?=$category->id?>" id="category_form" method="POST" class="" role="form">
                      <div class="form-group form-group-default required">
                        <label>Name</label>
                        <input type="text" name="name" value="<?=$category->name?>" class="form-control" required="">
                      </div>
                    </form>
                    <button class="btn btn-default btn-cons" onclick="back()">
                         <i class="fa fa-backward" aria-hidden="true"></i> Back
                    </button>
                    <button class="btn btn-success btn-cons" onclick="submit()">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                    </button>

    <script>
      $("#category").addClass("bg-success");
      function submit(){
          $("#category_form").submit();
      }
      function back(){
          window.location = '<?=index_url()?>category';
      }
    </script> 