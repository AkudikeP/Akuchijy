<?php 


		//https://control.msg91.com/api/sendhttp.php?authkey=106300A9Yv8L8r577cc8ee&mobiles=9691426068&message=kuchbhi&sender=CAPITL&route=4&country=0
		
		// init the resource
		$url2 = "https://control.msg91.com/api/sendhttp.php?authkey=106300A9Yv8L8r577cc8ee&mobiles=9691426068&message=Account+Name+%3A+Capital+Win%0AAccount+No.+%3A+0155102000010982%0ABank+Name+%3A+IDBI+Bank%0ABranch+%3A+Vijay+Nagar%2C+Indore%0AIFSC+Code+%3A+IBKL000015522222test&sender=CAPITL&route=4&country=0";
		 echo $url2;
		 $url3 = file_get_contents($url2);
		 echo $url3;