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
    <title>Edit Gridiron</title>
</head>
<body>
<div class="form">
    <h3>Add New Gridiron</h3>
    <form action="#" method="POST">
    <table>
                <tr>
                    <td> Name người đặt sân :  </td>
                    <td><input value="<?php /** @var TYPE_NAME $Data_ID */echo $Data_ID['hoten'] ?>" type="text" name="hoten" placeholder="Enter to Name"></td>
                </tr>
                <tr>
                    <td>  Phone number người đặt sân :  </td>
                    <td><input value="<?php /** @var TYPE_NAME $Data_ID */echo $Data_ID['sdt'] ?>"  type="text" name="sdt" placeholder="Enter to Your Phone"></td>
                </tr>
                <tr>
                    <td>Chọn ngày đá : </td>
                    <td>
                    <input value="<?php /** @var TYPE_NAME $Data_ID */echo $Data_ID['dayplay'] ?>" type="date" id="birthday" name="dayplay">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="time">Choose a time : </label>
                    </td>

                    <td>
                        <select id="time" name="time">
                            <option value="">Choose a time </option>
                            <option value="1" <?php if($Data_ID['time']==1) echo "selected" ?> >4h30 ----- 5h30</option>
                            <option value="2" <?php if($Data_ID['time']==2) echo "selected" ?>>5h30 ----- 6h30</option>
                            <option value="3" <?php if($Data_ID['time']==3) echo "selected" ?>>6h30 ----- 7h30</option>
                            <option value="4" <?php if($Data_ID['time']==4) echo "selected" ?>>7h30 ----- 8h30</option>
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
                            <option value="1" <?php if($Data_ID['gridiron']==1) echo "selected" ?>>Sân số 1</option>
                            <option value="2" <?php if($Data_ID['gridiron']==2) echo "selected" ?>>Sân số 2</option>
                            <option value="3" <?php if($Data_ID['gridiron']==3) echo "selected" ?>>Sân số 3</option>
                            <option value="4" <?php if($Data_ID['gridiron']==4) echo "selected" ?>>Sân số 4</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <br>
                    <td>&nbsp;</td>
                    <th>
                        <input style="margin-top:30px" type="submit" name="handle_update"  value="Edit Gridiron" >
                    </th>
                </tr>
            </table>
    </form>
    <?php
    if(isset($thanhcong) && in_array('update_success', $thanhcong))
    {
       echo "<p style=\"color: green; text-align: center\">Update Gridiron Success</p>";
        // header("Location: ?controller=thanh-vien&action=list");
    }
    ?>
    <a href="?controller=thanh-vien&action=list">List Gridiron</a>
</div>
</body>
</html>