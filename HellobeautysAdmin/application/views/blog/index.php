            <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="basicTable">
                    <thead>
                      <tr>
                        <th style="width:1%">
<!--                          <button class="btn"><i class="pg-trash"></i>
                          </button>-->
                        </th>
                        <th style="width:79%">Name</th>
                        <th style="width:20%">
                            <button class="btn btn-default btn-cons" onclick="window.location='<?=index_url()?>blog_add'">
                                <i class="fa fa-plus" aria-hidden="true"></i>  เพิ่ม Blog
                            </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($blog as $key => $value) { ?>
                      <tr class="dealer-<?=(ceil(($key + 1) / 10))?>">
                        <td class="v-align-middle">
                          <div class="checkbox ">
                            <input type="checkbox" value="<?=$value->id?>" id="checkbox<?=$value->id?>">
                            <label for="checkbox<?=$value->id?>"></label>
                          </div>
                        </td>
                        <td class="v-align-middle ">
                          <p><?=$value->name?></p>
                        </td>
                        <td>
                            <button onclick="window.location='<?=index_url()?>blog/<?=$value->id?>'" type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            <button onclick="if(window.confirm('ต้องการที่จะลบ Blog?')){window.location='<?=index_url()?>blog_delete/<?=$value->id?>'}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
                          </button>
                            </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                 <?php for($i = 1; $i <= ceil(count($blog) / 10); $i++){ ?>
                 <button type="button" id="page-dealer-<?=$i?>" class="btn btn-default" onclick="hideTable('<?=$i?>')"><?=$i?></button>
                 <?php } ?>
              </div>
            </div>
            <!-- END PANEL --> 
              
            <script>
                $("#blog").addClass("bg-success");
                hideTable(1);
                function hideTable(id){
                    $("tr[class^='dealer-']").hide();
                    $("[id^='page-dealer-']").removeClass("active");
                    $(".dealer-" + id).show();
                    $("#page-dealer-" + id).addClass("active");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            </script>        