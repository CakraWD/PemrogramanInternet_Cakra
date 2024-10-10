<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP - Alat Musik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        .output {
            font-family: monospace;
            background-color: #f8f8f8;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<h2>Konsep Alat Musik</h2>

<table>
    <thead>
        <tr>
            <th>Konsep</th>
            <th>Hasil Output</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Kelas dan Objek</td>
            <td class="output">
                <?php
                class AlatMusik {
                    public $nama;
                    public $jenis;

                    public function __construct($nama, $jenis) {
                        $this->nama = $nama;
                        $this->jenis = $jenis;
                    }

                    public function tampilkanInfo() {
                        return "Nama: $this->nama, Jenis: $this->jenis";
                    }
                }

                $gitar = new AlatMusik("Gitar Akustik", "Senar");
                echo $gitar->tampilkanInfo();
                ?>
            </td>
        </tr>
        <tr>
            <td>Encapsulation</td>
            <td class="output">
                <?php
                class AlatMusikWithEncapsulation {
                    private $harga;

                    public function __construct($harga) {
                        $this->harga = $harga;
                    }

                    public function getHarga() {
                        return $this->harga;
                    }

                    public function setHarga($hargaBaru) {
                        $this->harga = $hargaBaru;
                    }
                }

                $gitar = new AlatMusikWithEncapsulation(1500000);
                echo "Harga Gitar: Rp " . $gitar->getHarga();
                ?>
            </td>
        </tr>
        <tr>
            <td>Pewarisan / Inheritance</td>
            <td class="output">
                <?php
                class Gitar extends AlatMusik {
                    public $jumlahSenar;

                    public function __construct($nama, $jenis, $jumlahSenar) {
                        parent::__construct($nama, $jenis);
                        $this->jumlahSenar = $jumlahSenar;
                    }

                    public function tampilkanInfo() {
                        return parent::tampilkanInfo() . ", Jumlah Senar: $this->jumlahSenar";
                    }
                }

                $gitar = new Gitar("Gitar Akustik", "Senar", 6);
                echo $gitar->tampilkanInfo();
                ?>
            </td>
        </tr>
        <tr>
            <td>Polimorfisme</td>
            <td class="output">
                <?php
                class Drum extends AlatMusik {
                    public $ukuranDrum;

                    public function __construct($nama, $jenis, $ukuranDrum) {
                        parent::__construct($nama, $jenis);
                        $this->ukuranDrum = $ukuranDrum;
                    }

                    public function tampilkanInfo() {
                        return parent::tampilkanInfo() . ", Ukuran Drum: $this->ukuranDrum cm";
                    }
                }

                $drum = new Drum("Drum Set", "Perkusi", 60);
                echo $drum->tampilkanInfo();
                ?>
            </td>
        </tr>
        <tr>
            <td>Abstraction</td>
            <td class="output">
                <?php
                function tampilkanInfo(AlatMusik $alatMusik) {
                    echo $alatMusik->tampilkanInfo();
                }

                tampilkanInfo($gitar);
                ?>
            </td>
        </tr>
        <tr>
            <td>Penggunaan Access Modifier</td>
            <td class="output">
                <?php
                class alat_musik {
                    public $Jenis = "Nama : Gitar Listrik, ";

                    public function harga() {
                        return "Harga : Rp 2000000";
                    }
                }

                $gitar = new alat_musik();
                echo $gitar->Jenis;
                echo $gitar->harga();
                ?>
            </td>
        </tr>
        <tr>
            <td>Menggunakan require/include</td>
            <td class="output">
                <?php
                require_once 'Kendang.php';
                require_once 'Biola.php';

                $kendang = new Kendang();
                echo $kendang->caraMain();
                $biola = new Biola();
                echo $biola->caraMain();
                ?>
            </td>
        </tr>
        <tr>
            <td>Menggunakan spl_autoload_register</td>
            <td class="output">
                <?php
                spl_autoload_register(function ($class_name) {
                    include $class_name . '.php';
                });
                $kendang = new Kendang();
                echo $kendang->caraMain();
                $biola = new Biola();
                echo $biola->caraMain();
                ?>
            </td>
        </tr>
        <tr>
            <td>Menggunakan Composer Autoload</td>
            <td class="output">  <!-- Tambahkan class output di sini -->
                <?php
                    //Menggunakan Composer Autoload
                    //Sertakan autoload Composer
                    require 'vendor/autoload.php';

                    use laptop\Asus;
                    use laptop\Lenovo;

                    $asus = new Asus();
                    echo $asus->getlaptopType();

                    $lenovo = new Lenovo();
                    echo $lenovo->getlaptopType();
                ?>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
