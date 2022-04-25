<?php 
	class Displayerror{
		
		private $firstnameErr = "";
		private $lastnameErr = "";
		private $emailErr = "";
		private $passErr = "";
		private $error = "";
		private $phoneErr = "";

		public function getErr(){
			return $this->error;
		}
		public function setErr($Err){
			$this->error = $Err;
		}


		public function getEmailErr(){
			return $this->emailErr;
		}
		public function setEmailErr($emailErr){
			$this->emailErr = $emailErr;
		}


		public function getPassErr(){
			return $this->passErr;
		}
		public function setPassErr($passErr){
			$this->passErr = $passErr;
		}


		public function getFirstnameErr(){
			return $this->firstnameErr;
		}
		public function setFirstnameErr($firstnameErr){
			$this->firstnameErr = $firstnameErr;
		}


		public function getLastnameErr(){
			return $this->lastnameErr;
		}
		public function setLastnameErr($lastnameErr){
			$this->lastnameErr = $lastnameErr;
		}


		public function getPhoneErr(){
			return $this->phoneErr;
		}
		public function setPhoneErr($phoneErr){
			$this->phoneErr = $phoneErr;
		}

	}
 ?>