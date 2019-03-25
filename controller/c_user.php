<?php
$data= array();
flexible_function($data);

function flexible_function(&$data) { // Main action to start the system process
    $function = 'login';
    // $function = 'register';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $function = $action; // Get function name from action variable
    }
    $function ($data);        // call function name($data);
}
function login(&$data){
    $data['page']="login";
}
function loginValidate(){
     validateFromDb();

}
//register
function register(&$data){
    $data['page']="register";
}
function registerValidate(){
  $data=  registerForm();
  if($data){
    header("location: index.php?action=login");
}
else{
    header("location: index.php?action=register");

}

}
//
function logout(&$data){
    // logout
 if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php?action=login');
 }
}

//Manageuser
// function ManageUser(&$data){
    
// }
function validateUser(){
    ManageUser();

}

// function manageUser(&$data){
//     $data['page']="view/manageuser";
//     if(isset($_POST['but_manage'])){
//         session_destroy();
//         header('Location: index.php?action=manageuser');
//      }
// }

function view(&$data) {
    $data['employee_data'] = employee_view();
    $data['page'] = "employee/view";
}
function add(&$data) {
    $data['page'] = "employee/add";
}
function update(&$data) {
    $data['employee_data']= detail_employee();
    $data['page'] = "employee/update";
}
function delete(&$data) {
   $data_delete =  m_deleteemployee();
   if($data_delete){
    header('location:index.php?action=view');
   }else{
       echo "Connot delete this record";
   }
   // $data['page'] = "employee/delete";
}


?>