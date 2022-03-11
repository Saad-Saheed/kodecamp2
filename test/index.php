<?php
require_once('CarMaker.php');
$cars[] = new CarMaker('Toyota', 'Venza-500', '37TA774GF0093HAJ');
$cars[] = new CarMaker('Toyota', 'C-Sport', '12TA774GF7493HED');
$cars[] = new CarMaker('Mecedes', 'Bens-360C', '90TAf4GF0093HFU');
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
    <table border="1" cellspacing="0" cellpadding="5" >
        <thead>
            <tr>
                <th>MAKE</th>
                <th>MODEL</th>
                <th>VIN</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach((object)$cars as $car){
            ?>
                <tr>
                    <td><?php echo $car->make ?></td>
                    <td><?php echo $car->getModel() ?></td>
                    <td><?php echo $car->getVin()  ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>