<?php
if (!isset ($city)) {$city = '';}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
    <main>
        <h1>Weather App Finder</h1>
        <?php if (!empty ($error_message)) { ?>
            <p class="error">
                <?php echo $error_message; ?>
            </p>
        <?php } ?>
        <p>Enter City Name Below</p>
        <form action="display_results.php" method="post">
            <div>
            <label>CITY: </label>
            <input type="text" name = "city"
            value = "<?php echo $city;?>"><br>
            </div>
            <div id="buttons">
                <label></label>
                <input type="submit" value="Get Weather" >
            </div>
        </form>
    </main>
</body>


</html>