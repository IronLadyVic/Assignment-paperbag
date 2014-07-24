<?php

class Cart{

	private $aContents;

	public function __construct(){

		$this->aContents = array();
	}

 public function addProduct($iProductID){
 	
		if(isset($this->aContents[$iProductID])) == false{
			$this->aContents[$iProductID] = 1;
		}else{
			$this->aContents[$iProductID] += 1;
		}

	}

 public function removeProduct($iProductID){
	$this->aContents[$iProductID] -= 1;
		if($this->aContents[$iProductID] == 0){
			unset($this->aContents[$iProductID]);
		}

	}
 public function __get($var){
		switch ($var) {
			case 'Contents':
				return $this->aContents;
				break;
			}
		}

}


//TESTING

$oCart = new Cart();

$oCart->addProduct(2);
$oCart->addProduct(3);
$oCart->addProduct(4);
$oCart->addProduct(4);
$oCart->removeProduct(4);

echo ("<pre>");
print_r($oCart);
echo ("</pre>");

?>