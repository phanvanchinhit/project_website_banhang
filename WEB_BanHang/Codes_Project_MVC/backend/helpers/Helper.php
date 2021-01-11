<?php
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';
class Helper
{
    // Phân quyền user
    const STATUS_ADMIN = 2;
    const STATUS_MEMBER = 1;
    const STATUS_EDITOR = 0;
    const STATUS_ADMIN_TEXT = 'Quản Trị Viên';
    const STATUS_MEMBER_TEXT = 'Thành Viên';
    const STATUS_EDITOR_TEXT = 'Biên Tập Viên';

    // Trạng thái hiện thị
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE_TEXT = 'Active';
    const STATUS_DISABLED_TEXT = 'Disabled';

    // Trạng thái đơn hàng
    const STATUS_NO_CHOOSE = -1;
    const STATUS_NO_SEEN = 0;
    const STATUS_SEEN =1;
    const STATUS_DANGXULY = 2;
    const STATUS_COMPLETE = 3;
    const STATUS_FAILED = 4;
    const STATUS_NO_CHOOSE_TEXT = '-Choose Status-';
    const STATUS_NO_SEEN_TEXT = 'Chưa Xem';
    const STATUS_SEEN_TEXT ='Đã Xem';
    const STATUS_DANGXULY_TEXT = 'Đang Xử Lý';
    const STATUS_COMPLETE_TEXT = 'Hoàn Thành';
    const STATUS_FAILED_TEXT = 'Đã Hủy';

    // Trạng thái thông tin liên hệ

    const STATUS_NO_SEEN_CONTACT = 0;
    const STATUS_SEEN_CONTACT = 1;
    const STATUS_COMPLETE_CONTACT = 2;
    const STATUS_NO_SEEN_CONTACT_TEXT = 'Chưa Xem';
    const STATUS_SEEN_CONTACT_TEXT = 'Đã Xem';
    const STATUS_COMPLETE_CONTACT_TEXT = 'Hoàn Thành';

    /**
     * Get status text
     * @param int $status
     * @return string
     */
    public static function getStatusText($status = 0) {
        $status_text = '';
        switch ($status) {
            case self::STATUS_ACTIVE:
                $status_text = self::STATUS_ACTIVE_TEXT;
                break;
            case self::STATUS_DISABLED:
                $status_text = self::STATUS_DISABLED_TEXT;
                break;
        }
        return $status_text;
    }

    public static function getStatusUserText($permission = 0) {
        $status_user_text = '';
        switch ($permission) {
            case self::STATUS_EDITOR:
                $status_user_text = self::STATUS_EDITOR_TEXT;
                break;
            case self::STATUS_MEMBER:
                $status_user_text = self::STATUS_MEMBER_TEXT;
                break;
            case self::STATUS_ADMIN:
                $status_user_text = self::STATUS_ADMIN_TEXT;
                break;

        }
        return $status_user_text;
    }
    public static function getStatusOrderText($payment_status = 0){
        $status_order_text = '';
        switch ($payment_status){
            case self::STATUS_SEEN:
                $status_order_text = self::STATUS_SEEN_TEXT;
                break;
            case self::STATUS_DANGXULY:
                $status_order_text = self::STATUS_DANGXULY_TEXT;
                break;
            case self::STATUS_COMPLETE:
                $status_order_text = self::STATUS_COMPLETE_TEXT;
                break;
            case self::STATUS_FAILED:
                $status_order_text = self::STATUS_FAILED_TEXT;
                break;
            case self::STATUS_NO_SEEN:
                $status_order_text = self::STATUS_NO_SEEN_TEXT;
                break;
        }
        return $status_order_text;
    }

    public static function getStatusContactText($contactStatus = 0) {
        $status_contact_text = '';
        switch ($contactStatus) {
            case self::STATUS_NO_SEEN_CONTACT:
                $status_contact_text = self::STATUS_NO_SEEN_CONTACT_TEXT;
                break;
            case self::STATUS_SEEN_CONTACT:
                $status_contact_text = self::STATUS_SEEN_CONTACT_TEXT;
                break;
            case self::STATUS_COMPLETE_CONTACT:
                $status_contact_text = self::STATUS_COMPLETE_CONTACT_TEXT;
                break;

        }
        return $status_contact_text;
    }

  public static function getSlug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
  }

  public static function sendMail($email, $subject, $body, $username, $password)
  {
        // Instantiation and passing `true` enables exceptions
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            //Server settings
            $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();
            // Send using SMTP
            //host miễn phí của gmail
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            //username gmail của chính bạn
            $mail->Username = $username;                     // SMTP username
            //password cho ứng dụng, ko phải password của tài khoảng
    //    đăng nhập gmail
    //    tạo mật khẩu ứng dụng tại link:
    // https://myaccount.google.com/ - menu Bảo mật
            $mail->Password = $password;                               // SMTP password
    //            $mail->Password = 'yichffdzhetottuw';                               // SMTP password
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('phanvanchinhit@gmail.com', 'Mail gửi thông tin đơn hàng ');
            //setting mail người gửi
            $mail->addAddress($email);     // Add a recipient
    //    $mail->addAddress('ellen@example.com');               // Name is optional
    //    $mail->addReplyTo('info@example.com', 'Information');
    //    $mail->addCC('cc@example.com');
    //    $mail->addBCC('bcc@example.com');

            // Attachments
    //      $mail->addAttachment('rose.jpeg');         // Add attachments
    //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
    //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
  }

}