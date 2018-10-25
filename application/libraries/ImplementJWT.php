<?php

	require APPPATH . '/libraries/JWT.php';

	class ImplementJWT {
		
		PRIVATE $key = 'aNdRgUkXp2r5u8x/A?D(G+KbPeShVmYq';
		
		public function generateToken($data) {
			$jwt = JWT::encode($data, $this->key);
			return $jwt;
		}
		
		public function decodeToken($token) {
			$decoded = JWT::decode($token, $this->key, array('HS256'));
			$decodedData = (array) $decoded;
			return $decodedData;
		}
	}
	
?>