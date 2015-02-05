<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<title>SlothyGaming - Files and Downloads</title>
<link href="notcss.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="mobile.css" rel="stylesheet" type="text/css" media="handheld"/>
<link rel="shortcut icon" href="http://www.slothygaming.com/favicon.ico" type="image/x-icon"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
</head>

<body background=black>
<div id="menu">
        <a href="index.html" style="background: black;width:40px;"><img src="img/logo40px.png" alt="SG" style="width:45px;height:45px; position: absolute; top:3px;left:3px;"/></a>
	<a href="index.html">Home</a>
	<a href="files.php" class="current_item">Files</a>
    </div>
    
    <div class="latestgame">
        <div style="background: lightgrey;border-top-right-radius: 5px;border-top-left-radius: 5px;margin: 0;">Social Media Links</div><a href="https://youtube.com/TheOfficialHotrods20">YouTube</a><br/><a href="https://twitter.com/SlothyGaming">Twitter</a>
    </div>
    
    <div class="latestgame" style="height:600px;">
        <font style="position:relative;top: 10em;left:0px;"><strong>Please disable your ad blocking program.  This website depends on advertisements.</strong></font>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px;position:absolute;top:0px;left:0px;"
     data-ad-client="ca-pub-"
     data-ad-slot=""></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    <div class="latestgame">
        Please contact the <a href="mailto:PutEmailAddressHere">admin</a> if you find errors or inconsistencies!
    </div>
    
    <div id="news">
        <?php
            $directories = glob("files/*" , GLOB_ONLYDIR);
            $bigOlArray = parse_ini_file("files/names.ini", true);
            //print_r($directories);
            foreach($directories as $key=>$value)
            {
                $files = glob("$value/*.{zip,jar}", GLOB_BRACE);
                $files2 = glob("$value/*.mp3", GLOB_BRACE);
                $value = str_replace("files/", "", $value);
                if(array_key_exists($value, $bigOlArray["General"]))
                {
                    if(array_key_exists($value, $bigOlArray["Wiki"]))
                    {echo "<a id='link$value' href=\"javascript:display('show', '$value', 'true')\">".$bigOlArray["General"][$value]."</a><br/><a href=\"http://wiki.slothygaming.com/index.php?title=$value\" style='margin-left:-100px;z-index:1;width:auto;float:right;'><img src='img/wiki.png'/></a>";}else
                    {echo "<a id='link$value' href=\"javascript:display('show', '$value', 'false')\">".$bigOlArray["General"][$value]."</a><br/>";}
                }
                else
                {
                    echo "<a id='link$value' href=\"javascript:display('show', '$value', 'false')\">$value</a><br/>";
                }
                echo "<div id='news$value' style='display:none;'>";
                if(empty($files) && empty($files2))
                    echo "<font style='float:right;width:97%;border-left:black solid 4px;'>No files uploaded in this category yet!</font>";
                else
                    foreach($files as $file)
                    {
                        $file = str_replace("files/$value/", "", $file);
                        echo "<a href=\"files/$value/$file\" style=\"float:right;width:97%;border-left:black solid 4px;\">$file</a>";
                    }
                    foreach($files2 as $file)
                    {
                        $file = str_replace("files/$value/", "", $file);
                        echo "<a href=\"files/$value/$file\" style=\"float:right;width:97%;border-left:black solid 4px;\">$file</a>";
                    }
                echo("</div>");
            }
        ?>
    </div>
<script type="text/javascript">
    function display(action, id, wiki)
    {
        if(action === "show")
            {
                document.getElementById("news"+id).style.display = "block";
                document.getElementById("link"+id).href="javascript:display('hide', '"+id+"', '"+wiki+"')";
            }
        if(action === "hide")
            {
                document.getElementById("news"+id).style.display = "none";
                document.getElementById("link"+id).href="javascript:display('show', '"+id+"', '"+wiki+"')";
            }
    }
</script>
</body>
