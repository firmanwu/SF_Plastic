<nav class="navbar navbar-inverse navbar-fixed-top bg-primary text-white">
      <div class="container bg-primary text-white">
        <h3 class="bg-primary text-white">Material preparation for 
          <?php
              $formula_string = json_decode(json_encode($formula_name[0]), true);
              echo $formula_string['name']; 
          ?> 

        </h3>
        <!-- <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div> --><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
          <p class="lead">Here the list of materials will be displayed and the operator must process it in the proper way.
          </p>
          
          <!-- Dynamic table start -->   
          <div class="row header bg-primary text-white" style="boder: black solid 2px;">
            <div class="col-sm-4 text-weight-bold" style="font-size:24px;">Material</div>
            <div class="col-sm-4 bg-primary text-white" style="font-size:24px;">Actions</div>
            <div class="col-sm-4 bg-primary text-white" style="font-size:24px;">Input read</div>
          </div>
          <?php
            foreach ($query as $row) {
               echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black; border-left: solid black 2px; border-right: solid black; border-bottom: solid black 2px; padding: 10px;">';
               //$i=0;
               //for ($i=0; $i<=2; $i++){
                  echo '<div class="col-sm-4 test-weight-bold" style="font-size:24px; boder-right:solid black;">';
                  $array = json_decode(json_encode($row),true);
                   foreach ($array as $key => $value) {
                        
                        echo '<div class="row bg-light text-dark" style="font-size:16px; background-color:white; color: black;">';
                        echo '<div class="col-sm-6 text-left"> '.$key.' </div>';
                        echo '<div class="col-sm-6 text-center"> '.$value.' </div>';
                        echo '</div>';
                        
                   }
                   echo '</div>';
                   echo '<div class="col-sm-4 text-center border-right"> 
                                <input type="button" onclick="" value="Check Material"></input>
                        </div>';
                   echo '<div class="col-sm-4 text-center"> 
                                <input type="text" placeholder="output from qrcode reader" style="width:300px; height:100px;" disabled></input>
                        </div>';                        
               //}
               echo '</div>';
            }
          ?>
       <!--  <iframe style="border:0; background:#e8f7ff;width:100%;height:300px" src="http://sf_plastic.test:8888/qrcodepage">  
        </iframe> -->
          
        
      </div>
      

    </div>
