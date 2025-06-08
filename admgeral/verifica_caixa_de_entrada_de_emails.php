<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
DEFINE('SERVIDOR', 'pop.digicompras.com.br'); 
DEFINE('PORTA', '110');
DEFINE('USUARIO', 'digicompras@digicompras.com.br');
DEFINE('SENHA', '20792079');
$mail_box = imap_open("{" . digicompras.com.br . ":" . 110 . "/pop3/novalidate-cert}INBOX", USUARIO, SENHA);
echo '<pre>';
print_r(imap_errors());
echo '</pre>';
if ($mail_box) {
    $total_de_mensagens = imap_num_msg($mail_box);
    if ($total_de_mensagens > 0) {
        for ($mensagem = 1; $mensagem <= $total_de_mensagens; $mensagem++) {
            echo '<pre>';
                print_r(imap_headerinfo($mail_box, $mensagem));
            echo '</pre>';
            /*
             *  o terceiro parametro pode ser
             *  0=> retorna o body da mensagem com o texto que o servidor recebe
             *  1=> retorna somente o conteudo da mensagem em plain-text
             *  2=> retorna o conteudo da mensagem em html
             */
            
            echo "<hr />";
            $body_1 = ( imap_fetchbody($mail_box, $mensagem, 1) );
            echo $body_1;
            echo "<hr />";
            $body_0 = ( imap_fetchbody($mail_box, $mensagem, 0) );
            echo $body_0;
            echo "<hr />";
            $body_2 = ( imap_fetchbody($mail_box, $mensagem, 2) );
            echo $body_2;
            echo "<hr />";
            // deixei comentando pra não dar problema e excluir todos seus e-mails
            
            //imap_delete($mail_box, $mensagem);
            //imap_expunge($mail_box);
        }
    }
    imap_close($mail_box);
}

?>
</body>
</html>