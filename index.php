<?php
// include database connection file
require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using Stored Procedure </title>
    <meta name="viewport" content="width=device-width, initialscale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.
css" rel="stylesheet">
    <style type="text/css">
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js
"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script> 
        <script src = "https://getbootstrap.com/dist/js/bootstrap.min.js" >
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>PHP CRUD Operations using Stored Procedure</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary"> Insert
                        Record</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Posting Date</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "call sp_read()");
                            $cnt = 1;
                            $row = mysqli_num_rows($sql);
                            if ($row > 0) {
                                while ($result = mysqli_fetch_array($sql)) {
                            ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result['FirstName']); ?></td>
                                        <td><?php echo htmlentities($result['LastName']); ?></td>
                                        <td><?php echo htmlentities($result['EmailId']); ?></td>
                                        <td><?php echo htmlentities($result['ContactNumber']); ?></td>
                                        <td><?php echo htmlentities($result['Address']); ?></td>
                                        <td><?php echo htmlentities($result['PostingDate']); ?></td>
                                        <td><a href="update.php?id=<?php echo
                                                                    htmlentities($result['id']); ?>"><button class="btn btn-primary btnxs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    </tr>
                                <?php
                                    // for serial number increment
                                    $cnt++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="9" style="color:red; font-weight:bold;text-align:center;"> No Record found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>