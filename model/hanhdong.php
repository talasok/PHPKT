<?php 
    class ThongTin {
        var $id;
        var $name;
        var $phone;
        var $email;
   
        function __construct($id, $name ,$phone, $email)
        {
            $this->id = $id;
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
        }
        static function connect(){
            $con = new  mysqli("localhost","root","","KtraPHP");
            $con->set_charset("utf8");//hướng đối tượng
            if($con->connect_error)
                die("kết nối thất bại. Chi tiết:".$con->connect_error);
            return $con;
        }
        static function getListFromDB(){
            //b1 tạo kết nối
            // $con = new  mysqli("localhost","root","","BookManager");
            // $con->set_charset("utf8");//hướng đối tượng
            // //mysqli_set_charset($con,"utf8");// thủ tục
            // if($con->connect_error){
            //     die("kết nối thất bại. Chi tiết:".$con->connect_error);
            // }
            $con = ThongTin::connect();
            //b2: thao tác với csdl : CRUD
            $sql = "SELECT * FROM thongtin";
            
            $result =  $con->query($sql);
            $ds = array();
            
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                    $thongtin = new ThongTin($row["ID"],$row["Name"],$row["Phone"],$row["Email"]);
                    array_push($ds,$thongtin);
                }
            }
            //b3 : đóng kết nối
            $con->close();
            //echo "<h4>kết nối thành công<h4>";
            return $ds;
        }
        static function addToDB($content)
        {
            $con = ThongTin::connect();
            $sql="INSERT INTO `thongtin`( `Name`, `Phone`, `Email`) VALUES ('$content[0]','$content[1]','$content[2]')";
        // $result =  $con->query($sql);
            if (mysqli_query($con, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            //b3 : đóng kết nối
            $con->close();
        }
        static function editDB($content){
            $con = ThongTin::connect();
            $sql="UPDATE `thongtin` SET `Name`='$content[1]',`Phone`='$content[2]',`Email`='$content[3]' WHERE ID='$content[0]'";
            if (mysqli_query($con, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            $con->close();
        }
        static function deleteDB($id){
            $con = ThongTin::connect();
            $sql="DELETE FROM `thongtin` WHERE ID = '$id'";
            if (mysqli_query($con, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            //b3 : đóng kết nối
            $con->close();
        }
        static function getSearch($search = null){
            $con = ThongTin::connect();
            
            $sql="SELECT * FROM thongtin where ID = '%$search%' or Name like N'%$search%' or Phone like '%$search%' or Email like '%$search%' ";
            $result =  $con->query($sql);
            $ds = array();
            
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                    $thongtin = new ThongTin($row["ID"],$row["Name"],$row["Phone"],$row["Email"]);
                    array_push($ds,$thongtin);
                }
            }
            $con->close();
            return $ds;
        }
    }
?>