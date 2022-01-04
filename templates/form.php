<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Your name is <?php echo $number; ?> </p>
    <form method="POST" action="">
        <input name="fullname" type="text" value="<?php if ($number) { echo $number; } ?>">
        <button>Submit</button>
    </form>
</body>
</html>