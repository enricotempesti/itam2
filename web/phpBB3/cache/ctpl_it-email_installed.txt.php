<?php if (!defined('IN_PHPBB')) exit; ?>Subject: phpBB installato

Congratulazioni,

l'installazione di phpBB sul tuo server e' riuscita!

Questa e-mail contiene importanti informazioni sulla tua installazione che devi conservare. Non scordare la password perche', se dovessi perderla, non sara' possibile recuperarla dal nostro database in quanto viene criptata. In ogni caso qualora la perdessi puoi sempre richiederne una nuova.

----------------------------
Nome utente: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>
Password: <?php echo (isset($this->_rootref['PASSWORD'])) ? $this->_rootref['PASSWORD'] : ''; ?>

URL: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>
----------------------------

Altre informazioni sulla tua installazione phpBB le trovi nella cartella docs e sulla pagina di supporto di phpBB.com - http://www.phpbb.com/support/

Per tenere in perfetta sicurezza il sistema, ti suggeriamo caldamente di mantenerti aggiornato con le release del software, cosa semplice da fare con l'iscrizione alla mailing list di phpBB.com.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>