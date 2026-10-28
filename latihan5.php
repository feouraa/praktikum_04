<?php
class LaporanMahasiswa {
    public function __construct(private string $nama) {}

    public function __call(string $method, array $args): mixed {
        if ($method !== 'cetakRingkas') {
            throw new BadMethodCallException('Method tidak tersedia: ' . $method);
        }
        if (count($args) !== 0) {
            throw new BadMethodCallException('cetakRingkas() tidak menerima argumen');
        }
        return 'Mahasiswa: ' . $this->nama;
    }
}

$laporan = new LaporanMahasiswa('Alya');

echo $laporan->cetakRingkas() . '<br>';

try { $laporan->hapusSemua(); } catch (BadMethodCallException $e) {
    echo 'Error: ' . $e->getMessage() . '<br>';
}
try { $laporan->cetakRingkas('x'); } catch (BadMethodCallException $e) {
    echo 'Error: ' . $e->getMessage() . '<br>';
}