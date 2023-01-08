
<?php 
    function login()
    {
      if (!empty($_SESSION['login_user'])) {
        return true;
      }
      return false;
    }

    if(login() == false){
      include('data_not_login.php');
    }
    else{
      include('data.php');
    }
?>