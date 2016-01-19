<?php
/**
* Шифр Цезаря
*
* @copyright  Copyright (c) 2016 Yuriy Kostenko
* @version    1
*/

class Ceasar {	
	private $aplh = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	public function encr($ceasar, $rot) {
		$ceasar = strtoupper($ceasar);
		$N = count($this->aplh);
		$n = strlen($ceasar);

		for($i=0;$i<$n;$i++) {
		for($j=0;$j<$N;$j++) 	
			if($ceasar[$i] == $this->aplh[$j]) { 
				$this->resultChipher .= $this->aplh[($j + $rot) % $N]; 
			}
			
			if ($ceasar[$i] == ' ') {
			    $this->resultChipher .= ' ';
			} elseif ($ceasar[$i] == '-') {
			    $this->resultChipher .= '-';
			} elseif ($ceasar[$i] == ',') {
			    $this->resultChipher .= ',';
			} elseif ($ceasar[$i] == '.') {
			    $this->resultChipher .= '.';
			}

			$this->resultChipher;
		}
		return $this->resultChipher;
	}

	public function decod($ceasar, $rot) {
		$ceasar = strtoupper($ceasar);
		$N = count($this->aplh);
		$n = strlen($ceasar);

		for($i=0;$i<$n;$i++) {
		for($j=0;$j<$N;$j++) 	
			if($ceasar[$i] == $this->aplh[$j]) { 
				$this->resultChipher .= $this->aplh[($j - $rot) % $N]; 
			}
			
			if ($ceasar[$i] == ' ') {
			    $this->resultChipher .= ' ';
			} elseif ($ceasar[$i] == '-') {
			    $this->resultChipher .= '-';
			} elseif ($ceasar[$i] == ',') {
			    $this->resultChipher .= ',';
			} elseif ($ceasar[$i] == '.') {
			    $this->resultChipher .= '.';
			}

			$this->resultChipher;
		}
		return $this->resultChipher;
	}
}
$Ceasar = new Ceasar(); 
$chipher = json_decode(file_get_contents('php://input'), true);
if($chipher['crypt'] == 'encr') 
	$chipher['text'] = $Ceasar->encr($chipher['text'], $chipher['rot']); 
if($chipher['crypt'] == 'decod') 
	$chipher['text'] = $Ceasar->decod($chipher['text'], $chipher['rot']);
echo json_encode($chipher);
?>