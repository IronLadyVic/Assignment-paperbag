<?php
define("PBKDF2_HASH_ALGORITHM", "sha1");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTES", 24);
define("PBKDF2_HASH_BYTES", 24);

class create_hash{

	static public function encode($sPassword){
		$sSalt = hash('sha1', $sPassword."paperbag");
		$sHashPassword = hash('md5', $sSalt.$sPassword.$sSalt); //hashing the hash.
		return $sHashPassword;
	}

	
}

//test

	// $oCreateHash = new create_hash();
	// $sPassword = $oCreateHash->encode('bubbles');

	// echo($sPassword);








?>