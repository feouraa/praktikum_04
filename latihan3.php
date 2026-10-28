<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {
        echo "Constructor: buku '$this->judul' dibuat<br>";
    }

    public function tampilInfo(): string {
        return "Judul: $this->judul | Penulis: $this->penulis | Tahun: $this->tahun";
    }

    public function __destruct() {
        echo "Destructor: buku '$this->judul' dihancurkan<br>";
    }
}

$buku = new Buku('Belajar PHP 8', 'Budi Santoso', 2023);
echo $buku->tampilInfo() . '<br>';

$alias = $buku;          // dua variabel menunjuk objek yang sama
unset($buku);            // hanya menghapus satu referensi
echo 'Setelah unset($buku): objek masih dipegang $alias<br>';

unset($alias);           // referensi terakhir hilang
echo 'Setelah unset($alias): program dilanjutkan<br>';