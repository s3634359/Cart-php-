<?php
function topModule($pageTitle) {
    $html = <<<"OUTPUT"
<!DOCTYPE html>
<html lang='en'>

    <head>
        <meta charset='utf-8'>
        <title>$pageTitle</title>
        <link rel="stylesheet" href='css/header.css' type='text/css'/>
        <link rel="stylesheet" href='css/footer.css' type='text/css'/>
        <link rel="stylesheet" href='css/home.css' type='text/css'/>
        <link rel="stylesheet" href='css/products.css' type='text/css'/>
        <link rel="stylesheet" href='css/checkout.css' type='text/css'/>
        <link rel="stylesheet" href='css/cart.css' type='text/css'/>
        <link rel="stylesheet" href='css/receipt.css' type='text/css'/>
        
        <link id='wireframecss' type="text/css" rel="stylesheet" href="css/wireframe.css" disabled>
        <script src='js/wireframe.js'></script>
        
         <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css' integrity='sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Abel|Anton|Source+Sans+Pro' rel='stylesheet'>
        
         <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js'></script>
       
    </head>

    <body>
    
        <header class='header'>
        <div class='logo'><a href='index.php'><img src='images/logo.png'></a></div>
        <nav class='main_nav'>
				<ul>
					<li><a href='index.php'>about</a></li>
					<li><a href='products.php'>products</a></li>
					<li><a href='cart.php'>cart</a></li>
                    <li><a href='checkout.php'>checkout</a></li>
                    <li><a href='receipt.php'>receipt</a></li>
					<li><a href='login.php'>login</a></li>
				</ul>
            </nav>
        </header>

    <main>
OUTPUT;
    echo $html;
}

function endModule() {
    $html = <<<"OUTPUT"
    
    </main>
<footer>
    <div class='footer'>
    <p class='footer_font'>
        Copyright &copy;<script>
        document.write(new Date().getFullYear());
      </script> M Kollection - Australia.
        <br>
      Designed by Kyongsub Kong(s3634359) &amp; Ming Guan(s3723009). 
    </p>
    
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
    <div>Links to <a href="https://github.com/s3634359/wp">Github Repo</a>, <a href='products.txt'>products spreadsheet</a> and <a href='orders.txt'>orders spreadsheet</a> are here.<br><br> <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
    </div>
    </div>

</footer>

</body>
</html>

    
OUTPUT;
    echo $html;
    
    preShow($_POST);
    preShow($_SESSION);

    printMyCode();

}

function tool() {    
    if(isset($_POST))
    preShow($_POST);
    if(isset($_SESSION))
    preShow($_SESSION);

    printMyCode();
}


function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else 
    echo $ret; 
}

function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'>\n";
  foreach ($lines as $lineNo => $lineOfCode)
     printf("%3u: %1s \n", $lineNo, rtrim(htmlentities($lineOfCode)));
  echo "</pre>";
}

function php2js( $arr, $arrName ) {
  $lineEnd="";
  echo "<script>\n";
  echo "  var $arrName = {\n";
  foreach ($arr as $key => $value) {
    echo "$lineEnd    $key : $value";
    $lineEnd = ",\n";
  }
  echo "  \n};\n";
  echo "</script>\n\n";
}

function styleCurrentNavLink( $css ) {
  $here = $_SERVER['SCRIPT_NAME']; 
  $bits = explode('/',$here); 
  $filename = $bits[count($bits)-1]; 
  echo "<style>nav a[href$='$filename'] { $css }</style>";
}


?>