<?php
	class Covek
	{
		public $ime;
		public $prezime;
		public $pol;
		public $jeZiv;
		public $godinaRodjenja;
		public $godinaSmrti;
		public $starost;
		public $interesovanja;
		public $obrazovanje;
		public $karijera;
		public $trenutniPosao;
		
		public function __construct($pol)
		{
			$this->ime = "";
			$this->prezime = "";
			$this->pol = $pol;
			$this->jeZiv = true;
			$this->godinaRodjenja = date("Y");
			$this->godinaSmrti = NULL;
			$this->starost = 0;
			$this->interesovanja = array();
			$this->obrazovanje = array();
			$this->karijera = array();
			$this->trenutniPosao = NULL;			
		}
		
		public function krstenje($ime, $prezime)
		{
			$this->ime = $ime;
			$this->prezime = $prezime;
		}
		
		public function promena_imena($ime)
		{
			$this->ime = $ime;
		}
		
		public function promena_prezimena($prezime)
		{
			$this->prezime = $prezime;
		}
		
		public function rodjendan()
		{
			$this->starost++;
		}
		
		public function novi_hobi($hobi)
		{
			array_push($this->interesovanja, $hobi);
		}
		
		public function hobi_dosadio($hobi)
		{
			if (($key = array_search($hobi, $this->interesovanja)) !== false)
			{
				unset($messages[$key]);
			}
		}
		
		public function polazak_u_osnovnu_skolu($ime_skole)
		{
			array_push($this->obrazovanje, "Osnovna skola " . $ime_skole);
		}
		
		public function zavrsena_srednja_skola($tip_skole, $ime_skole)
		{
			array_push($this->obrazovanje, $tip_skole . " " . $ime_skole);
		}
		
		public function zavrsen_fakultet($ime_fakulteta)
		{
			array_push($this->obrazovanje, $ime_fakulteta);
		}
		
		public function master_studije($ime_fakulteta, $master_program)
		{
			array_push($this->obrazovanje, $ime_fakulteta . " " . $master_program);
		}
		
		public function doktorske_studije($ime_fakulteta, $doktorat)
		{
			array_push($this->obrazovanje, $ime_fakulteta . " " . $doktorat);
		}
		
		public function novi_posao($posao)
		{
			array_push($this->karijera, $posao);
			$this->trenutniPosao = $posao;
		}
		
		public function otkaz()
		{
			$this->trenutniPosao = NULL;
		}
		
		public function smrt()
		{
			$this->jeZiv = false;
			$this->godinaSmrti = date("Y");
		}
		
		public function prikazi_podatke()
		{
			echo $this->ime . " " . $this->prezime;
			echo "<br>Pol: " . $this->pol . "<br>";
			if(!$this->jeZiv)
			{
				echo $this->godinaRodjenja . " - " . $this.godinaSmrti;
			}
			else
			{
				echo "Rodjen " . $this->godinaRodjenja . " godine.";
				echo "<br>";
				echo "Starost: " . $this->starost . " godina.";
			}
			echo "<br>";
			echo "Interesovanja: <br>";
			foreach ($this->interesovanja as $hobi)
			{
				echo $hobi . "<br>";
			}
			echo "Obrazovanje: <br>";
			foreach ($this->obrazovanje as $val)
			{
				echo $val . "<br>";
			}
			echo "Karijera: <br>";
			foreach ($this->karijera as $posao)
			{
				echo $posao . "<br>";
			}
			if(!is_null($this->trenutniPosao))
			{
				echo "Trenutni posao: " . $this->trenutniPosao;
			}
		}
	}
	
	$testCovek = new Covek("Muski");
	$testCovek->krstenje("Pera", "Peric");
	for ($i = 0; $i<40; $i++)
	{
		$testCovek->rodjendan();
	}
	$testCovek->novi_hobi("Citanje knjiga.");
	$testCovek->novi_hobi("Gledanje filmova.");
	$testCovek->novi_hobi("Sviranje gitare.");
	$testCovek->polazak_u_osnovnu_skolu("OS Dusan Radovic Nis");
	$testCovek->zavrsena_srednja_skola("Gimnazija", "Bora Stankovic Nis");
	$testCovek->zavrsen_fakultet("Elektronski fakultet u Nisu");
	$testCovek->novi_posao("NASA");
	$testCovek->otkaz();
	$testCovek->novi_posao("SpaceX");
	$testCovek->prikazi_podatke();
?>