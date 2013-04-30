<?php
// Hola, me llamo Sergio Mora y la llepo :P


class Redirect {

    public static function to($where)
    {
        ob_start();
        header("Location:".$where);
    }

    public static function to_prev()
    {
        Redirect::to($_SERVER['HTTP_REFERER']);
    }

}
