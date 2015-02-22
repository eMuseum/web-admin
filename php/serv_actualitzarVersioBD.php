<?php
	session_start();
	if($_SESSION["logged"])
	{ 
		$result = "";
		$result = peticioSever('"c740f63ca8184204a983dfee6dbd807f35118975d9e346aaa6032306cec0e254"','"RequestKey"');

		$result = peticioSever('"' . $result->Return . '"','"Login"', '{"Username":"blipi","Password":"'.sha1("123qwe").'"}');

		$result = peticioSever('"' . $result->Return . '"','"RequestKey"');

		$result = peticioSever('"' . $result->Return . '"','"NewVersion"');

		header("Location: http://vps53673.ovh.net/web/actualitzarVersioBD.php");

	//Actualitzar versio amb sockets
	}else { 
		header("Location: index.php");
	} 

	function peticioSever($key,$parm,$args = '{}'){
		$message = '{"Auth":{"PublicKey":'.$key.'},"Call":{"Function":'.$parm.',"Arguments":'.$args.'}}';

		echo $message."<br>";
		
		$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
		// connect to server
		$result = socket_connect($socket, "localhost", 8000) or die("Could not connect to server\n");  
		// send string to server
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
		// get server response
		$result = socket_read ($socket, 1024) or die("Could not read server response\n");
		
		// close socket
		socket_close($socket);

		//echo $result."<br>"; de cara a debuggejar

		return json_decode($result);
	}

?>