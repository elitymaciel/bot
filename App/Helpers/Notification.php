<?php
 
namespace App\Helpers;

class Notification
{

    public function showToastrNotification($type, $message)
    {
        // Gere um ID aleatório para a notificação
        $notificationId = uniqid();

        $_SESSION['alert'] = '<script>
                    window.onload = function(){
                        toastr.'.$type.'("'.$message.'")
                    }
                </script>';   

        return;
    }
 
}
