<?php
    require_once 'header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Gridiron</title>
</head>
<body>
    <div class="form">
        <h3>Add New Gridiron</h3>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td> Name người đặt sân :  </td>
                    <td><input type="text" name="hoten" placeholder="Enter to Name"></td>
                </tr>
                <tr>
                    <td>  Phone number người đặt sân :  </td>
                    <td><input type="text" name="sdt" placeholder="Enter to Phone"></td>
                </tr>
                <tr>
                    <td>Chọn ngày đá : <?php echo date("Y-m-d"); ?></td>
                    <td>
                    <input min="<?php echo date("Y-m-d"); ?>" max="2020-12-31" type="date" id="birthday" name="dayplay">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="time">Choose a time : </label>
                    </td>

                    <td>
                        <select id="time" name="time">
                            <option value="">Choose a time </option>
                            <option value="1">4h30 ----- 5h30</option>
                            <option value="2">5h30 ----- 6h30</option>
                            <option value="3">6h30 ----- 7h30</option>
                            <option value="4">7h30 ----- 8h30</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gridiron">Choose a gridiron : </label>
                    </td>

                    <td>
                        <select id="gridiron" name="gridiron">
                            <option value="">Choose a gridiron </option>
                            <option value="1">Sân số 1</option>
                            <option value="2">Sân số 2</option>
                            <option value="3">Sân số 3</option>
                            <option value="4">Sân số 4</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <br>
                    <td>&nbsp;</td>
                    <th>
                        <input style="margin-top:30px" type="submit" name="handle_add" value="Add Gridiron">
                    </th>
                </tr>
            </table>
        </form>

        <?php
            if(isset($thanhcong) && in_array('add_success', $thanhcong))
            {
                echo "<p style=\"color: green; text-align: center\">Add Gridiron Success</p>";
                // header("Location: ?controller=gridiron&action=list");
            }
            if(isset($thatbai) && in_array('add_fails', $thatbai))
            {
                echo "<p style=\"color: red; text-align: center\">Add Gridiron Fails. Please check again.</p>";
                // header("Location: ?controller=gridiron&action=list");
            }
        ?>


        <a href="?controller=gridiron&action=list">List Gridiron</a>
    </div>
 
</body>
</html>
