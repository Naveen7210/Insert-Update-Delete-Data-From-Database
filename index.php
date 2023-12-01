<?php
include_once 'dbconfig.php';

if (isset($_POST['submit'])) {

    $Name = $_POST['Name'];
    $PhoneNo = $_POST['PhoneNo'];

    $sql_query = "INSERT INTO data (`Name`,`PhoneNo`) VALUES('" . $Name . "','" . $PhoneNo . "')";


    if (mysqli_query($con, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Updated successfully');
            window.location.href = 'index.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('error occured while updating data');
        </script>
<?php
    }
}
if (isset($_POST['btn-cancel'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates</title>


    <style>
        @import url(https://fonts.googleapis.com/css?family=Lily+Script+One);

        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }

        body {
            display: grid;
            justify-content: center;
            align-items: center;
            padding: 1%;
            background-color: lightblue;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            margin-left: -30px;
            border-radius: 5px;
        }

        .container .title::before {
            content: '';
            position: absolute;
            left: 0;
            font-size: 16px;
            bottom: 0;
            height: 5px;
            width: 30px;
        }

        .container form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        form .user-details .input-box {
            margin: 20px 0 12px 0;
            width: calc(100% / 2 - 20px);
        }

        .user-details .input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .button {
            height: 45px;
            margin: 20px 0 12px 0;
            width: calc(100% / 2 - 20px);
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            letter-spacing: 1px;
            background: lightblue;
        }

        .content-table {
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 0.9em;
            width: 550px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }


        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .content-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        @media (max-width: 600px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            .container form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 0;
            }
        }
    </style>

    <script type="text/javascript">
        function edit_id(id) {
            window.location.href = 'edit.php?edit_id=' + id;
        }

        function delete_id(id) {
            window.location.href = 'delete.php?delete_id=' + id;
        }
    </script>

</head>

<body>

    <div class="container">
        <div class="title">Add Details</div>
        <form method="post" enctype="multipart/form-data">

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="Name" placeholder="Enter Your Name">
                </div>
                <div class="input-box">
                    <span class="details">PhoneNo</span>
                    <input type="text" name="PhoneNo" placeholder="Enter Your Phone No">
                </div>
            </div>
            <div class="user-details">
                <div class="button">
                    <input type="submit" name="submit" value="Submit">
                </div>
                <div class="button">
                    <input type="submit" name="btn-cancel" value="Cancel">
                </div>
            </div>

        </form>
    </div>

    <center>
        <tr>
            <td colspan="4" align="center">
                <h2></h2>
            </td>
        </tr>
    </center>

    <table class="content-table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>PhoneNo</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $rows = mysqli_query($con, "SELECT * FROM data");
            ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["PhoneNo"]; ?></td>
                    <td><a style="text-decoration: none;" href="javascript:edit_id('<?php echo $row["Id"]; ?>')">Update</a></td>
                    <td><a style="text-decoration: none;" href="javascript:delete_id('<?php echo $row["Id"]; ?>')">Delete</a></td>
                </tr>
                <?php
                $i++;
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>