<?php
//I pretty much half way through realised doing everything completely in the backend would be very messy and would require a lot of reloading

//require_once getcwd().'/formatter.php';

// if($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if($_POST['payer'] && $_POST['payee'] && $_POST['addr'] && $_POST['amnt']) {
//         if(is_numeric($_POST['amnt'])) {
//             require_once getcwd().'/formatter.php';
//             $chequeData = array(
//                 "payer" => htmlentities($_POST['payer']),
//                 "payee" => htmlentities($_POST['payee']),
//                 "date" => time(),
//                 "address" => htmlentities($_POST['addr']),
//                 "formatedAmount" => array(
//                     "short" => short($_POST['amnt']),
//                     "long" => long($_POST['amnt'])
//                 ),
//                 "memo" => htmlentities($_POST['memo'])
//                 );
//         } else {
//             $error = 'The amount to be paid you gave is not a valid number!';
//         }
//     } else {
//         $error = 'We we\'re unable to generate your cheque as the request data was not provided, please try again!';
//     }
// }