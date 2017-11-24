            <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="basicTable">
                    <thead>
                      <tr>
                        <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
											Comman Practice Followed
											-->
                        <th style="width:1%">
<!--                          <button class="btn"><i class="pg-trash"></i>
                          </button>-->
                        </th>
                        <th style="width:20%">ร้านค้า</th>
                        <th style="width:29%">ที่อยู่</th>
                        <th style="width:15%">จังหวัด</th>
                        <th style="width:15%">เบอร์ติดต่อ</th>
                        <th style="width:20%">
                            <button class="btn btn-default btn-cons" onclick="window.location='<?=index_url()?>dealer_add'">
                                <i class="fa fa-user-plus" aria-hidden="true"></i> เพิ่ม Dealer
                            </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($dealer as $key => $value) { ?>
                      <tr class="dealer-<?=(ceil(($key + 1) / 10))?>">
                        <td class="v-align-middle">
                          <div class="checkbox ">
                            <input type="checkbox" value="<?=$value->id?>" id="checkbox<?=$value->id?>">
                            <label for="checkbox<?=$value->id?>"></label>
                          </div>
                        </td>
                        <td class="v-align-middle ">
                          <p><?=$value->shop?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->address?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->province?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->telephone?></p>
                        </td>
                        <td>
                            <button onclick="window.location='<?=index_url()?>dealer/<?=$value->id?>'" type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            <button onclick="if(window.confirm('ต้องการที่จะลบ Dealer?')){window.location='<?=index_url()?>dealer_delete/<?=$value->id?>'}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
                          </button>
                            </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                 <?php for($i = 1; $i <= ceil(count($dealer) / 10); $i++){ ?>
                 <button type="button" id="page-dealer-<?=$i?>" class="btn btn-default" onclick="hideTable('<?=$i?>')"><?=$i?></button>
                 <?php } ?>
              </div>
            </div>
            <!-- END PANEL --> 
              
            <script>
                $("#dealer").addClass("bg-success");
                hideTable(1);
                function hideTable(id){
                    $("tr[class^='dealer-']").hide();
                    $("[id^='page-dealer-']").removeClass("active");
                    $(".dealer-" + id).show();
                    $("#page-dealer-" + id).addClass("active");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            </script>        