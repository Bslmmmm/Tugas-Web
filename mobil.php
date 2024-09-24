<?php
class Mobil {
    public $nama;
    public $merk;
    public $harga;

    public function __construct($nama, $merk, $harga) {
        $this->nama = $nama;
        $this->merk = $merk;
        $this->harga = $harga; 
    } 

    public function infoMobil() {
        return "Mobil {$this->merk} {$this->nama} dengan harga Rp " . number_format($this->harga, 0, ',', '.'); x 
    }
}

$mobil1 = new Mobil("Avanza", "Toyota", 100000000);
$mobil2 = new Mobil("Xenia", "Daihatsu", 95000000);
$mobil3 = new Mobil("Ertiga", "Suzuki", 120000000);

echo $mobil1->infoMobil() . "<br>";
echo $mobil2->infoMobil() . "<br>";
echo $mobil3->infoMobil() . "<br>";
?>

