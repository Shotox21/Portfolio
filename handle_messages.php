<?php

if(!empty($_SESSION['error'])) {
echo $_SESSION['error'];
} else if (!empty($_SESSION['success'])) {
echo $_SESSION['success'];
}

if(!empty($_SESSION['error'])) {
unset($_SESSION['error']);
} else if (!empty($_SESSION['success'])) {
unset($_SESSION['success']);
}