
           
            
            <form action="<?=index_url()?>review_add" id="blog_form" enctype="multipart/form-data" method="post" class="" >
                <div class="form-group form-group-default required">
                    <label>หัวข้อ</label>
                    <input type="text" name="name" class="form-control" required="">
                </div>
                    <div class="form-group form-group-default required">
                     <label>Reference URL</label>
                     <input type="text" name="credit" class="form-control" required="">
                    </div>
                      <div class="image-upload">
                        <label class="control-label">Cover Photo</label>
                        <input id="image" name="image" type="file" multiple class="file-loading">
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
                            <h5>บทความ</h5>
                            <div class="summernote-wrapper">
                              <div class="subject" id="subject"></div>
                              <input type="hidden" name="text" id="subject_html" value=""/>
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
                $("#review").addClass("bg-success");
                $( document ).ready(function() {
                     $("#image").fileinput({
                            showUpload: false,
                            maxFileCount: 10,
                            mainClass: "input-group-lg"
                        });
                    $('#subject').summernote({
                        height: 200,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true,
                        fontNames: ['THSarabunNew', 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande']
                      });
                });
                function submit(){
                    $("#subject_html").val($("#subject").code());
                    $("#blog_form").submit();
                }
                function back(){
                    window.location = '<?=index_url()?>blog';
                }
            </script>

