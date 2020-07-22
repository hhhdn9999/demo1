<?php
    ob_start();
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = '';
    }

    $thanhcong = array();
    $thatbai = array();

    switch ($action)
    {
        case 'add' :
            if(isset($_POST['handle_add']))
            {
                if(empty($_POST['hoten']) || empty($_POST['sdt']) || empty($_POST['time']) || empty($_POST['gridiron']) || empty($_POST['dayplay']))
                {
                    $thatbai[] = 'add_fails';
                }
                else {
                    $hoten = $_POST['hoten'];
                    $sdt = $_POST['sdt'];
                    $time = $_POST['time'];
                    $gridiron = $_POST['gridiron'];
                    $datplay = $_POST['dayplay'];
    
                    if($db->InsertData($hoten, $sdt, $time, $gridiron, $datplay))
                    {
                        $thanhcong[] = 'add_success';
                    }
                }
            }
            require_once  'view/gridiron/add_gridiron.php';
            break;
        case 'edit' :
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $tblTable = 'gridiron';
                $Data_ID =$db->getDataID($tblTable, $id);

                if(isset($_POST['handle_update']))
                {
                    if(empty($_POST['hoten']) || empty($_POST['sdt']) || empty($_POST['time']) || empty($_POST['gridiron']) || empty($_POST['dayplay']))
                    {
                        $thatbai[] = 'add_fails';
                    }
                    else 
                    {
                        $hoten = $_POST['hoten'];
                        $sdt = $_POST['sdt'];
                        $time = $_POST['time'];
                        $gridiron = $_POST['gridiron'];
                        $dayplay = date($_POST['dayplay']);
                        if($db->UpdateData($id ,$hoten, $sdt, $time, $gridiron, $dayplay))
                        {
                            $thanhcong[] = 'update_success';
                        }
                    }
                }
            }
            require_once  'view/gridiron/edit_gridiron.php';
            break;
        case 'delete' :
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $tblTable = 'gridiron';
                if($db->DeleteData($id, $tblTable)) {
                    $_SESSION['S_delete'] = 'delete_success';
                    $thanhcong[] = 'delete_success';
                    header("Location: ?controller=gridiron&action=list");
                    echo $id , $tblTable;
                }else {
                    echo $id , $tblTable;
                    header("Location: ?controller=gridiron&action=list");
                }

            }
            break;
        case 'search':
            if(isset($_GET['key'])) {
                $key = $_GET['key'];
                $tblTable ='gridiron';
                if($db->SearchData($tblTable, $key)) {
                    $data_Search = $db->SearchData($tblTable, $key);
                } else {
//                    header("Location: ?controller=thanh-vien&action=list");
                    $data_Search = 0;
                    $thanhcong[] = 'search_success';
                }


            }
            require_once 'view/gridiron/search_gridiron.php';
            break;

            case 'list':
                $tblTable = "gridiron";
                $data = $db->getAllData($tblTable);
                $db->showtable();


                require_once 'view/gridiron/list_gridiron.php';
                break;

            case 'logout':
                session_destroy();
                header("Location: /PHP/SUN/DEMO1");
                break;
 
           default:
                if(isset($_POST['handle_login']))
                {
                    echo "dasdsa";
                    $user_name = $_POST['u'];
                    $password = $_POST['p'];
                    
                    if($db->fn_login($user_name, $password))
                    {
                        $level = $db->fn_login($user_name, $password);
                        
                        $thanhcong[] = 'login_success';
                        header("Location: ?controller=gridiron&action=list");
                    }
                }
                require_once  'view/login/formlogin.php';
                break;
    }
?>
