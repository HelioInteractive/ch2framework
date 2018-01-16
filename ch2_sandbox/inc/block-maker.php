<?php


$actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ( strpos( $actual_link, '.local' ) !== false ) :
	?>

	<?php function blockMaker( $name ) {
	$clean_name = cleanName( $name );
	$fancy_name = fancyName( $name );


		makeblock( $clean_name, $fancy_name );
		//	makeTemplate();
		//makeStyle();
}


	function makeblock( $clean_name, $fancy_name ) {
		$acfName    = 'group_block_' . $clean_name . '.json';
		$phpName    = 'block-' . $clean_name . '.php';
		$sassName   = '_block-' . $clean_name . '.scss';
		$layoutName = $clean_name;
		echo '<br><br>';
		echo 'Copy the text below and use as the layout name in the flexible layout repeater';
		echo '<br><br>';
		echo 'Label: ' .$fancy_name;
		echo '<br><br>';
		echo 'Now, CLOSE this tab/window you do not want it refreshing in the background... sadness will happen.';

		?>

		<?php
		//make php file
		$handle = fopen( '../template-parts/' . $phpName, 'w' ) or die( 'Cannot open file:  ' . $phpName );
		$data = '
		<?php
        /**
        * Template part for displaying a ' . $fancy_name . '.
        */
        ?>
<section class="block ' . $clean_name . '">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
        </div>
    </div>
</section>';
		fwrite( $handle, $data );


		$handle = fopen( '../acf-json/' . $acfName, 'w' ) or die( 'Cannot open file:  ' . $acfName );
		$data =

			'{
    "key": "group_block_' . $clean_name . '",
    "title": "Block - ' . $fancy_name . '",
    "fields": false,
    "location": [
        [
            {
                "param": "post_type",
                "operator": "==",
                "value": "post"
            },
            {
                "param": "post_type",
                "operator": "!=",
                "value": "post"
            }
        ]
    ],
    "menu_order": 0,
    "position": "normal",
    "style": "seamless",
    "label_placement": "top",
    "instruction_placement": "label",
    "hide_on_screen": "",
    "active": 1,
    "description": "",
    "modified": ' . time() . '
}
                
                ';
		fwrite( $handle, $data );


		$handle = fopen( '../assets/sass/blocks/' . $sassName, 'w' ) or die( 'Cannot open file:  ' . $sassName );
		$data =
			'.block.' . $clean_name . ' {
  .outer-block-wrapper {
	@extend .container
  }
  .inner-block-wrapper {
	@extend .row;
  }
  /*content here*/
  
  
  
  
  
}
			';
		fwrite( $handle, $data );

		$sassImport = '/*--------------------------------------------------------------
# ' . $fancy_name . '
--------------------------------------------------------------*/
@import "block-' . $clean_name . '";

';
		file_put_contents( '../assets/sass/blocks/_blocks.scss', $sassImport, FILE_APPEND );

	}



	function cleanName( $name ) {
		$name = strtolower( $name );
		$name = preg_replace( "/[^a-zA-Z0-9]+/", " ", $name );
		$name = trim( $name );
		$name = preg_replace( '/\s+/', '_', $name );

		return $name;
	}

	function fancyName( $name ) {
		$name = strtolower( $name );
		$name = preg_replace( "/[^a-zA-Z0-9]+/", " ", $name );
		$name = trim( $name );
		$name = ucfirst( $name );

		return $name;
	}

	?>

    <!doctype html>
    <html lang="en">
    <head>

        <meta charset="utf-8">

        <title>block maker</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">


        <style>
            body {
                margin: 0 auto;
                max-width: 600px;
            }
        </style>
    </head>

    <body>


    <h1>Awesome block maker 2000!!!!</h1>
    <p>Use the thingamaginger below to quickly create blocks (no layouts yet). THEN magic will create and pre-populate
        the
        needed files for this block to work. This WILL overwrite the file if it exists. Wield RESPONSIBLY</p>


    <form action="" method="get">
        <label for="field-group-name">Field Maker</label>
        <input type="text" class="field-group-name" name="field-group-name"/>

        <input type="submit" name="submit" value="Make that thing!!!">
    </form>


	<?php
	if ( isset( $_GET['submit'] ) ) {
		//be sure to validate and clean your variables


		$name = htmlentities( $_GET['field-group-name'] );
		//then you can use them in a PHP function.
		blockMaker( $name);
	}


	?>

    </body>
    </html>

<?php endif; ?>