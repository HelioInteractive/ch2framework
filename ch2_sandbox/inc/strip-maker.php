<?php


$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, '.dev') !== false) :
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Strip maker</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">


</head>

<body>


<h1>Awesome strip maker 2000!!!!</h1>
<p>use the thingamaginger below to quickly create strips and layouts. then magic will create and prepopulate the needed files for this strip to work.</p>

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
<button class="go">
    Make that thing!!!
</button>

<script>









</script>
</body>
</html>

<?php else:
    echo 'this is not a local install, make em strips locally and sync wup not down';

endif; ?>