<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery.js"></script>
        <script>
            $( document ).ready(function() {
            $.ajax({
              method: "GET",
              url: "https://api.instagram.com/v1/users/self/media/recent?access_token=425347733.1677ed0.603d15d7de6f485da027ca74251864da",
              dataType: "jsonp",
              jsonp: "callback",
              jsonpCallback: "jsonpcallback",
            })
            .done(function( response ) {
                if(response["meta"]["code"] == "200"){
                    for(i = 0; i < response["data"].length; i++){
                       
                            if(((i + 1) % 4) == 1){
                                $("#img-list").append("<br><div class='row img-row'></div>");
                            }
                            var html_tag = "<div class='col-md-3' style='text-align:center'><a target='_blank' href='"+response["data"][i]["link"]+"'><img class='img-thumbnail' src='"+response["data"][i]["images"]["thumbnail"]["url"]+"'/></a>";
//                            if(response["data"][i]["caption"] != null)
//                                html_tag += "<br/>"+response["data"][i]["caption"]["text"];
                            html_tag += "</div>";
                            $(".img-row:last").append(html_tag);
                    }
                }
            });
            });
        </script>
    </head>
    <body>
        <div class="row">
            <div class='col-md-2'></div>
            <div class='col-md-8'>
                <div class="row">
                    <!--left menu-->
                    <div class="col-md-3">
                        <br>
                        <br>
                        <div class="row visible-lg visible-md">
                            <div class="col-md-12">
                                <div class="row">
                                    <a href="http://line.me/ti/p/%40hellobeautys" target="_blank"><img src="images/menu-left-line.png" class="img-thumbnail" style=""></a>
                                </div>
                                <br>
                                <div class="row">
                                    <a href="index.php?page=howtoorder" target="_blank"><img src="images/menu-left-order.jpg" class="img-thumbnail" style=""></a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <!--content-->
                    <div class='col-md-9'>
                        <h3><b style="color: #FF5675;">HELLOBEAUTYS</b></h3>
                        <div class='col-md-12' id="img-list"></div>
                    </div>
                </div>
            </div>
            <div class='col-md-2'></div>
        </div>
    </body>
</html>
