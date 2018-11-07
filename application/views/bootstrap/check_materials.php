<nav class="navbar navbar-inverse navbar-fixed-top bg-primary text-white">
      <div class="container bg-primary" style="width: 1198px;">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="bg-primary text-white">原料準備作業
          </h3>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn back-btn el el-step-backward text-black">返回</button>
          </div>
        </div>
      </div>
      <div class="container bg-primary text-white" style="width: 1198px;">
        
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-sm-6" >
              <p class="text-left" style="font-size:24px;">配方： 
                <?php
                    $formula_name = json_decode(json_encode($formula_name[0]), true);
                    echo ' '.$formula_name['name'];
                    $formula_id = json_decode(json_encode($query_dorder_formula[0]), true);
                    log_message("ERROR","FORMULA ID ARRAY: ".print_r($formula_id,true));
                    $material_info_stdclass = json_decode($formula_id['material_info']);
                    $material_info_array = json_decode(json_encode($material_info_stdclass), true);

                    $multi_validation_stdclass = json_decode($formula_id['multi_validation']);
                    $multi_validation_array = json_decode(json_encode($multi_validation_stdclass), true);
                ?>
              </p>
          </div>
        </div>
          <!-- Dynamic table start -->   
          <div class="row header bg-primary text-white" style="boder: black solid 2px;">
            <div class="col-sm-4 text-weight-bold" style="font-size:24px;">原料</div>
            <div class="col-sm-2 bg-primary text-white" style="font-size:24px;">執行項目</div>
            <div class="col-sm-4 bg-primary text-white" style="font-size:24px;">QR code 讀取內容</div>
            <div class="col-sm-2 bg-primary text-white" style="font-size:24px;">確認結果</div>
          </div>
          <?php
            $row_number=0;
                log_message("ERROR", "QUERY CONTENT: ".print_r($query,true));
                foreach ($query as $row) {
                 log_message("ERROR","FORMULA MATERIAL DATA: ".print_r($row,true));
                 $row_array = json_decode(json_encode($row), true);
                 echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black; border-left: solid black 2px; border-right: solid black; border-bottom: solid black 2px; padding: 10px;">';
                 echo '<div class="col-sm-4 test-weight-bold" style="font-size:24px; boder-right:solid black;">';
                 $param_number=0;
                 foreach ($row_array as $key => $value) {
                  switch($key) {
                    case "label":
                    $key = "原料名稱";
                    break;
                    case "material_id":
                    $key = "原料編號";
                    break;
                    case "weight":
                    $key = "所需重量";
                    break;
                    case "order":
                    $key = "混料順序";
                    break;
                    default:
                    break;
                  }

                  echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black;">';
                  echo "<div class='col-sm-6 text-left key-".$row_number.$param_number."'><label> ".ucwords($key)." </label></div>";
                  echo "<div class='col-sm-6 text-center value-".$row_number.$param_number."'> ".$value." </div>";
                  if($key == '原料編號'){
                    echo "<div id='material-check-id' class='material-check-id-".$value." ".$row_number."' style='display:none;'>".$value."</div>";
                  }
                  echo '</div>';
                  $param_number++;
                }
                echo '</div>';
                echo '<div class="col-sm-2 text-center border-right"> 
                <button type="button" class="btn btn-primary mat-check check-button-'.$row_number.'" data-toggle="modal" data-target="#materialCheckModal">
                原料確認
                </button>
                <p></p>
                <button type="button" class="btn btn-primary mat-weight weight-button-'.$row_number.'" data-toggle="modal" data-target="#materialWeightModal">
                原料秤重
                </button>
                </div>';
                echo '<div class="col-sm-4 text-center border-right"> 
                <textarea class="input-textbox-'.$row_number.'" placeholder="從 QR code 讀取到的內容" rows="10" columns="70" disabled style="width:300px;height:100px">'.json_encode($material_info_array[$row_array['material_id']]).'</textarea>
                </div>';
                echo '<div class="col-sm-2 text-center"> 
                <div class="led-red-box-'.$row_number.' align-middle">
                <div class="led-red"></div>
                </div>
                <div class="led-green-box-'.$row_number.' align-middle" style="vertical-align:middle;">
                <div class="led-green"></div>
                </div>
                <div class="print-qrcode-'.$row_number.' align-middle" style="vertical-align:middle;">
                <br>
                <button type="button" class="btn btn-primary print-qrcode print-qrcode-button-'.$row_number.'" data-toggle="modal" data-target="#printQrCodeModal">
                產生 QR code
                </button>
                </div>
                </div>';                        
               
                echo '</div>
                <input type="hidden" id="produced-amount-hide" value="">';
                $row_number++;
              }
          ?>
          <br>
          <button type="button" class="btn btn-primary confirm-btn-global text-rigth" disabled>完成原料準備</button>
          <button type="button" class="btn btn-primary print-btn-global text-rigth el el-print el-lg" disabled> 列印</button>


          <!-- Modal 1 -->
          <div class="modal fade" id="materialCheckModal" tabindex="-1" role="dialog" aria-labelledby="materialCheckModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">秤重前原料確認</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container" style="width: auto;">
                  <div class="modal-body">
                    <p>請使用 QR code 掃描器讀取資料</p>
                    <br>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row modal-label">
                          <div class="col-sm-6">
                            <label>原料名稱</label>
                          </div> 
                          <div class="col-sm-6">
                            <div class="material-label float-left" style="text-align:left;"></div>
                          </div> 
                        </div>
                        <div class="row modal-label" style="display: none;">
                          <div class="col-sm-6">
                            <label>所需重量</label>
                          </div> 
                          <div class="col-sm-6">
                            <div class="material-id float-left" style="text-align:left;"></div>
                          </div> 
                        </div>
                        <div class="row modal-label" style="display: none;">
                          <div class="col-sm-6">
                            <label>Amount: </label>
                          </div> 
                          <div class="col-sm-9">
                            <div class="material-amount float-left" style="text-align:left;"></div>
                          </div> 
                        </div>
                        <div class="row modal-label" style="display: none;">
                          <div class="col-sm-6">
                            <label>混料順序</label>
                          </div> 
                          <div class="col-sm-6">
                            <div class="material-sort float-left" style="text-align:left;"></div>
                          </div> 
                        </div>
                        <input type="hidden" id="row-number-hide" value="">
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-12"> 
                            <input type="text" id="qr-box" placeholder="請點選這裡再掃描 QR code">
                          </div>
                        </div>
                        <div class="row row-qr-name" style="display: none;">
                          <div class="col-sm-6">
                            <label id="label-name">待確認原料名稱</label>
                          </div>
                          <div class="col-sm-6">
                            <span name="material-name-hidden" id="material-name-hidden"> </span>
                          </div>
                        </div>
                        <div class="row row-qr-id" style="display: none;">
                          <div class="col-sm-6">
                            <label id="label-id">Id: </label>
                          </div>
                          <div class="col-sm-6">
                            <span name="material-id-hidden" id="material-id-hidden"> </span>
                          </div>
                        </div>
                        <div class="row row-qr-amount" style="display: none;">
                          <div class="col-sm-6">
                            <label id="label-amount"> Amount: </label>
                          </div>
                          <div class="col-sm-6">
                            <span name="amount-hidden" id="amount-hidden" > </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <small id="match-warning" style="color: green; font-weight: bold;">原料正確，請秤重</small>
                    <small id="non-match-warning" style="color: red; font-weight: bold;">原料錯誤，請再次確認</small>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">關閉</button>
                  <button type="button" class="btn reset-btn">重置</button>
                  <button type="button" class="btn btn-primary confirm-btn">確認</button>
                  <button type="button" class="btn btn-primary confirm-weight-btn">確認並秤重</button>
                </div>
              </div>
            </div>
          </div>



          <!-- Modal 2 -->
          <div class="modal fade" id="materialWeightModal" tabindex="-1" role="dialog" aria-labelledby="materialWeightModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">原料秤重</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container" style="width: auto;">
                  <div class="modal-body">
                    <p>請等待電子磅秤傳送資料</p>
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="row modal-label">
                          <div class="col-sm-4">
                            <label>所需重量</label>
                          </div> 
                          <div class="col-sm-4">
                            <span name="weight-req" id="weight-req" > </span>
                          </div> 
                        </div>
                        <div class="row modal-label">
                          <div class="col-sm-4">
                            <label>Produced amount</label>
                          </div> 
                          <div class="col-sm-4">
                            <span name="produced-amount" id="produced-amount" > </span>
                          </div>
                        </div>
                        <div class="row modal-label">
                          <div class="col-sm-4">
                            <label>Final Weight</label>
                          </div>
                          <div class="col-sm-4">
                            <span name="final-req-weight" id="final-req-weight" > </span>
                          </div>
                          <div class="col-sm-4">
                            <input type="text" id="hide-weight" value="">
                            <input type="hidden" id="row-number-hide" value="">
                            <input type="hidden" id="material-id-hide" value="">
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                  <small id="match-weight-warning" style="color: green; font-weight: bold;">原料重量符合配方要求，請按確認鍵完成動作</small>
                  <small id="non-match-weight-warning" style="color: red; font-weight: bold;">原料重量不符合配方要求</small>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">關閉</button>
                  <button type="button" class="btn reset-weight-btn">重置</button>
                  <button type="button" class="btn btn-primary confirm-weight-final-btn">確認</button>
                </div>
              </div>
            </div>
          </div>



          <!-- Modal 3 -->
          <div class="modal fade" id="printQrCodeModal" tabindex="-1" role="dialog" aria-labelledby="printQrCodeModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width:1200px;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">列印 QR code</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container" style="width: auto;">
                  <div class="modal-body">
                    <p>QR code 及相關資料</p>
                    <br>
                    <div class="row modal-content" id="printable-area">
                      <div class="col-sm-6 modal-content qr-code"></div>
                      <div class="col-sm-6 modal-content material-info h-100">
                        <div class="row mat-info">
                          <div class="col-sm-6 mat-name-label">
                            原料名稱
                          </div>
                          <div class="col-sm-6 mat-name-value">
                            <span class="material_name"></span>
                          </div>
                        </div>
                        <div class="row mat-info">
                          <div class="col-sm-6 mat-id-label">
                            原料編號
                          </div>
                          <div class="col-sm-6 mat-id-value">
                            <span class="material_id"></span>
                          </div>
                        </div>
                        <div class="row mat-info">
                          <div class="col-sm-6 mat-form-amnt-label">
                            配方中所需重量
                          </div>
                          <div class="col-sm-6 mat-form-amnt-value">
                            <span class="amount"></span>
                          </div>
                        </div>
                        <div class="row mat-info">
                          <div class="col-sm-6 mat-weight-label">
                            實際重量
                          </div>
                          <div class="col-sm-6 mat-weighst-value">
                            <span class="weight"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary print-qrcode-final">列印 QR code</button>
                </div>
              </div>
            </div>
          </div>


       <!--  <iframe style="border:0; background:#e8f7ff;width:100%;height:300px" src="http://sf_plastic.test:8888/qrcodepage">  
        </iframe> -->
          
        
      </div>
      

    </div>
