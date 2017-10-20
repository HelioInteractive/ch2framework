<?php


$actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ( strpos( $actual_link, '.dev' ) !== false ) :
	?>
	<?php function stripMaker( $name, $type ) {
	$clean_name = cleanName( $name );
	$fancy_name = fancyName( $name );
	if ( $type === 'layout' ):
		makeLayout();

    elseif ( $type === 'strip' ):

		makeStrip($clean_name, $fancy_name);
		//	makeTemplate();
		//makeStyle();


	endif;

}


	function makeStrip( $clean_name, $fancy_name ) {
		$filename = 'group_' . 'strip' . '_' . $clean_name;
		//if ( ! file_exists( $filename ) ) {
		echo $filename;
		//	}

	}

	function makeLayout( $name, $type ) {


	}

	function makeTemplate( $name, $type ) {


	}

	function makeStyle( $name, $type ) {


	}

	function cleanName( $name ) {
		$name = strtolower( $name );
		$name = preg_replace("/[^a-zA-Z0-9]+/", " ", $name);
		$name = trim( $name );
		$name = preg_replace( '/\s+/', '_', $name );

		return $name;
	}

	function fancyName( $name ) {
		$name = strtolower( $name );
		$name = ucfirst( $name );

		return $name;
	}

	?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Strip maker</title>
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


    <h1>Awesome strip maker 2000!!!!</h1>
    <p>use the thingamaginger below to quickly create strips and layouts. then magic will create and prepopulate the
        needed files for this strip to work.</p>


    <form action="" method="get">
        <label for="field-group-name">Field Maker</label>
        <input type="text" class="field-group-name" name="field-group-name"/>
        <select name="filed-group-type">
            <option value="strip">
                Strip
            </option>
            <option value="layout">
                Layout
            </option>

        </select>

        <input type="submit" name="submit" value="Make that thing!!!">
    </form>


	<?php
	if ( isset( $_GET['submit'] ) ) {
		//be sure to validate and clean your variables


		$name = htmlentities( $_GET['field-group-name'] );
		$type = htmlentities( $_GET['filed-group-type'] );
		//then you can use them in a PHP function.
		stripMaker( $name, $type );
	}


	?>

    </body>
    </html>

<?php endif; ?>