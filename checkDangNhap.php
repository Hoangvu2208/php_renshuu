<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
function checkDangNhap($email, $pass)
{
    //check thong tin dang nhap
    //$infoIsValid = false;

    $data = fopen('userList.csv', 'r');
    while (($row = fgetcsv($data)) !== false) {
        $rows[] = $row;
    }
    fclose($data);

    $headers = array_values(array_shift($rows));
    //var_dump($headers);
    //var_dump(array_values($rows));
    $userList = [];
    foreach ($rows as $row) {
        $userList[] = array_combine($headers, $row);
    }
    //var_dump($userList);
    
    foreach ($userList as $user => $value) {
        
        //var_dump($value);
        if ($value['email'] == $email && $value['password'] == $pass) {
            return true;
        }
    }

}
// //checkDangNhap("hoangvu1@gmail.com", "123456");
// var_dump(checkDangNhap("hoangvu3@gmail.com", "123456"));