<script type="text/javascript">
  $(document).ready(function () {
    //Initially we hide the green leds if processed attribute in the DB is 0 (not processed)
    var processed = '<?php echo $formula_id["materialCheck"]?>';
    if ( processed === '0'){
      $("[class^=led-green-box-").hide();
      $(".print-qrcode").prop('disabled', true);
      $(".mat-weight").prop('disabled', true);
      $(".mat-weight").prop('title', "Material not checked");

      var json_multi_validation = '<?php echo $formula_id["multi_validation"]?>';
      var json_material_info = '<?php echo $formula_id["material_info"]?>';
      var order_id = '<?php echo $formula_id["order_id"]?>';
      if (!isEmptyOrSpaces(json_multi_validation)){
        //We proceed to check the status of the two validation steps: check material and weight it
        var array_multi_validation = JSON.parse(json_multi_validation);
        check_validation_status(array_multi_validation);
        
        if (!isEmptyOrSpaces(json_material_info)){
          var array_material_info = JSON.parse(json_material_info);
          check_material_info(array_material_info);
        }
      }
    } else {
      $("[class^=led-red-box-").hide();
      $(".mat-check").prop('disabled', true);
      $(".mat-check").prop('title', "Material already checked");
      $(".mat-weight").prop('disabled', false);
      $(".mat-weight").prop('title', "Material ready to be weigthed");
      $(".confirm-btn-global").prop("disabled", true);
      $(".confirm-btn-global").prop("title", "Order already confirmed");
      $(".print-btn-global").prop("disabled", false);

    }
    //Prettify textareas contents
    $('textarea').each(function(){
       var pretty_data = prettyPrint_data(this.value); 
       this.value = pretty_data;
    });
    //Add value of produceAmount into hidden field for future use
    var produced_amount = '<?php echo $formula_id["producedAmount"]?>';
    $("#produced-amount-hide").val(produced_amount);

    //Hide weigth input field
    $("#hide-weight").hide();
    //Show info when user click on button to check materials
    $( ":button.mat-check" ).on("click", function () {
      $("#non-match-warning").hide();
      $("#match-warning").hide();
      $('#material-name-hidden').css({"background-color":"white"});
      $('#material-id-hidden').css({"background-color":"white"});
      $('#amount-hidden').css({"background-color":"white"});
      $('#hide-weight').css({"background-color":"white"});

     var row_button_classes = $(this).attr("class").split(" ");
     var last_button_class = row_button_classes[row_button_classes.length-1];
     var row_number_array = last_button_class.split("-");
     var row_number_for_class = row_number_array[row_number_array.length-1];
     
     var label_value_class = 'value-'+row_number_for_class+'0';
     var id_value_class = 'value-'+row_number_for_class+'1';
     var amount_value_class = 'value-'+row_number_for_class+'2';
     var sort_value_class = 'value-'+row_number_for_class+'3';
     
     var material_label = $("."+label_value_class).text();
     var material_id = $("."+id_value_class).text();
     var material_amount = $("."+amount_value_class).text();
     var material_sort = $("."+sort_value_class).text();

     $(".modal-body .material-label").text( material_label );
     $(".modal-body .material-id").text( material_id );
     $(".modal-body .material-amount").text( material_amount );
     $(".modal-body .material-sort").text( material_sort ); 
     //store row number into hidden input to be able to modify leds
     $("#row-number-hide").val(row_number_for_class);  
    });
    //Show info when user click on button to check materials
    $( ":button.mat-weight" ).on("click", function () {
      //Update amount-hidden with the textarea in the row
      var current_row_class = this.classList[3];
      var current_row_class_splitted = current_row_class.split('-');
      var current_row = current_row_class_splitted[2];
      var material_id = $("#material-check-id."+current_row).text();

      var textarea_class = '.input-textbox-'+current_row;
      var material_info = $(textarea_class).val();
      var material_info_array = $.parseJSON(material_info);
      $("#amount-hidden").text(material_info_array.amount);

      $("#non-match-weight-warning").hide();
      $("#match-weight-warning").hide();
      //If the material has been checked and stored in DB so the user goes directly to weight process. Amount-hidden must be fill out with DB info before check scale output
      if (isEmptyOrSpaces($("#amount-hidden").text()) || $("#amount-hidden").text() == "99999"){
        //We need to get row and material id to fill out the info
        console.log("MATERIAL WEIGHT BUTTON: "+this);
        //Fill out hidden fields with row and material_id for future use
        $("#row-number-hide").val(current_row);
        $("#material-id-hide").val(material_id);
        //Fill out amount-hidden field
        var material_amount = get_material_object_by_index(material_id, array_material_info);
        $("#amount-hidden").text(material_amount);
      }
      //Fill out hidden fields with row and material_id for future use
      $("#row-number-hide").val(current_row);
      $("#material-id-hide").val(material_id);
      $("#weight-req").text($("#amount-hidden").text());
      $("#produced-amount").text($("#produced-amount-hide").val());
      var total_req_weight = parseFloat($("#amount-hidden").text()) * parseFloat($("#produced-amount-hide").val());
      $("#final-req-weight").text(total_req_weight);
      check_weight_output();
      //confirm_material(false);
      $("#materialWeightModal").modal('toggle');
    });

    //Event on click for Confirm correct data in modal window
    $(".confirm-btn").on('click', function(){
      confirm_material(true);
    });
    $(".confirm-weight-btn").on('click', function(){
      $("#non-match-weight-warning").hide();
      $("#match-weight-warning").hide();
      $("#weight-req").text($("#amount-hidden").text());
      $("#produced-amount").text($("#produced-amount-hide").val());
      var total_req_weight = parseFloat($("#amount-hidden").text()) * parseFloat($("#produced-amount-hide").val());
      $("#final-req-weight").text(total_req_weight);
      check_weight_output();
      check_weight_output();
      confirm_material(false);
      $("#materialCheckModal").modal('toggle');
      $("#materialWeightModal").modal('toggle');
    });
    $(".confirm-weight-final-btn").on('click', function(){
      confirm_weight(true);
    });

    //Focus the mouse pointer in the text input to ease user handling
    $("#materialCheckModal").on("shown.bs.modal", function(){
        $("#qr-box").get(0).focus();
    });

    $(".print-qrcode-final").on("click", function(){
        printElement(document.getElementById("printable-area"));
        window.print();
    });

    $( ":button.print-qrcode" ).on("click", function () {
        var current_row_class = this.classList[3];
        var current_row_class_splitted = current_row_class.split('-');
        var current_row = current_row_class_splitted[3];

        //We get the material info on the textarea
        var textarea_class = '.input-textbox-'+current_row;
        var material_info = $(textarea_class).val();
        var qrcode = generate_qr_code(material_info, current_row);        
    });

    $("#printQrCodeModal").on("hidden.bs.modal", function () {
        $('.qr-code').empty();
        location.reload(true);
    });

    //Hide non required elements during page loading
    $("#non-match-warning").hide();
    $("#match-warning").hide();
    $(".reset-btn").on("click", function (){
      reset_check_fields();
    });
    $(".reset-weight-btn").on("click", function (){
      reset_weight_fields();
    });

    /*$(".print-qrcode").on("click", function (){
      //
    });*/


    $(".reset-btn").prop("disabled", true);
    $(".confirm-btn").prop("disabled", true);
    $(".confirm-weight-btn").prop("disabled", true);

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 2000;  //time in ms, 2 second for example
    var $input = $('#qr-box');

    //on keyup, start the countdown
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
      var qr_value = $("#qr-box").val();
      if (qr_value.indexOf('http') != -1){
        qr_value = qr_value.substring(7,qr_value.length);
      }
      var qr_object = JSON.parse(qr_value);

      //qr_value.replace("http://"," ");
      $('#material-id-hidden').text(qr_object.material_id);
      $('#material-name-hidden').text(qr_object.material_name);
      $('#amount-hidden').text(qr_object.amount);

      $('.row-qr-name').show();
      //$('.row-qr-id').show();
      //$('.row-qr-amount').show();
      $('#qr-box').hide();

      compare();
    }

    function compare() {
      var non_match = [];

      var order_material_label = ($(".modal-body .material-label").text()).trim();
      var order_material_id = ($(".modal-body .material-id").text()).trim();
      var order_amount = ($(".modal-body .material-amount").text()).trim();
      if (order_amount % 1 == 0) order_amount = parseInt(order_amount, 10);
      order_amount = order_amount.toString();

      var qr_material_id = $('#material-id-hidden').text();
      var qr_material_label = $('#material-name-hidden').text();
      var qr_amount = $('#amount-hidden').text();

      var material_name_check = order_material_label.localeCompare(qr_material_label);
      var material_id_check = order_material_id.localeCompare(qr_material_id);
      var amount_check = order_amount.localeCompare(qr_amount);

      if (material_name_check !== 0) non_match.push("Material Label");
      //if (material_id_check !== 0) non_match.push("Material Id");
      //if (amount_check !== 0) non_match.push("Amount");

      if (non_match.length !== 0) {
        //alert("Non matching elements: "+JSON.stringify(non_match));
        if (non_match.includes("Material Label")) $('#material-name-hidden').css({"background-color":"red"});
        if (non_match.includes("Material Id")) $('#material-id-hidden').css({"background-color":"red"});
        if (non_match.includes("Amount")) $('#amount-hidden').css({"background-color":"red"});
        $("#non-match-warning").show();
        $(".reset-btn").prop("disabled", false);
        $(".confirm-btn").prop("disabled", true);
        $(".confirm-weight-btn").prop("disabled", true);
      } else {
        $("#match-warning").show();
        $(".reset-btn").prop("disabled", false);
        $(".confirm-btn").prop("disabled", false);
        $(".confirm-weight-btn").prop("disabled", false);
      }
    }

    function reset_check_fields(){
      $('#material-id-hidden').text("");
      $('#material-name-hidden').text("");
      $('#amount-hidden').text("");
      $('#qr-box').val("");

      $('#material-name-hidden').css({"background-color":"white"});
      $('#material-id-hidden').css({"background-color":"white"});
      $('#amount-hidden').css({"background-color":"white"});

      $('.row-qr-name').hide();
      $('.row-qr-id').hide();
      $('.row-qr-amount').hide();
      $("#non-match-warning").hide();
      $("#match-warning").hide();
      $('#qr-box').show();
      $(".reset-btn").prop("disabled", true);
      $(".confirm-btn").prop("disabled", true);
      $(".confirm-weight-btn").prop("disabled", true);

      $("#qr-box").get(0).focus();
    }

    function reset_weight_fields(){
      $(".confirm-weight-final-btn").prop("disabled", true);
      $("#hide-weight").val("");
      $("#hide-weight").hide();
      $('#hide-weight').css({"background-color":"white"});
      check_weight_output();
    }

    function confirm_material(close_modal){
      var current_row = $("#row-number-hide").val();
      var qr_data = $("#qr-box").val();
      console.log(qr_data);
      if (qr_data.indexOf('http') != -1){
        qr_data = qr_data.substring(7,qr_data.length);
      }
      textarea_class = '.input-textbox-'+current_row;
      // Save into DB material information and update validation of check material
      var json_validation = {"checked":1, "weighted":99999, "mixed":99999};
      //We add default value for non weight data
      var json_material_info = qr_data;
      update_material_check_validation(json_validation, json_material_info, order_id);

      //$(textarea_class).val(qr_data);
      $(".led-green-box-"+current_row).show();
      $(".led-red-box-"+current_row).hide();

      //Enable Weight-button
      $(".weight-button-"+current_row).prop("disabled", false);
      //Prettify textarea content
      //prettyPrint(textarea_class);
      //Close modal window
      if (close_modal){
        refresh_textarea_content(order_id,current_row);
        $("#materialCheckModal").modal('toggle');
        location.reload(true);
      }    
    }

    function refresh_textarea_content (order_id, row){
      $.ajax({
          url: 'get_order_data',
          type: 'POST',
          data: {"order_id": order_id},
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          async: false,
          success: function(response) { 
            console.log("Data to refresh textarea: "+response);
            if (response){

            } else{
              console.log("ERROR: failed to get info to update the textarea "+response);
            }
          }
      });
    }

    function confirm_weight(close_var){

      var current_row = $("#row-number-hide").val();
      //We need material id to replace the weight in the json object
      var material_id = "";
      if ($("#material-id-hide").val()){
        material_id = $("#material-id-hide").val();
      }
      else{
        textarea_class = '.input-textbox-'+current_row;
        material_obj = $.parseJSON($(textarea_class).val());
        material_id = material_obj.material_id;
      }

      //enable print qrcode for that row
      $(".print-qrcode-button-"+current_row).prop('disabled', false);
      //Add json info to textarea
      var scale_weight = $("#hide-weight").val();
      var json_weight = ', "weight":"'+scale_weight+'"}';
      

      // Save into DB material information and update validation of check material
      var json_validation = {"checked":1, "weighted":1, "mixed":99999};

      update_material_info(json_validation, scale_weight, material_id, order_id);

      //TODO: reload texarea 
      //Prettify textarea content
      //prettyPrint(textarea_class);
      //Close modal window
      $("#materialWeightModal").modal('toggle');
      location.reload(true);
      

    }

    //On Go back event
    $(".back-btn").on('click', function(){
      parent.history.back();
      return false;
    });

    //Print functionallity
    $('.print-btn-global').on('click', function() {  
      window.print();  
      return false; // why false?
    });
  });

  function prettyPrint(textarea_id) {
      var ugly = $(textarea_id).val();
      var obj = JSON.parse(ugly);
      var pretty = JSON.stringify(obj, undefined, 4);
      $(textarea_id).val(pretty);
  }

  function prettyPrint_data(textarea_data) {
      var ugly = textarea_data;
      var obj = JSON.parse(ugly);
      var pretty = JSON.stringify(obj, undefined, 4);
      return pretty;
  }

  function isEmptyOrSpaces(str){
      return str === null || str.match(/^ *$/) !== null;
  }

  function check_weight_output() {
    var request = null;
    request = $.ajax({
      url: '../scale/get_output',
      type: 'POST',
      tryCount: 0,
      retryLimit: 30,
      async: true,
      beforeSend: function() {
        if (request != null){
          request.abort();
        }
      },
      error: function (jqXHR, textStatus){
        if (textStatus === 'timeout' || textStatus === 'error') {
          var error_msg = "讀取不到電子磅秤傳送來的資料。請再秤重一次或是手動輸入秤重結果";
          console.log("ERROR: "+error_msg+" Try Count: "+this.tryCount);
          this.tryCount++;
          if (this.tryCount <= this.retryLimit) {
            $.ajax(this);
            return;
          }
          $("#hide-weight").show();
          return;
        }
      },
      success: function (data){
        console.log("Scale output retrieved");
        //Reset counter if previous request failed
        $("#hide-weight").show();
        //var json_string = JSON.stringify(data)
        data = data.replace(/\s/g,'');
        var obj = JSON.parse(data);
        $("#hide-weight").val(obj.weight);
        if (this.tryCount !== 0) {
          this.tryCount = 0;
        }
        compare_weights();
      },
      timeout:10000
    });
  }

  function update_material_check_validation(json_validation, json_material_info, order_id) {
    var request = null;
    var json_array = [json_validation, json_material_info, order_id];
    request = $.ajax({
      url: 'update_validation_info',
      type: 'POST',
      data:{info: JSON.stringify(json_array)},
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      tryCount: 0,
      retryLimit: 30,
      async: true,
      beforeSend: function() {
        if (request != null){
          request.abort();
        }
      },
      error: function (jqXHR, textStatus){
        if (textStatus === 'timeout' || textStatus === 'error') {
          var error_msg = "Something failed during the DB update process.";
          console.log("ERROR: "+error_msg+" Try Count: "+this.tryCount);
          this.tryCount++;
          if (this.tryCount <= this.retryLimit) {
            $.ajax(this);
            return;
          }
          return;
        }
      },
      success: function (data){
        console.log("Validation status for requested material");
        //Reset counter if previous request failed
        //var json_string = JSON.stringify(data)
        data = data.replace(/\s/g,'');
        var obj = JSON.parse(data);
        //$("#textarea_").val(obj.weight);
        if (this.tryCount !== 0) {
          this.tryCount = 0;
        }
        //compare_weights();
      },
      timeout:10000
    });
  }

  function update_material_info(json_validation, scale_weight, material_id, order_id){
    var request = null;
    var json_array = [json_validation, scale_weight, material_id, order_id];
    request = $.ajax({
      url: 'update_material_info',
      type: 'POST',
      data:{info: JSON.stringify(json_array)},
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      tryCount: 0,
      retryLimit: 30,
      async: true,
      beforeSend: function() {
        if (request != null){
          request.abort();
        }
      },
      error: function (jqXHR, textStatus){
        if (textStatus === 'timeout' || textStatus === 'error') {
          var error_msg = "Something failed during the DB update process.";
          console.log("ERROR: "+error_msg+" Try Count: "+this.tryCount);
          this.tryCount++;
          if (this.tryCount <= this.retryLimit) {
            $.ajax(this);
            return;
          }
          return;
        }
      },
      success: function (data){
        console.log("Validation status for requested material");
        //Reset counter if previous request failed
        //var json_string = JSON.stringify(data)
        data = data.replace(/\s/g,'');
        var obj = JSON.parse(data);
        //$("#textarea_").val(obj.weight);
        if (this.tryCount !== 0) {
          this.tryCount = 0;
        }
        //compare_weights();
      },
      timeout:10000
    });
  }

  function compare_weights(){
    var formula_weight = $("#amount-hidden").text();
    var produced_amount = $("#produced-amount-hide").val();
    var required_weight = parseFloat(formula_weight) * parseFloat(produced_amount);
    var scale_weight = $("#hide-weight").val();
    var non_match = [];

    var min_value = parseFloat(required_weight) - 0.5;
    var max_value = parseFloat(required_weight) + 0.5;

    var comparison_result = isBetween(scale_weight,min_value,max_value);

    //var comparison_result = formula_weight.localeCompare(scale_weight);

    if (!comparison_result) non_match.push("Weight");

    if (non_match.length !== 0) {
      //alert("Non matching elements: "+JSON.stringify(non_match));
      if (non_match.includes("Weight")) $('#hide-weight').css({"background-color":"red"});
      $("#non-match-weight-warning").show();
      $("#match-weight-warning").hide();
      $(".reset-weight-btn").prop("disabled", false);
      $(".confirm-weight-final-btn").prop("disabled", true);
    } else {
      $("#match-weight-warning").show();
      $("#non-match-weight-warning").hide();
      $(".reset-weight-btn").prop("disabled", false);
      $(".confirm-weight-final-btn").prop("disabled", false);
    }

  }

  function isBetween (n,a,b){
    return (n - a) * (n - b) <= 0;
  }

  //Print only passed elements function
  function printElement(elem) {
      var domClone = elem.cloneNode(true);
      
      var $printSection = document.getElementById("printSection");
      
      if (!$printSection) {
          var $printSection = document.createElement("div");
          $printSection.id = "printSection";
          document.body.appendChild($printSection);
      }
      
      $printSection.innerHTML = "";
      
      $printSection.appendChild(domClone);
  }

  function fill_out_material_table (current_row){
      //var current_row = $("#row-number-hide").val();
      
      textarea_class = '.input-textbox-'+current_row;
      var textarea_content = $(textarea_class).val();

      var mat_obj = JSON.parse(textarea_content);
      $.each(mat_obj, function( index, value ) {
        //alert( index + ": " + value );
        $("."+index).text(value);
      });
  }

  function get_material_object_by_index(material_id, array_material_info){
    var material_amount ={};
    $.each(array_material_info, function(i,obj){
      if (material_id == i){
        material_amount = obj.amount;
        return false;
      }
    });
    return material_amount;
  }

  function check_material_info(array_materials_info){
    //We fill out hidden fields if material was already checked and/or weighted
    $.each(array_materials_info, function(i, obj) {

    });
  }

  function initialize_hidden_fields(materials_info){
    $("#amount-hidden").text();
  }

  function check_validation_status (materials_validation_info){
      $("[class^=material-check-id-").each(function(i, obj) {
        //One by one we check the material check status and the weight status
        //We extract required information from current element, material_id and row
        var material_id = this.innerText;
        var class_list_obj = this.className;
        var class_list = class_list_obj.split(/\s+/);
        var row = class_list[1];
        var checked_status ={};
        var weighted_status = {};
        //We need to get the validation information of the material_id retrieved
        $.each(materials_validation_info, function(i,obj){
          if (material_id == i){
            checked_status = obj.checked;
            weighted_status = obj.weighted;
            return false;
          }
        });
        //Now we can show and hide elements depending on the retrieved results  
        if (checked_status == 1 && weighted_status == 1){
          //With the row value we proceed to update buttons and leds
          $(".led-green-box-"+row).show();
          $(".led-red-box-"+row).hide();
          $(".print-qrcode-button-"+row).prop('disabled', false);
          $(".weight-button-"+row).prop('disabled', false);
          $(".weight-button-"+row).prop('title', "Material checked");
        } else if (checked_status == 1 && weighted_status != 1){
          //With the row value we proceed to update buttons and leds
          $(".led-green-box-"+row).show();
          $(".led-red-box-"+row).hide();
          $(".print-qrcode-button-"+row).prop('disabled', true);
          $(".weight-button-"+row).prop('disabled', false);
          $(".weight-button-"+row).prop('title', "Material checked");
        }
      });
  }

  function generate_qr_code (material_info, current_row){
    $.ajax({
      url: 'generate_qr_code',
      type: 'POST',
      data: {info: material_info},
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      async: false,
      success: function(response) { 
        console.log("QR CODE GENERATED: "+response);
        if (response == 200){
          fill_out_material_table(current_row);
          $('.qr-code').prepend('<img src="../test.png" title="qrcode">');
        } else{
          console.log("QR CODE GENERATED ERROR: "+response);
        }
      }
  });
  }

