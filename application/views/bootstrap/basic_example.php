<nav class="navbar navbar-inverse navbar-fixed-top bg-primary text-white">
      <div class="container bg-primary" style="width: 1198px;">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="bg-primary text-white">Material preparation for:  
          </h3>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn back-btn el el-step-backward text-black">Go Back</button>
          </div>
        </div>
      </div>
      <div class="container bg-primary text-white" style="width: 1198px;">
        
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-sm-6">
              <p class="text-left">Formula Name: 
                <?php
                    //$formula_string = json_decode(json_encode($formula_name[0]), true); 
                    $formula_name = json_decode(json_encode($formula_name[0]), true);
                    echo ' '.$formula_name['name'];
                ?>
                <br>
                Formula ID: 
                <?php
                    //$formula_string = json_decode(json_encode($formula_name[0]), true);
                    $formula_id = json_decode(json_encode($query_dorder_formula[0]), true);
                    echo ' '.$formula_id['formula_id'];
                ?>
              </p>
              <p class="lead text-left">Here the list of materials will be displayed and the operator must process it in the proper way. At this step only Material ID will be check when the qr code is read.
              </p>
          </div>
        </div>
          <!-- Dynamic table start -->   
          <div class="row header bg-primary text-white" style="boder: black solid 2px;">
            <div class="col-sm-4 text-weight-bold" style="font-size:24px;">Material</div>
            <div class="col-sm-2 bg-primary text-white" style="font-size:24px;">Actions</div>
            <div class="col-sm-4 bg-primary text-white" style="font-size:24px;">Input read</div>
            <div class="col-sm-2 bg-primary text-white" style="font-size:24px;">Status</div>
          </div>
          <?php
            $row_number=0;
            foreach ($query as $row) {
               echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black; border-left: solid black 2px; border-right: solid black; border-bottom: solid black 2px; padding: 10px;">';
               //$i=0;
               //for ($i=0; $i<=2; $i++){
                  echo '<div class="col-sm-4 test-weight-bold" style="font-size:24px; boder-right:solid black;">';
                  $array = json_decode(json_encode($row),true);
                  $param_number=0;
                   foreach ($array as $key => $value) {
                        
                        echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black;">';
                        echo "<div class='col-sm-6 text-left key-".$row_number.$param_number."'> ".$key." </div>";
                        echo "<div class='col-sm-6 text-center value-".$row_number.$param_number."'> ".$value." </div>";
                        echo '</div>';
                        $param_number++;
                   }
                   echo '</div>';
                   echo '<div class="col-sm-2 text-center border-right"> 
                                <button type="button" class="btn btn-primary mat-check check-button-'.$row_number.'" data-toggle="modal" data-target="#materialCheckModal">
                                  Check Material
                                </button>
                        </div>';
                   echo '<div class="col-sm-4 text-center border-right"> 
                                <textarea class="input-textbox-'.$row_number.'" placeholder="QR code information after read" rows="10" columns="70" disabled style="width:300px;height:100px"></textarea>
                        </div>';
                   echo '<div class="col-sm-2 text-center"> 
                            <div class="led-red-box-'.$row_number.'">
                              <div class="led-red"></div>
                              <p class="led-red-label">Red LED</p>
                            </div>
                            <div class="led-green-box-'.$row_number.'" >
                              <div class="led-green"></div>
                              <p class="led-green-label">Green LED</p>
                            </div>
                        </div>';                        
               //}
               echo '</div>';
               $row_number++;
            }
          ?>
          <br>
          <button type="button" class="btn btn-primary confirm-btn-global text-rigth" disabled>Confirm Order</button>
          <!-- Modal -->
          <div class="modal fade" id="materialCheckModal" tabindex="-1" role="dialog" aria-labelledby="materialCheckModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Check Material</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container" style="width: auto;">
                  <div class="modal-body">
                    Please read the QRcode with the reader
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="material-label float-left"></div>
                        <div class="material-id float-left"></div>
                        <div class="material-amount float-left"></div>
                        <div class="material-sort float-left"></div>
                        <input type="hidden" id="row-number-hide" value="">
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-12"> 
                            <input type="text" id="qr-box" placeholder="Place the cursor here and read the qrcode">
                          </div>
                        </div>
                        <div class="row row-qr-name" style="display: none;">
                          <div class="col-sm-6">
                            <label id="label-name">Name: </label>
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
                    <small id="match-warning" style="color: green; font-weight: bold;">Order requirements are matched. Proceed to confirm</small>
                    <small id="non-match-warning" style="color: red; font-weight: bold;">One or more elements don't match with the order requirements</small>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                  <button type="button" class="btn reset-btn">Reset</button>
                  <button type="button" class="btn btn-primary confirm-btn">Confirm</button>
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
    var processed = '<?php echo $formula_id["processed"]?>';
    if ( processed === '0'){
      $("[class^=led-green-box-").hide();
    } else {
      $("[class^=led-red-box-").hide();
      $(".mat-check").prop('disabled', true);
    }

    //Show info when user click on button to check materials
    $( ":button.mat-check" ).on("click", function () {
      $("#non-match-warning").hide();
      $("#match-warning").hide();
      $('#material-name-hidden').css({"background-color":"white"});
      $('#material-id-hidden').css({"background-color":"white"});
      $('#amount-hidden').css({"background-color":"white"});

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

    //Event on click for Confirm correct data in modal window
    $(".confirm-btn").on('click', function(){
      confirm_material();
    });

    //Focus the mouse pointer in the text input to ease user handling
    $("#materialCheckModal").on("shown.bs.modal", function(){
        $("#qr-box").get(0).focus();
    });
    //Hide non required elements during page loading
    $("#non-match-warning").hide();
    $("#match-warning").hide();
    $(".reset-btn").on("click", function (){
      reset_check_fields();
    });
    $(".reset-btn").prop("disabled", true);
    $(".confirm-btn").prop("disabled", true);

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
      $('.row-qr-id').show();
      $('.row-qr-amount').show();
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
      if (material_id_check !== 0) non_match.push("Material Id");
      if (amount_check !== 0) non_match.push("Amount");

      if (non_match.length !== 0) {
        //alert("Non matching elements: "+JSON.stringify(non_match));
        if (non_match.includes("Material Label")) $('#material-name-hidden').css({"background-color":"red"});
        if (non_match.includes("Material Id")) $('#material-id-hidden').css({"background-color":"red"});
        if (non_match.includes("Amount")) $('#amount-hidden').css({"background-color":"red"});
        $("#non-match-warning").show();
        $(".reset-btn").prop("disabled", false);
        $(".confirm-btn").prop("disabled", true);
      } else {
        $("#match-warning").show();
        $(".reset-btn").prop("disabled", false);
        $(".confirm-btn").prop("disabled", false);
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

      $("#qr-box").get(0).focus();
    }

    function confirm_material(){
      var current_row = $("#row-number-hide").val();
      var qr_data = $("#qr-box").val();
      if (qr_data.indexOf('http') != -1){
        qr_data = qr_data.substring(7,qr_data.length);
      }
      textarea_class = '.input-textbox-'+current_row;
      $(textarea_class).val(qr_data);
      $(".led-green-box-"+current_row).show();
      $(".led-red-box-"+current_row).hide();
      
      //Prettify textarea content
      prettyPrint(textarea_class);
      //Close modal window
      $(".modal").modal('toggle');
    }

    //On Go back event
    $(".back-btn").on('click', function(){
      parent.history.back();
      return false;
    });
  });

  function prettyPrint(textarea_id) {
      var ugly = $(textarea_id).val();
      var obj = JSON.parse(ugly);
      var pretty = JSON.stringify(obj, undefined, 4);
      $(textarea_id).val(pretty);
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
</style>