<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Получение данных из POST-запроса с проверкой
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$uphone = isset($_POST['uphone']) ? $_POST['uphone'] : '';

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // Настройка SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.hosting.reg.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@xn--80ajagbhoeued5acs6be7i5a.xn--p1ai';
    $mail->Password = 'sZ6jS5mX7qrB4aE4';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Настройка отправителя и получателей
    $mail->setFrom('info@xn--80ajagbhoeued5acs6be7i5a.xn--p1ai', 'Алиса');
    $mail->addAddress('arzonccnt@gmail.com');
    $mail->addAddress('yu.p.pryadko@yandex.ru');
    $mail->addAddress('Sergeev_vv@isksz.ru');
    $mail->addReplyTo('Sergeev_vv@isksz.ru', 'Sergeev_vv');

    $mail->isHTML(true);
    $mail->Subject = 'Новая заявка с сайта';
    $mail->Body .= '
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Имя</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $uname . '</td>
        </tr>
        <tr>
            <td style="border: 1px solid #bdbdbd; padding: 5px; width: 180px">Телефон</td>
            <td style="border: 1px solid #bdbdbd; padding: 5px;">' . $uphone . '</td>
        </tr>
    </table>';
    $mail->AltBody = 'Новая заявка с сайта!';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}