<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
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
        <h1>Material preparation</h1>
        <p class="lead">Here the list of materials will be displayed and the operator must process it in the proper way.
        </p>
        <table class="key-value-table" summary="Materials to prepare">
            <caption>Materials to prepare</caption>
            <tbody>
                <?php
                  foreach ($query as $row) {
                     $array = json_decode(json_encode($row),true);
                     foreach ($array as $key => $value) {
                       echo '<tr>';
                       echo '<th class="width-20"> '.$key.' </th>';
                       echo '<td> '.$value.' </td>';
                       echo '</tr>';
                     }
                  }
                ?>
            </tbody>
        </table>
        
        
        <iframe style="border:0; background:#e8f7ff;width:100%;height:300px" src="http://sf_plastic.test:8888/qrcodepage">  
        </iframe>
          
        
      </div>
      

    </div>
