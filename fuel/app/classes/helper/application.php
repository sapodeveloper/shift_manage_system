<?php
class Helper_Application {
    public static function get_today() {
        $datetime = new \DateTime();
        return $datetime->format('Y-m-d');
    }
}
