<?php

namespace Services\Otp;

/**
 * Class OtpAuth
 *
 * @package \Services\Otp
 */
class OtpAuth
{

    /**
     * функция которая генерит пароль
    **/

    public function passCreate()
    {
        $password = rand(1000, 9999);
        DB::table('auth')->insert(['code' => $password]);

        return $password;
    }


    /**
     * функция которая отправляет пароль в SMS (пока на E-mail)
     **/

     public function sendOTPmail()
     {
         mail('artem.tretyakov.91@inbox.ru', 'My Subject', $this->passCreate);
     }


    /**
     * функция которая проверяет соответствие отправленного пароля и введенного в поле авторизации
     **/
}