</script>
  
<style type="text/css">
  .led-box {
      height: 30px;
      width: 25%;
      margin: 10px 0;
      float: left;
    }

    .led-box p {
      font-size: 12px;
      text-align: center;
      margin: 1em;
    }

    .led-red {
      margin: 0 auto;
      width: 24px;
      height: 24px;
      background-color: #F00;
      border-radius: 50%;
      box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 12px;
      -webkit-animation: blinkRed 0.5s infinite;
      -moz-animation: blinkRed 0.5s infinite;
      -ms-animation: blinkRed 0.5s infinite;
      -o-animation: blinkRed 0.5s infinite;
      animation: blinkRed 0.5s infinite;
    }

    @-webkit-keyframes blinkRed {
        from { background-color: #F00; }
        50% { background-color: #A00; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
        to { background-color: #F00; }
    }
    @-moz-keyframes blinkRed {
        from { background-color: #F00; }
        50% { background-color: #A00; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
        to { background-color: #F00; }
    }
    @-ms-keyframes blinkRed {
        from { background-color: #F00; }
        50% { background-color: #A00; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
        to { background-color: #F00; }
    }
    @-o-keyframes blinkRed {
        from { background-color: #F00; }
        50% { background-color: #A00; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
        to { background-color: #F00; }
    }
    @keyframes blinkRed {
        from { background-color: #F00; }
        50% { background-color: #A00; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
        to { background-color: #F00; }
    }

    .led-yellow {
      margin: 0 auto;
      width: 24px;
      height: 24px;
      background-color: #FF0;
      border-radius: 50%;
      box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 12px;
      -webkit-animation: blinkYellow 1s infinite;
      -moz-animation: blinkYellow 1s infinite;
      -ms-animation: blinkYellow 1s infinite;
      -o-animation: blinkYellow 1s infinite;
      animation: blinkYellow 1s infinite;
    }

    @-webkit-keyframes blinkYellow {
        from { background-color: #FF0; }
        50% { background-color: #AA0; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 0; }
        to { background-color: #FF0; }
    }
    @-moz-keyframes blinkYellow {
        from { background-color: #FF0; }
        50% { background-color: #AA0; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 0; }
        to { background-color: #FF0; }
    }
    @-ms-keyframes blinkYellow {
        from { background-color: #FF0; }
        50% { background-color: #AA0; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 0; }
        to { background-color: #FF0; }
    }
    @-o-keyframes blinkYellow {
        from { background-color: #FF0; }
        50% { background-color: #AA0; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 0; }
        to { background-color: #FF0; }
    }
    @keyframes blinkYellow {
        from { background-color: #FF0; }
        50% { background-color: #AA0; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #808002 0 -1px 9px, #FF0 0 2px 0; }
        to { background-color: #FF0; }
    }

    .led-green {
      margin: 0 auto;
      width: 24px;
      height: 24px;
      background-color: #ABFF00;
      border-radius: 50%;
      box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #304701 0 -1px 9px, #89FF00 0 2px 12px;
    }

    .led-blue {
      margin: 0 auto;
      width: 24px;
      height: 24px;
      background-color: #24E0FF;
      border-radius: 50%;
      box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #006 0 -1px 9px, #3F8CFF 0 2px 14px;
    }
    .back-btn{
      color: black;
      position: relative;
      float: right;
    }
    .print-btn-global{
      padding:9px 12px;
    }
    div[class^="value-"], div[class*=" value-"] {
      text-align: left;
    }
    .modal-label {
      text-align: left;
    }

    .mat-info {
      height: 112px;
      text-align: left;
      font-size: 24px;
    }

    /* Print required elements */
    @media screen {
      #printSection {
          display: none;
      }
    }

    @media print {
      body * {
        visibility:hidden;
      }
      #printSection, #printSection * {
        visibility:visible;
      }
      #printSection {
        position:absolute;
        left:0;
        top:0;
      }
    }

</style>