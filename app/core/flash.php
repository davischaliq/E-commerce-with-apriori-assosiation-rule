<?php

class flash
{
    Public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = 
        [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }
    Public static function showflash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert mx-auto alert-'.$_SESSION['flash']['tipe'].' alert-dismissible fade show text-center" role="alert">
                 '. $_SESSION['flash']['pesan'] .'
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
                 </div>';
            unset($_SESSION['flash']);
        }
    }
}
