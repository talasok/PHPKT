<?php include_once ("header.php");
include_once("model/hanhdong.php");?>
<?php 
$keyWord = null;
if(isset($_REQUEST["search"])){
    $keyWord =$_REQUEST["search"];
}
if (isset($_REQUEST["addThongtin"])) {
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $content =  array();
    array_push($content,$name);
    array_push($content,$phone);
    array_push($content,$email);
    ThongTin::addToDB($content);
    
}
if (isset($_REQUEST["editThongtin"])) {
    $id = $_REQUEST["id3"];
    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $content =  array();
    array_push($content,$id);
    array_push($content,$name);
    array_push($content,$phone);
    array_push($content,$email);
    ThongTin::editDB($content);
}
if(isset($_REQUEST["action"])){
    if(strcmp($_REQUEST["action"],"xoa")==0){
        ThongTin::deleteDB($_REQUEST["id"]);
    }
} 

$lsFromFile=ThongTin::getSearch($keyWord);
if($keyWord!=""){
    if($lsFromFile != null ){
        $lsFromDB= ThongTin::getSearch($keyWord);
    }
    else{
        $lsFromDB= ThongTin::getListFromDB();
    }
}
else{
    $lsFromDB= ThongTin::getListFromDB();
}

?>
<div class="container">
    <H1 style="text-align: center;color: red;">Contacts</H1>
    <div>
        <form action="" method="get" style="display: flex;">
            <input type="text" name="search" value="<?php echo $keyWord;?>" class="form-control" placeholder="Search for..." >
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- thêm -->
    <div class="row" style="padding-top: 40px; padding-bottom: 30px;">
        <button data-toggle="modal" data-target="#addModal" class="btn btn-outline-primary" style="margin-left: 1025px"><i class="fas fa-plus-circle"></i> Thêm</button>
    </div>
    <!-- modal thêm -->
    <form action="index.php" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <!-- <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                <div class="col-md-10">
                                    <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                </div>
                            </div> -->
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Name</label>
                                <div class="col-md-10">
                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Phone</label>
                                <div class="col-md-10">
                                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Email">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="email" name="email" placeholder="nva@gmail.com" class="form-control input-md">   
                                </div>
                            </div>  
                        </fieldset>
                    </div>  
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addThongtin" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- kết thúc modal thêm -->
    <!-- modal sửa -->
    <form action="index.php" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                <div class="col-md-10">
                                    <input id="id1" name="id" type="text" placeholder="ID" disabled class="form-control input-md">
                                    <input  id="id2" name="id3" type="text" placeholder="ID" class="form-control input-md" style="display: none;">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Name</label>
                                <div class="col-md-10">
                                    <input id="name1" name="name" type="text" placeholder="Name" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Title">Phone</label>
                                <div class="col-md-10">
                                    <input id="phone1" name="phone" type="text" placeholder="Phone" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="pt-1 col-md-2 control-label" for="Email">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="email1" name="email" placeholder="nva@gmail.com" class="form-control input-md">   
                                </div>
                            </div>  
                        </fieldset>
                    </div>  
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="editThongtin" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- kết thúc modal sửa-->
    <!-- Table dữ liệu -->
    <div class="row">
        <table class ="table table-bordered" >
            <thead class="thead-dark" align="center">
                <tr>
                    <th colspan="1"> STT</th>
                    <th colspan="2"> Name</th>
                    <th colspan="2"> Phone</th>
                    <th colspan="2"> Email</th>
                    <th colspan="6"> Thao tác </th  >
                  </tr>
             </thead>
            <tbody align="center">
               <?php 
               //độ dài list ls
               // count($ls)
               foreach ($lsFromDB as $key => $value) {
                ?>
               <tr>
                    <th colspan="1"><?php echo $value->id ?></th>
                    <td colspan="2"><?php echo $value->name ?></td>
                    <td colspan="2"><?php echo $value->phone?></td>
                    <td colspan="2"><?php echo $value->email ?></td>
                    <td> <button onclick="func(this)" id="editThongtin" data-toggle="modal" data-target="#editModal" class="btn btn-outline-warning" name="BtnEdit"
                    eid="<?php echo $value->id ?>" ename="<?php echo $value->name?>" ephone="<?php echo $value->phone ?>" eemail="<?php echo $value->email ?>">
                    <i class="fas fa-edit"></i>Sửa </button>
                    <a href="index.php?action=xoa&&id=<?php echo $value->id ?>" type="submit" class="btn btn-outline-danger" nanme="deleteBook"><i class="fas fa-trash-alt"></i>Xóa </a>
                    </td>
               </tr>
               <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once ("footer.php")?>