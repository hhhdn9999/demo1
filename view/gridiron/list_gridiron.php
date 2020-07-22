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
            if (is_array($data) || is_object($data))
            {
            $no = 1;
            foreach ($data as $value) {
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
    <?php
            if(isset($_SESSION['S_delete']))
            {
                echo "<p style=\"color: green; text-align: center\">Delete Gridiron Success</p>";
                unset($_SESSION['S_delete']);
                // header("Location: ?controller=gridiron&action=list");
            }
        ?>
    <?php
    if($_SESSION['S_id'] != 1) echo '<a href="?controller=gridiron&action=add">Add new Gridiron</a>'
    ?>
</div>


<div id="inner">
        <table>
            <tr>
                <th></th>
                <th class="space">Sân 1</th>
                <th class="space">Sân 2</th>
                <th class="space">Sân 3</th>
                <th class="space">Sân 4</th>
            </tr>
            <tr>
                <td>4h30 ----- 5h30</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_11'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >11</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_12'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >12</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_13'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >13</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_14'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >14</td>
            </tr>
            <tr>
                <td>5h30 ----- 6h30</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_21'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >21</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_22'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >22</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_23'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >23</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_24'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                               >24</td>
            </tr><tr>
                <td>6h30 ----- 7h30</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_31'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >31</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_32'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >32</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_33'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >33</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_34'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >34</td>
            </tr><tr>
                <td>7h30 ----- 8h30</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_41'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >41</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_42'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >42</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_43'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >43</td>
                <td class="spacee"   <?php if(isset($_SESSION['S_44'])) { ?>   style="background-color:red;"  <?php  } else { ?>   style="background-color:green;"  <?php  } ?>                                                                >44</td>
            </tr>
        </table>
    </div>
    
<style>
.spacee {
    width:120px;
    height:80px;
    text-align:center;
    background-color:green;
}
#inner {
  width: 35%;
  margin: 0 auto;
}
.space {
    height: 50px;
}
</style>