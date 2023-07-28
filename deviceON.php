<meta charset="UTF-8">
<?php

include("MobileDetect.php");
$MobileDetect = new MobileDetect();

//EXAMPLE 1
//Örnek 1

if($MobileDetect->IsIphone()){
	echo "Device:<img src='../crc/imag/apple.png'width=15 height=15>";
}
// EXAMPLE 2
// Örnek 2
switch( $MobileDetect->GetDevice() ){
	case MobileDetect::DEVICE_IPAD:
		echo "Device:<img src='../crc/imag/tablet.png'width=15 height=15>";
		break;
	case MobileDetect::DEVICE_WINDOWS:
		echo "Device.<img src='../crc/imag/windows8.png'width=15 height=15>";
		break;
	case MobileDetect::DEVICE_ANDROID:
		echo "Device:<img src='../crc/imag/android.png'width=15 height=15>";
		break;
	case MobileDetect::DEVICE_NORMAL:
		echo "Device:<img src='../crc/imag/laptop.png'width=15 height=15>";
		break;
}

?>
