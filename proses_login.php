<?php
session_start();

require "proses.php";
if (isset($_POST['login'])) {
	loginuser();
}
