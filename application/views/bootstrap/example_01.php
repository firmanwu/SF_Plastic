<html>
<head>
  <meta name="viewport" content="width=device-width, minimum-scale=0.1"><title>example_01.php (87×87)
  </title>
</head>
<body style="margin: 0px;">
  <p> EXAMPLE:</p>
  <?php
    //QRcode::png('PHP QR Code :)');
    //QRcode::png('Formula name: Formula 4', 'test.png', 'H', 10, 2);

    // here our data 
    $name         = 'John Doe'; 
    $sortName     = 'Doe;John'; 
    $phone        = '(049)012-345-678'; 
    $phonePrivate = '(049)012-345-987'; 
    $phoneCell    = '(049)888-123-123'; 
    $orgName      = 'My Company Inc.'; 

    $email        = 'john.doe@example.com'; 

    // if not used - leave blank! 
    $addressLabel     = 'Our Office'; 
    $addressPobox     = ''; 
    $addressExt       = 'Suite 123'; 
    $addressStreet    = '7th Avenue'; 
    $addressTown      = 'New York'; 
    $addressRegion    = 'NY'; 
    $addressPostCode  = '91921-1234'; 
    $addressCountry   = 'USA'; 

    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'VERSION:2.1'."\n"; 
    $codeContents .= 'N:'.$sortName."\n"; 
    $codeContents .= 'FN:'.$name."\n"; 
    $codeContents .= 'ORG:'.$orgName."\n"; 

    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
    $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n"; 
    $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n"; 

    $codeContents .= 'ADR;TYPE=work;'. 
        'LABEL="'.$addressLabel.'":' 
        .$addressPobox.';' 
        .$addressExt.';' 
        .$addressStreet.';' 
        .$addressTown.';' 
        .$addressPostCode.';' 
        .$addressCountry 
    ."\n"; 

    $codeContents .= 'EMAIL:'.$email."\n"; 

    $codeContents .= 'END:VCARD'; 

    // generating 
    QRcode::png($codeContents, '026.png', QR_ECLEVEL_L, 3); 
  ?>

  <img src="026.png" />
</body>
</html>
