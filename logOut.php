<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 08/03/2019
 * Time: 12:00 PM
 */
session_start();
session_unset();
session_destroy();
header('Location: login.php');