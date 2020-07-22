<?php
    require_once 'header.php';
?>
<div class="form">
    <form action="?controller=thanh-vien" method="get" >
        <table>
            <tr>
                <td><input type="text" name="key" placeholder="Enter Your Key Word Want to do Search "></td>
                <td><input type="submit" value="Search"></td>
            </tr>
            <input type="hidden" name="action" value="search">
        </table>
    </form>
</div>
<div class="form">
    <h3>List Gridiron</h3>
    <table class="danhsach">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Time</th>
            <th>Sân</th>
            <th>Khu vực</th>
            <th>Date Book</th>
            <th>Date Play</th>
            <th>Action</th>
        </tr>
        <?php
            if (is_array($data_Search) || is_object($data_Search))
            {
            $no = 1;
            foreach ($data_Search as $value) {
        ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $value['hoten'] ?> </td>
                    <td> <?php echo $value['sdt'] ?> </td>
                    <td> 
                        <?php 
                            switch ($value['time']) {
                                case '1':
                                    echo " 4h30 ---> 5h30";
                                    break;
                                case '2':
                                    echo " 5h30 ---> 6h30";
                                    break;
                                case '3':
                                    echo " 6h30 ---> 7h30";
                                    break;
                                case '4':
                                    echo " 7h30 ---> 8h30";
                                    break;
                                default:
                                    break;
                            }
                        ?> 
                    </td>
                    <td> 
                        <?php 
                            switch ($value['gridiron']) {
                                case '1':
                                    echo " Sân số 1";
                                    break;
                                case '2':
                                    echo " Sân số 2";
                                    break;
                                case '3':
                                    echo " Sân số 3";
                                    break;
                                case '4':
                                    echo " Sân số 4";
                                    break;
                                default:
                                    break;
                            }
                        ?> 
                    </td>
                    <td> 
                        <?php 
                            switch ($value['khuvuc']) {
                                case '2':
                                    echo " Hai Chau" . $value['khuvuc'];
                                    break;
                                case '3':
                                    echo " Thanh Khe"  . $value['khuvuc'];
                                    break;
                                case '4':
                                    echo " Lien Chieu" . $value['khuvuc'];
                                    break;
                                default:
                                    break;
                            }
                        ?> 
                    </td>
                    <td><?php echo $value['date'] ?> </td>
                    <td><?php echo $value['dayplay'] ?> </td>
                    <td>
                        <a href="?controller=gridiron&action=edit&id=<?php echo $value['id']; ?>" title="Go to Edit Gridiron">Edit</a> ||
                        <a href="?controller=gridiron&action=delete&id=<?php echo $value['id']; ?>" title="Go to Delete Gridiron">Delete</a>
                    </td>
                </tr>
        <?php
                $no++;
            }
        }
        ?>
    </table>
    <a href="?controller=gridiron&action=add">Add new Gridiron</a>||<a href="?controller=thanh-vien&action=list">List Gridiron</a>
</div>
<?php
if((isset($thanhcong) && in_array('search_success', $thanhcong)))
{
    echo "<p style=\"color: red; text-align: center\">Not have your key word for Search</p>";
//    header("Location: ?controller=thanh-vien&action=list");
} else {
    echo "<p style=\"color: green; text-align: center\">Search Success</p>";
}
?>