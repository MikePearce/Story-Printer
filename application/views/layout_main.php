<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title_for_layout; ?></title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>	
    <script type="text/javascript" src="/js/jquery.jeditable.mini.js"></script>	
    <script type="text/javascript" src="/js/js.js"></script>	
    <script type="text/javascript" src="/js/jquery.catfish.js"></script>	
	<link href='http://fonts.googleapis.com/css?family=Quicksand|Chivo' rel='stylesheet' type='text/css'>    
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" href="/css/print.css" type="text/css" media="print" />
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body id="home">
    <div id="constraint">
        <div id="message_slider" class="slider"><?echo $info; ?></div>
        <div id="error_slider" class="slider"><?echo $error; ?></div>        
        <div id="header">
            <div id="header_title" class="clearfix">
                <h1><a href="/">Story Printer</a></h1>
            </div>
            <div id="header_nav">
                <ul class="navigation">
                    <li><a href='/'>home</a> |</li>                       
                    <li><a href='/stories/add'>add story manually</a> |</li>
                    <li><a href='/stories/view'>view my stories</a> |</li>
                    <li><a href='/user/settings'>settings</a> |</li>
                    <li><a href='/about'>about</a></li>
                </ul>
            </div>
        </div>
        <div id="main_content">
            <!--
            <div id="menu">
                <ul class="navigation">
                    <li><a href='/'>menu1</a> |</li>
                    <li><a href='/'>mebnu2</a> |</li>
                    <li><a href='/'>mnu2</a></li>
                </ul>    
            </div>
            -->
            <div id="content">
                <?php echo $content_for_layout?>
            </div>
        </div>
    </div>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-4192256-6']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

</body>
</html>
