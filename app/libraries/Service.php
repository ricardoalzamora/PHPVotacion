<?php
    class Service{

        public function __construct()
        {
        }

        public static function validarSesion(){
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['id_usuario'])){
                header('location: ' . RUTA_URL );
            }
        }

        public static function certificado($votante){
            require_once('fpdf/fpdf.php');
            ob_start();
            $pdf=new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(80);
            $pdf->Cell(40,10,"Se certifica que la persona " . $votante[0]->nombre . " " . $votante[0]->apellido .
                " y documento " . $votante[0]->id_usuario, 0, 0, "C");
            $pdf->Ln();
            $pdf->Cell(80);
            $pdf->Cell(40,10, "ha cumplido con el deber de votar", 0, 0, "C");
            $pdf->Ln();
            $pdf->Cell(80);
            $pdf->Cell(40,10, utf8_decode("el día " . date("j, n, Y")), 0, 0, "C");
            $pdf->Output('archivo_pdf.pdf', 'F');
            ob_end_flush();
            require_once 'PHPMailer/src/SMTP.php';
            require_once 'PHPMailer/src/Exception.php';
            require_once 'PHPMailer/src/PHPMailer.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'paulapirela@hotmail.com';
            $mail->Password = 'Onedirection5';
            $mail->setFrom('paulapirela@hotmail.com', 'Paula Pirela');
            $mail->addReplyTo('alzamoraricardo5@gmail.com', 'Ricardo');
            $mail->addAddress('alzamoraricardo5@gmail.com', 'Paula');
            $mail->Subject = utf8_decode('Certificado de votación');
            $mail->Body = 'Certificado Electoral.';
            $mail->addAttachment('archivo_pdf.pdf');
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            unlink ('archivo_pdf.pdf');
        }
    }