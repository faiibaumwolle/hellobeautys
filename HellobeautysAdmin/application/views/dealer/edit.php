
                    <form action="<?=index_url()?>dealer/<?=$dealer->id?>" id="dealer_form" method="POST" class="" role="form">
                      <div class="form-group form-group-default required">
                        <label>Shop</label>
                        <input type="text" name="shop" value="<?=$dealer->shop?>" class="form-control" required="">
                      </div>
                      <div class="form-group form-group-default required">
                        <label>Address</label>
                        <input type="text" name="address" value="<?=$dealer->address?>" class="form-control" required="">
                      </div>
                      <div class="form-group form-group-default required">
                        <label>telephone</label>
                        <input type="text" name="telephone" value="<?=$dealer->telephone?>" class="form-control" required="">
                      </div>
                      <div class="form-group form-group-default required">
                        <div class="form-group ">
                        <label class="">จังหวัด</label>
                        <select name="province" class="full-width" data-init-plugin="select2">
                            <?php foreach ($dealerprovince as $province) { ?>
                            <option <?=($province->id == $dealer->province_id)?"selected":""?> value="<?=$province->id?>"><?=$province->province?></option>
                            <?php } ?>
                        </select>
                      </div>
                      </div>
                    </form>
                    <button class="btn btn-default btn-cons" onclick="back()">
                         <i class="fa fa-backward" aria-hidden="true"></i> Back
                    </button>
                    <button class="btn btn-success btn-cons" onclick="submit()">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                    </button>

    <script>
      $("#dealer").addClass("bg-success");
      function submit(){
          $("#dealer_form").submit();
      }
      function back(){
          window.location = '<?=index_url()?>dealer';
      }
    </script> 