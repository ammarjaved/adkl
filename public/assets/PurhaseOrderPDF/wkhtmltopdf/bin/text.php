<?php 

 $file_path = 'D:\xampp\htdocs\abdl\adkl\public\assets\PurhaseOrderPDF';

 $app_no = "41460609";

echo exec("c:\WINDOWS\system32\cmd.exe /c START test.bat ".$app_no." ".$file_path); 
 

?>