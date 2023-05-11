<?php 
    function login_log($email,$pass){
        if ($email != '' && $pass != '') {
           // var_dump(file_exists('userHistory.txt'));
           $file = fopen('userHistory.txt', 'w') or die('Khong mo duoc file');
           $time = date('d-m-y h:i:s');
           $data = 'nguoi dung co email ' . $email . ' da dang nhap vao luc' . $time;
           fwrite($file, $data);
           fwrite($file, "\r\n");
           fclose($file);
           // /echo 'Ghi du lieu thanh cong';
        }
    }


?>