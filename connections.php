<?php

	$cn = mysqli_connect("localhost","root","","hyperion");

	if(mysqli_connect_errno()){

		echo "Failed Connection" . mysqli_connect_error();
	}

