<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */

require_once('class.phpmailer.php');  
function SendMail($Sendto,$Body,$Subject)
{
    global $error;
    $mail = new PHPMailer();  // t?o m?t d?i tu?ng m?i t? class PHPMailer
    $mail->IsSMTP(); // b?t ch?c nang SMTP
    $mail->SMTPDebug = 0;  // ki?m tra l?i : 1 l�  hi?n th? l?i v� th�ng b�o cho ta bi?t, 2 = ch? th�ng b�o l?i
    $mail->SMTPAuth = true;  // b?t ch?c nang dang nh?p v�o SMTP n�y
    $mail->SMTPSecure = 'ssl'; // s? d?ng giao th?c SSL v� gmail b?t bu?c d�ng c�i n�y
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = "thietkeweb.theoyeucau@gmail.com";  
    $mail->Password = "bachkhoa";           
    $mail->SetFrom("thietkeweb.theoyeucau@gmail.com", "timkiemphongtro.com");
    $mail->Subject = $Subject;
    $mail->Body = $Body;
    $mail->AddAddress($Sendto);
    if(!$mail->Send()) {
        $error = 'G?i mail b? l?i: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'thu c?a b?n d� du?c g?i di ';
        return true;
    }
}  
?>