<!DOCTYPEhtml>
<html lnag="en">
  <head>
    <meta charset="utf-8">
	<title>Simple blog-post generator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
		<?php
			
			function set_file($title, $content) {
				// create file.html with post contents
				$date = date("Y-m-d");
				$file = fopen('blog_post.html', 'w');
				$contents = "<h1>$title</h1>";
				$contents .= "<p class='main small'>Posted: $date</p><br>";
				$contents .= "<p class='main'>$content</p>";
				fwrite($file, $contents);
				
				fclose($file);
				
			}
			
			function get_file() {
				// assign file contents to variable
				$contents = file_get_contents('blog_post.html');
				
				echo $contents;
			}
						
			$title = $_POST['title'];
			$content = $_POST['content'];
			
			set_file($title, $content);
			get_file();
			
		?>
	</div>
  </body>
</html>