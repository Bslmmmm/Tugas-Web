<?php
class PerhitunganPembayaran {
    private $totalBayar;
    private $diskon;

    public function __construct($totalBayar, $diskon) {
        $this->totalBayar = $totalBayar;
        $this->diskon = $diskon;
    }

    public function perhitunganTotalBersih() {
        return $this -> totalBayar - ($this -> totalBayar * $this -> diskon / 100);
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['totalbayar']) && isset($_POST ['diskon'])) {
            $totalBayar =$_POST ['totalbayar'];
            $diskon = $_POST['diskon'];

            $calculator = new PerhitunganPembayaran($totalBayar, $diskon);
            $totalBersih = $calculator -> perhitunganTotalBersih();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perhitungan Pembayaran</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Form Pembayaran</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="formpembayaran">
            <label for="total_bayar">Total Bayar</label>
            <input type="number" id="total_bayar" name="totalbayar" required> <br><br>

            <label for="diskon">Diskon (%) :</label>
            <input type="number" id="diskon" name="diskon" required> <br><br>

            <input type="submit" value="Hitung Total Bersih">
        </form>
    </div>

    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h3>Hasil Perhitungan</h3>
        <p id="hasil"></p>
        <button onclick="closePopup()">Tutup</button>
    </div>
    <script>
        <?php if (isset($totalBersih)) { ?>
            document.getElementById('hasil').innerText = "Total Bersih Pembayaran: Rp " + "<?php echo number_format($totalBersih, 2, ',', '.'); ?>";
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        <?php } ?>

        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>