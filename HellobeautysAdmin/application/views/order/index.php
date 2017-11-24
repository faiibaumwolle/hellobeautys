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
                        <th style="width:20%">Order#</th>
                        <th style="width:21%">Name</th>
                        <th style="width:19%">Payment Status</th>
                        <th style="width:19%">Shipment Status</th>
                        <th style="width:20%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($order as $key => $value) { ?>
                      <tr class="order-<?=(ceil(($key + 1) / 10))?>">
                        <td class="v-align-middle">
                          <div class="checkbox ">
                            <input type="checkbox" value="<?=$value->id?>" id="checkbox<?=$value->id?>">
                            <label for="checkbox<?=$value->id?>"></label>
                          </div>
                        </td>
                        <td class="v-align-middle ">
                          <p><?=$value->reference?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->name . " " .$value->surname?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->payment_status_display?></p>
                        </td>
                        <td class="v-align-middle">
                          <p><?=$value->shipment_status_display?></p>
                        </td>
                        <td>
                            <button onclick="window.location='<?=index_url()?>order/<?=$value->id?>'" type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            <button onclick="if(window.confirm('ต้องการที่จะลบ Order?')){window.location='<?=index_url()?>order_delete/<?=$value->id?>'}" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
                          </button>
                            </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                 <?php for($i = 1; $i <= ceil(count($order) / 10); $i++){ ?>
                 <button type="button" id="page-order-<?=$i?>" class="btn btn-default" onclick="hideTable('<?=$i?>')"><?=$i?></button>
                 <?php } ?>
              </div>
            </div>
            <!-- END PANEL --> 
              
            <script>
                $("#order").addClass("bg-success");
                hideTable(1);
                function hideTable(id){
                    $("tr[class^='order-']").hide();
                    $("[id^='page-order-']").removeClass("active");
                    $(".order-" + id).show();
                    $("#page-order-" + id).addClass("active");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            </script>        