<?php
include 'lib/bones.php';

//echo $_GET['request'];

get('/',function($app){
    echo "HOME";
}) ;

get('/signup',function($app){
    echo "Signup!";
});

/**
if($_GET['request'] == ''){
    echo "Welcome to Verge";
}elseif ($_GET['request'] == 'signup'){
    echo "Sign UP !";
}
   */


?>