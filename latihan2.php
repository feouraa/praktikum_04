<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {}

    public function tampilInfo(): string {
        return "Judul: $this->judul | Penulis: $this->penulis | Tahun: $this->tahun";
    }
}

$buku1 = new Buku('Belajar PHP 8', 'Budi Santoso', 2023);
$buku2 = new Buku('Pemrograman Berorientasi Objek', 'Rosa Delima', 2019);
$buku3 = new Buku('Basis Data Dasar', 'Andi Wijaya', 2021);

echo $buku1->tampilInfo() . '<br>';
echo $buku2->tampilInfo() . '<br>';
echo $buku3->tampilInfo() . '<br>';