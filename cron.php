<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'phpmailer/PHPMailerAutoload.php';
$conn = mysqli_connect('localhost', 'root', '', 'employeemanagement');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$todayDate   = date("Y-m-d");
$selectQuery = "SELECT * FROM `employeedetails` WHERE `empDob` = '" . $todayDate . "'";
$result      = $conn->query($selectQuery);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gender = ($row['empGender'] == 1) ? "his" : "her";
        $message = getMailTemplate($row['empName'], $row['empDob'], $row['empImgPath'], $gender);
        sendMailToEmployee($row['empEmail'], $row['empName'], $message);
    }
}

function getMailTemplate($empName, $empDob, $imgPath, $gender) {
    if (empty($empName) || empty($empDob)) {
        return "";
    }
    return '<html>
    <head>
        <title>APA Wishes</title>
    </head>
    <body>
        <table style="width: 100%; text-align: center;" border="0" cellspacing="0">
            <tr>
                <td>
                    <table style="width: 600px; border: 1px solid red;" align="center" border="0" cellspacing="0">
                        <tr>
                            <td style="width: 75%">
                                <table style="width: 100%; padding-left: 20px" align="left" border="0" cellspacing="0">
                                    <tr height="20">
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #0404fd; font-weight: bold;">APA Wishes</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #ffa603;">' . $empName . '</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #0404fd;">Who is celebrating '.$gender.' birthday on</td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #018401;">' . date('d.m.Y', strtotime($empDob)) . '</td>
                                    </tr>
                                    <tr height="20">
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #0404fd;">A Very Happy Birthday!!</td>
                                    </tr>
                                    <tr height="20">
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td style="color: #0404fd;">Have a great day & glorious year ahead!!</td>
                                    </tr>
                                    <tr height="10">
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 25%; vertical-align: top; padding: 5px 5px 0 0;">
                                <img src="' . $imgPath . '" alt="" style="height: 150px; width: auto; border: 1px solid black;"/>
                            </td>
                        </tr>
                        <tr height="30" style="background-color: red;">
                            <td colspan="2" style="border: 1px solid black;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
}
function sendMailToEmployee($to, $toName, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = "gokulphpdev@gmail.com";
    $mail->Password   = "gokul_php";
    $mail->SetFrom("gokulphpdev@gmail.com", "Gokul R A");
    $mail->isHTML(true);
    $mail->Subject    = "Birthday Wishes from APA";
    $mail->Body       = $message;
    $mail->AddAddress($to, $toName);
    $mail->Send();
}
