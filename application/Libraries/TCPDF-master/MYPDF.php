<?php
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo.png';
		$this->Image($image_file, 'C', 6, '40', '40', 'PNG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);				
	}
}
?>