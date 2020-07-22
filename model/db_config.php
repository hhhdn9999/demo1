<?php
    
session_start();

class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'demo1';

    private $conn = NULL;
    private $result = NULL;

    public function Connect() {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if(!$this->conn) {
            echo "Connect Database is Failed";
        } else {
            mysqli_set_charset($this->conn, 'urf8');
//            echo "Success";
        }
        return $this->conn;
    }

    //thuc thi cau lenh truy van
    public function execute ($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    //phuong thuc lay du lieu
    public function getData()
    {
        if($this->result) {
            $data = mysqli_fetch_array($this->result);
        }
        else {
            $data = 0;
        }
        return $data;
    }
    // phuong thuc lay toan bo du lieu
    public function getAllData($table){
        $id_kv = $_SESSION['S_id'];
        switch ($id_kv) {
            case '1':
                $sql = "SELECT * FROM $table ORDER BY gridiron, `time` ASC";
                break;
            case '2':
                $sql = "SELECT * FROM $table WHERE khuvuc = 2 ORDER BY gridiron, `time` ASC";
                break;
            case '3':
                $sql = "SELECT * FROM $table WHERE khuvuc = 3 ORDER BY gridiron, `time` ASC";
                break;
            case '4':
                $sql = "SELECT * FROM $table WHERE khuvuc = 4 ORDER BY gridiron, `time` ASC";
                break;
            
            default:
                # code...
                $sql = "SELECT * FROM $table ORDER BY gridiron, `time` ASC";
                break;
        }
        
        $this->execute($sql);
        if($this->num_rows()==0){
            $data =0;
        }
        else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        // showtable();
        return $data;
    }

    //phuong thuc lay du lieu chinh sua theo id
    public function getDataID($table , $id)
    {
        $sql = "SELECT *FROM $table where id = $id ";
        $this->execute($sql);
        if($this->num_rows()!=0) {
            $data = mysqli_fetch_array($this->result);
        }
        else {
            $data = 0;
        }
        return $data;
    }

    //phuong thuc dem so ban ghi :

    public function num_rows(){
        if($this->result){
            $num = mysqli_num_rows($this->result);
        }else
        {
            $num = 0;
        }
        return $num;
    }

    //phuong thuc them du lieu
    public function InsertData ($hoten, $sdt, $time, $gridiron, $dayplay) {
        $sql = "INSERT INTO `gridiron`( `hoten`, `sdt`, `time`, `gridiron`, `khuvuc`, `dayplay`) VALUES ('$hoten','$sdt','$time', '$gridiron' ,'".$_SESSION['S_id']."', '$dayplay')";
        // var_dump($sql);
        return $this->execute($sql);
    }
    //phuong thuc chinh sua du lieu
    public function UpdateData ( $id, $hoten, $sdt, $time, $gridiron , $dayplay) {
        $sql = "UPDATE `gridiron` SET `hoten` = '$hoten', `sdt` = '$sdt' ,`time` = '$time' ,`gridiron` = '$gridiron', `dayplay` = '$dayplay' WHERE `gridiron`.`id` = '$id'";
        return $this->execute($sql);
    }
    //phuong thuc xoa
    public function DeleteData ($id , $tblTable) {
        $sql = "DELETE FROM $tblTable WHERE `id` = $id";
        return $this->execute($sql);
    }
    // phuong thuc search :
    public function SearchData($table , $key){
        $sql = "SELECT * FROM $table where sdt LIKE '%$key%'  ORDER  BY id DESC " ;
        $this->execute($sql);
        if($this->num_rows()==0){
            $data =0;
        }
        else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    // phuong thuc show 
    public function showtable()
    {
        $sql11 = "SELECT * FROM `gridiron` WHERE `time` = 1 AND `gridiron` = 1 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql12 = "SELECT * FROM `gridiron` WHERE `time` = 1 AND `gridiron` = 2 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql13 = "SELECT * FROM `gridiron` WHERE `time` = 1 AND `gridiron` = 3 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql14 = "SELECT * FROM `gridiron` WHERE `time` = 1 AND `gridiron` = 4 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql21 = "SELECT * FROM `gridiron` WHERE `time` = 2 AND `gridiron` = 1 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql22 = "SELECT * FROM `gridiron` WHERE `time` = 2 AND `gridiron` = 2 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql23 = "SELECT * FROM `gridiron` WHERE `time` = 2 AND `gridiron` = 3 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql24 = "SELECT * FROM `gridiron` WHERE `time` = 2 AND `gridiron` = 4 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql31 = "SELECT * FROM `gridiron` WHERE `time` = 3 AND `gridiron` = 1 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql32 = "SELECT * FROM `gridiron` WHERE `time` = 3 AND `gridiron` = 2 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql33 = "SELECT * FROM `gridiron` WHERE `time` = 3 AND `gridiron` = 3 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql34 = "SELECT * FROM `gridiron` WHERE `time` = 3 AND `gridiron` = 4 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql41 = "SELECT * FROM `gridiron` WHERE `time` = 4 AND `gridiron` = 1 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql42 = "SELECT * FROM `gridiron` WHERE `time` = 4 AND `gridiron` = 2 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql43 = "SELECT * FROM `gridiron` WHERE `time` = 4 AND `gridiron` = 3 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";
        $sql44 = "SELECT * FROM `gridiron` WHERE `time` = 4 AND `gridiron` = 4 AND `dayplay` = curdate() AND khuvuc = '".$_SESSION['S_id']."' ";

        $result11 = mysqli_query($this->conn, $sql11);  $result12 = mysqli_query($this->conn, $sql12);
        $result13 = mysqli_query($this->conn, $sql13);  $result14 = mysqli_query($this->conn, $sql14);

        $result21 = mysqli_query($this->conn, $sql21);  $result22 = mysqli_query($this->conn, $sql22);
        $result23 = mysqli_query($this->conn, $sql23);  $result24 = mysqli_query($this->conn, $sql24);

        $result31 = mysqli_query($this->conn, $sql31);  $result32 = mysqli_query($this->conn, $sql32);
        $result33 = mysqli_query($this->conn, $sql33);  $result34 = mysqli_query($this->conn, $sql34);

        $result41 = mysqli_query($this->conn, $sql41);  $result42 = mysqli_query($this->conn, $sql42);
        $result43 = mysqli_query($this->conn, $sql43);  $result44 = mysqli_query($this->conn, $sql44);

        if((mysqli_fetch_array($result11)) == NULL) unset($_SESSION['S_11']);   else    {$_SESSION['S_11'] = 11;};
        if((mysqli_fetch_array($result12)) == NULL) unset($_SESSION['S_12']);   else    {$_SESSION['S_12'] = 12;};
        if((mysqli_fetch_array($result13)) == NULL) unset($_SESSION['S_13']);   else    {$_SESSION['S_13'] = 13;};
        if((mysqli_fetch_array($result14)) == NULL) unset($_SESSION['S_14']);   else    {$_SESSION['S_14'] = 14;};
        if((mysqli_fetch_array($result21)) == NULL) unset($_SESSION['S_21']);   else    {$_SESSION['S_21'] = 21;};
        if((mysqli_fetch_array($result22)) == NULL) unset($_SESSION['S_22']);   else    {$_SESSION['S_22'] = 22;};
        if((mysqli_fetch_array($result23)) == NULL) unset($_SESSION['S_23']);   else    {$_SESSION['S_23'] = 23;};
        if((mysqli_fetch_array($result24)) == NULL) unset($_SESSION['S_24']);   else    {$_SESSION['S_24'] = 24;};
        if((mysqli_fetch_array($result31)) == NULL) unset($_SESSION['S_31']);   else    {$_SESSION['S_31'] = 31;};
        if((mysqli_fetch_array($result32)) == NULL) unset($_SESSION['S_32']);   else    {$_SESSION['S_32'] = 32;};
        if((mysqli_fetch_array($result33)) == NULL) unset($_SESSION['S_33']);   else    {$_SESSION['S_33'] = 33;};
        if((mysqli_fetch_array($result34)) == NULL) unset($_SESSION['S_34']);   else    {$_SESSION['S_34'] = 34;};
        if((mysqli_fetch_array($result41)) == NULL) unset($_SESSION['S_41']);   else    {$_SESSION['S_41'] = 41;};
        if((mysqli_fetch_array($result42)) == NULL) unset($_SESSION['S_42']);   else    {$_SESSION['S_42'] = 42;};
        if((mysqli_fetch_array($result43)) == NULL) unset($_SESSION['S_43']);   else    {$_SESSION['S_43'] = 43;};
        if((mysqli_fetch_array($result44)) == NULL) unset($_SESSION['S_44']);   else    {$_SESSION['S_44'] = 44;};
        return 0;
    }

    public function fn_login($username, $password)
    {
        $sql = "SELECT `id`, `user_name`, `password`, `level` FROM `users` WHERE `user_name` = '$username' AND `password` = '$password'";
   
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            while ($row=mysqli_fetch_array($result)) {
                $id_quan = $row['id'];
                switch ($id_quan) {
                    case '1':
                        # code...
                        $_SESSION['S_user_name'] = 'Admin';
                        break;
                    case '2':
                        # code...
                        $_SESSION['S_user_name'] = 'Hải châu';
                        break;
                    case '3':
                        # code...
                        $_SESSION['S_user_name'] = 'Thanh khê';
                        break;
                    case '4':
                        # code...
                        $_SESSION['S_user_name'] = 'Liên chiểu';
                        break;
                                            
                    default:
                        # code...
                        $_SESSION['S_user_name'] = 'No body';
                        break;
                }
                $_SESSION['S_level'] = $row['level'];
                $_SESSION['S_id'] = $row['id'];
            }
        }
        return $result;
    }
}


