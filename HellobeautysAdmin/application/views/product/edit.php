                    <form action="<?=index_url()?>product/<?=$product->id?>" id="product_form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <div class="form-group form-group-default required">
                        <label>Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" required="" value="<?=$product->name?>">
                      </div>
                      <div class="form-group form-group-default required">
                        <div class="form-group">
                        <label class="">Product Category</label>
                        <select name="catagory" class="full-width" data-init-plugin="select2">
                            <?php foreach ($productcategory as $category) { ?>
                            <option <?=($category->id == $product->catagory)?"selected":""?> value="<?=$category->id?>"><?=$category->name?></option>
                            <?php } ?>
                        </select>
                        </div>
                      </div>
                      <div class="image-upload">
                        <label class="control-label">Product Image</label>
                        <p><img width="80" src="<?=frontend_url().$product->picture?>"/></p>
                        <input id="image" name="image" type="file" multiple class="file-loading">
                      </div>
                      <div class="image-upload">
                        <label class="control-label">Product Gallery</label>
                        <input id="img" name="img[]" type="file" multiple class="file-loading">
                      </div>
                      <div class="form-group form-group-default required">
                        <label>Price</label>
                        <input type="text" name="price" id="price" class="form-control" required="" value="<?=$product->price?>">
                      </div>
                      <div class="form-group form-group-default required">
                        <label>Discount Price</label>
                        <input type="text" name="discount_price" id="discount_price" class="form-control" required="" value="<?=$product->discount_price?>">
                      </div>
                      <div class="form-group form-group-default required">
                        <label>Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" required="" value="<?=$product->quantity?>">
                      </div>
                      <div class="form-group required">
                        <textarea rows="5" name="detail" class="form-control" id="name" placeholder="Detail" aria-invalid="false"><?=$product->detail?></textarea>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title"></div>
                            <div class="tools">
                              <a class="collapse" href="javascript:;"></a>
                              <a class="config" data-toggle="modal" href="#grid-config"></a>
                              <a class="reload" href="javascript:;"></a>
                              <a class="remove" href="javascript:;"></a>
                            </div>
                          </div>
                          <div class="panel-body no-scroll ">
                            <h5>More Detail</h5>
                            <div class="summernote-wrapper">
                              <div class="moredetail" id="moredetail"></div>
                              <input type="hidden" name="moredetail" id="moredetail_html" value=""/>
                            </div>
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
      $("#product").addClass("bg-success");
      $( document ).ready(function() {
                    $('#moredetail').summernote({
                        height: 200,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true,
                        fontNames: ['THSarabunNew', 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande']
                      });
                      $('#moredetail').code('<?=$product->moredetail?>');
                      $("#image").fileinput({
                            showUpload: false,
                            maxFileCount: 10,
                            mainClass: "input-group-lg"
                        });
                        $("#img").fileinput({
                            showUpload: false,
                            maxFileCount: 10,
                            mainClass: "input-group-lg"
                        });
      });
      function submit(){
          $("#moredetail_html").val($("#moredetail").code());
          var str = "";
          if(jQuery.trim($("#name").val()) == ""){
              str = "กรุณากรอกชื่อสินค้า";
          } else if(!$.isNumeric($("#price").val())){
              str = "กรุณากรอกราคาให้ถูกต้อง";
          } else if(!$.isNumeric($("#quantity").val())){
              str = "กรุณากรอกจำนวนสินค้าให้ถูกต้อง";
          }
          
          if(str == ""){
            $("#product_form").submit();
          } else {
              alert(str);
          }
      }
      function back(){
          window.location = '<?=index_url()?>product';
      }
    </script> 