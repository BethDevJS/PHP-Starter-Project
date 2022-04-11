<?php
// BACKEND AUTHENTICATION SCRIPTS
$projectData = array('name' => 'ec2i_proj_001_ugc_cheque','version' => '1.0','status'=> 'released'); // Packaging up project data for the login script
require_once '/var/www/html/private-projects.php'; // Requesting the login script
if(!$authorised) die(); // This part just makes sure that the page isn't loaded unless the user is authenticated
// BACKEND AUTHENTICATION SCRIPTS

// - name to pay to [payee]
// - name of sender [payer]
// - date (get from current timestamp)
// - address [addr]
// - number amount to be paid [amnt]
// - memo [memo]

// times searched how to center a div: 5
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- If you are seeing this, I forgot to remove this part, the php is to stop browser caching -->
    <link rel="stylesheet" type="text/css" href="assets/style.css?random=<?php echo uniqid(); ?>""/>
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Generated Cheque</title>
</head>
<body>
    <!--  -->
    <section id="cheque-container">
        <div id="cheque" class="center">
            <svg preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1800" height="792" viewBox="0 0 1800 792">
                <defs>
                    <clipPath id="b">
                        <rect width="1800" height="792" />
                    </clipPath>
                </defs>
                <g id="a" clip-path="url(#b)">
                    <rect width="1800" height="792" fill="#fbf2f2" />
                    <rect width="1800" height="75" transform="translate(0 717)" fill="#fbf2f2" />
                    <line y2="37" transform="translate(71.5 740.5)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="37" transform="translate(81.5 740.5)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="37" transform="translate(166.5 740.5)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="37" transform="translate(176.5 740.5)" fill="none" stroke="#000" stroke-width="5" />
                    <text transform="translate(1699 57)" font-size="60" font-family="Calibri">
                        <tspan x="0" y="0"><a onclick="Swal.fire('This field cannot be changed.')">001</a></tspan>
                    </text>
                    <text transform="translate(98 769)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a onclick="Swal.fire('This field cannot be changed.')">001</a></tspan>
                    </text>
                    <line y2="14" transform="translate(251.5 752)" fill="none" stroke="#000" stroke-width="5" />
                    <text transform="translate(277 771)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="transit_number" onclick="edit('transit_number')" class="pointer">385235</a></tspan>
                    </text>
                    <text transform="translate(429 771)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="institution_number" onclick="edit('institution_number')" class="pointer">173</a></tspan>
                    </text>
                    <line y2="14" transform="translate(393 752)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="14" transform="translate(403 752)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="14" transform="translate(413 752)" fill="none" stroke="#000" stroke-width="5" />
                    <rect width="10" height="10" transform="translate(88 734)" />
                    <rect width="10" height="10" transform="translate(184 735)" />
                    <rect width="10" height="10" transform="translate(259 744.5)" />
                    <rect width="10" height="10" transform="translate(259 763)" />
                    <line y2="14" transform="translate(498 752)" fill="none" stroke="#000" stroke-width="5" />
                    <rect width="10" height="10" transform="translate(505.5 744.5)" />
                    <rect width="10" height="10" transform="translate(505.5 763)" />
                    <text transform="translate(563 771)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="account_number" onclick="edit('account_number')" class="pointer">55293995</a></tspan>
                    </text>
                    <line y2="37" transform="translate(729 740.75)" fill="none" stroke="#000" stroke-width="5" />
                    <line y2="37" transform="translate(739 740.75)" fill="none" stroke="#000" stroke-width="5" />
                    <rect width="10" height="10" transform="translate(746.5 735.25)" />
                    <text transform="translate(56 658)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Memo</tspan>
                    </text>
                    <line x2="662" transform="translate(164 660)" fill="none" stroke="#000" stroke-width="2" />
                    <text transform="translate(1648 658)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Signed</tspan>
                    </text>
                    <line x2="662" transform="translate(976 660)" fill="none" stroke="#000" stroke-width="2" />
                    <line x2="1459" transform="translate(82 498)" fill="none" stroke="#000" stroke-width="2" />
                    <text transform="translate(1557 494)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">100 Dollars</tspan>
                    </text>
                    <line x2="350" transform="translate(82 538)" fill="none" stroke="#000" stroke-width="2" opacity="0.3" />
                    <line x2="575" transform="translate(82 578)" fill="none" stroke="#000" stroke-width="2" opacity="0.3" />
                    <line x2="1158" transform="translate(237 399)" fill="none" stroke="#000" stroke-width="2" />
                    <text transform="translate(82 358)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Pay to the</tspan>
                        <tspan x="0" y="37">order of</tspan>
                    </text>
                    <g transform="translate(1445 319)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="300" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="299.75" height="79.75" fill="none" />
                    </g>
                    <line y2="81" transform="translate(1395 319)" fill="none" stroke="#000" stroke-width="2" />
                    <text transform="translate(1401 385)" font-size="75" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">£</tspan>
                    </text>
                    <g transform="translate(1589 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1525 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1461 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1397 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1333 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1269 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1205 73)" fill="#fff" stroke="#707070" stroke-width="0.25">
                        <rect width="60" height="80" stroke="none" />
                        <rect x="0.125" y="0.125" width="59.75" height="79.75" fill="none" />
                    </g>
                    <g transform="translate(1141 73)" fill="#fff">
                        <path d="M 59.875 79.875 L 0.125 79.875 L 0.125 0.125 L 59.875 0.125 L 59.875 79.875 Z" stroke="none" />
                        <path d="M 0.25 0.25 L 0.25 79.75 L 59.75 79.75 L 59.75 0.25 L 0.25 0.25 M 0 0 L 60 0 L 60 80 L 0 80 L 0 0 Z" stroke="none" fill="#707070" />
                    </g>
                    <text transform="translate(1047 152)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">DATE</tspan>
                    </text>
                    <text transform="translate(1160 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">D</tspan>
                    </text>
                    <text transform="translate(1224 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">D</tspan>
                    </text>
                    <text transform="translate(1284 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">M</tspan>
                    </text>
                    <text transform="translate(1348 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">M</tspan>
                    </text>
                    <text transform="translate(1418 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Y</tspan>
                    </text>
                    <text transform="translate(1482 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Y</tspan>
                    </text>
                    <text transform="translate(1546 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Y</tspan>
                    </text>
                    <text transform="translate(1610 181)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0">Y</tspan>
                    </text>
                    <line x2="600" transform="translate(72 119)" fill="none" stroke="#000" stroke-width="2" opacity="0.3" />
                    <text transform="translate(1160 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_d1" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1224 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_d2" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1290 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_m1" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1356 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_m2" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1418 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_y1" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1482 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_y2" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1546 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_y3" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1610 125)" font-size="35" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="date_y4" onclick="Swal.fire('This field cannot be changed.')">0</a></tspan>
                    </text>
                    <text transform="translate(1464 375)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="total_paying" onclick="edit('total_paying')" class="pointer">0.00</a></tspan>
                    </text>
                    <text transform="translate(237 384)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="paying_to" onclick="edit('paying_to')" class="pointer">John Doe</a></tspan>
                    </text>
                    <text transform="translate(82 486)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="total_paying_long" onclick="Swal.fire('This field will automatically update.')">Zero</a></tspan>
                    </text>
                    <text transform="translate(164 648)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="memo" onclick="edit('memo')" class="pointer">Payment</a></tspan>
                    </text>
                    <text transform="translate(976 648)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="signed" onclick="Swal.fire('This field will automatically update.')">Your Full Name</a></tspan>
                    </text>
                    <text transform="translate(82 530)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="bank_name" onclick="edit('bank_name')" class="pointer">Your Bank's Name</a></tspan>
                    </text>
                    <text transform="translate(82 570)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="bank_address" onclick="edit('bank_address')" class="pointer">Your Bank's Address</a></tspan>
                    </text>
                    <text transform="translate(72 108)" font-size="45" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="name_of_sender" onclick="edit('name_of_sender')" class="pointer">Your Full Name</a></tspan>
                    </text>
                    <text transform="translate(72 149)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="street_name" onclick="edit('address_filler')" class="pointer">Your Street Name</a></tspan>
                    </text>
                    <text transform="translate(72 187)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="district" onclick="edit('address_filler')" class="pointer">Your District</a></tspan>
                    </text>
                    <text transform="translate(72 225)" font-size="30" font-family="Calibri-Bold, Calibri" font-weight="700">
                        <tspan x="0" y="0"><a id="postcode" onclick="edit('address_filler')" class="pointer">Your Postal Code</a></tspan>
                    </text>
                </g>
            </svg>
        </div>
    </section>

    <!-- Placing scripts at the bottom to help efficiency -->
    <!-- If you are seeing this, I forgot to remove this part, the php is to stop browser caching -->
    <script src="numbers_to_words/index.js?random=<?php echo uniqid(); ?>"></script>
    <script src="assets/script.js?random=<?php echo uniqid(); ?>"></script>
    <script src="assets/sweetalert2.all.min.js">Swal.fire('Any fool can use a computer')</script>
    <script>
        //Introduction script
        Swal.fire('User Generated Cheque Project\n\nYou are able to edit the fields of the cheque by clicking on the text, some fields however are auto generated based on other inputs such as the long cheque amount!')
    </script>
</body>
</html>