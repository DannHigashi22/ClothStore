<?php

if(!function_exists('stringstatus')){
    function stringstatus($status){
        switch ($status) {
            case '1':
                $strstatus='Recibido';
                break;
            
            case '2':
                $strstatus='Preparacion';
                break;
            
            case '3':
                $strstatus='Enviado';
                break;
            
            case '4':
                $strstatus='Entregado';
                break;
        }
        return $strstatus;
    }

}


?>