<?php
function employee_view() {
    $query = "SELECT * FROM employee";
    include 'connection.php';

    $result = mysqli_query($connect, $query);
    $rows = [];

    if(mysqli_num_rows($result) > 0 ) {
        while($result_into_array = mysqli_fetch_assoc($result)) {
            $rows[] = $result_into_array;
        }
    }
    // var_dump($rows);
    return $rows;
}

function m_deleteemployee(){
    include 'connection.php';
    $id = $_GET['id'];
    $query = "DELETE FROM employee WHERE id= '$id'";
    $delete = mysqli_query($connect,$query);
    return $delete;
}
function detail_employee(){
    include 'connection.php';
    $id = $_GET['id'];

    $query = "SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row;
    return $result;
}

function  validateFromDb(){
    include 'connection.php';
        $uname = mysqli_real_escape_string($connect,$_POST['txt_uname']);
        $password = mysqli_real_escape_string($connect,$_POST['txt_pwd']);
    
        if ($uname != "" && $password != ""){
            $sql_query = "SELECT count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
            $result = mysqli_query($connect,$sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
    
            if($count > 0){
                $_SESSION['uname'] = $uname;
                header('Location: index.php ?action=view');
            }else{
                header('Location: index.php ?action=login');

            }
    
        
    
    }
    

}
function   registerForm(){
    include_once "connection.php";
    if(isset($_POST['btn'])){
        $name = $_POST['username'];
        $username = $_POST['name'];
        $password = $_POST['password'];
        $query="INSERT INTO user(username,name,password) 
        values('$username','$name',md5('$password'))";
        $register=mysqli_query($connect,$query);
        return $register;

    }
 
}
function  ManageUser(){
    include 'connection.php';
    $query = "SELECT * FROM user";
    $result = mysqli_query($connect, $query);
    $rows = [];

    if(mysqli_num_rows($result) > 0 ) {
        while($result_into_array = mysqli_fetch_assoc($result)) {
            $rows[] = $result_into_array;
        }
    }
    // var_dump($rows);
    return $rows;
}

function insert_user($data)
{
    include 'connection.php';
$this->db->insert('register', $data);
}


