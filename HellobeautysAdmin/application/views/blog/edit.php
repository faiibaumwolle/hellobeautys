
           
            
            <form action="<?=index_url()?>blog/<?=$blog->id?>" id="blog_form" method="POST" class="" role="form">
                <div class="form-group form-group-default required">
                    <label>หัวข้อ</label>
                    <input type="text" name="name" class="form-control" required="" value="<?=$blog->name?>">
                </div>
                    <div class="form-group form-group-default required">
                     <label>Reference URL</label>
                     <input type="text" name="credit" class="form-control" required="" value="<?=$blog->credit?>">
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
                $("#blog").addClass("bg-success");
                $( document ).ready(function() {
                    $('#subject').summernote({
                        height: 200,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true,
                        fontNames: ['THSarabunNew', 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande']
                      });
                    $('#subject').code('<?=$blog->text?>');
                });
                function submit(){
                    $("#subject_html").val($("#subject").code());
                    $("#blog_form").submit();
                }
                function back(){
                    window.location = '<?=index_url()?>blog';
                }
            </script>

