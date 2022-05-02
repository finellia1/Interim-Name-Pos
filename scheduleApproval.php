<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css\scheduleApproval.css" rel="stylesheet">

</head>
    <body>
        <?php
            echo "test";
            include_once("classes\dbh.classes.php");
            $dbhObject = new Dbh();
            //Includes dbh class written by Chris and instantiates to object
            $dbh = $dbhObject->connect();
            $sth = $dbh->connect()->prepare('SELECT * from employee');
            $sth->execute();
            $employees -> $sth->fetchAll;
            echo $employees[0][0];
            //Above was created in reference to example 2 in https://www.php.net/manual/en/pdo.prepare.php
        ?>
        <table id="Requests">
            <tr> 
                <th>RequestID</th>
                <th>Packing List</th>
                <th>Is Pickup </th>
                <th>Pickup Date </th>
                <th>Pickup Time </th>
                <th>Travel Time </th>
            </tr>
            <tr>
                <td>1</td>
                <td>Link</td>
                <td>Is Pickup</td>
                <td>5/1/22</td>
                <td>5/1/22</td>
                <td>2 hours</td>
                <td>
                    <form> 
                        <input type=submit value = "CONFIRM">
                    </form>
                </td>
                <td>
                    <form>
                      <input type=submit value = "REJECT">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>