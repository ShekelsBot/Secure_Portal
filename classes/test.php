<?php
	spl_autoload_register(function ($class){ include $class . '.class.php'; });
	echo (new portal())->myheader("Dashbpard");
	//---------------------------------- page starts here ----------------------------------//

	$str ='Under the leadership of Judge George, the county has enjoyed many positives since he first took office in 2019. He has successfully managed COVID-19 testing and vaccination efforts, resulting in Fort Bend County being in the top five of the State’s vaccination rate. Including overseeing the launch of COVID recovery initiatives with the Utility, Rental and Mortgage Assistance program, Childcare Voucher program, Small Business Emergency Grant program, Small Business Mentorship program, We All Eat Texas, and the Get Hired employer incentives to hire program resulting in over $44 million in grants awarded in Fort Bend County.';



	echo (new highlight())->on("vaccination", $str).'<br><br>';

	echo (new highlight())->warning('This is only a test').'<br>';



	//---------------------------------- page ends here ----------------------------------//
	echo (new portal())->myfooter();
?>