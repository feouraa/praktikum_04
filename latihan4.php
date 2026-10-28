<?php
declare(strict_types=1);

class MahasiswaDinamis {
    private array $atributTambahan = [];

    public function __construct(public string $nim, public string $nama) {}

    public function __set(string $key, mixed $value): void {
        if ($key !== 'hobi') {
            throw new InvalidArgumentException('Atribut tidak diizinkan: ' . $key);
        }
        $this->atributTambahan[$key] = $value;
    }

    public function __get(string $key): mixed {
        if (!array_key_exists($key, $this->atributTambahan)) {
            throw new OutOfBoundsException('Atribut tidak ditemukan: ' . $key);
        }
        return $this->atributTambahan[$key];
    }

    public function __isset(string $key): bool {
        return isset($this->atributTambahan[$key]);
    }

    public function __unset(string $key): void {
        unset($this->atributTambahan[$key]);
    }
}

$m = new MahasiswaDinamis('231001', 'Alya');

$m->hobi = 'Membaca';                                            // __set
echo 'hobi: ' . htmlspecialchars($m->hobi) . '<br>';            // __get
echo 'isset: ' . (isset($m->hobi) ? 'true' : 'false') . '<br>'; // __isset

unset($m->hobi);                                                // __unset
echo 'isset setelah unset: ' . (isset($m->hobi) ? 'true' : 'false') . '<br>';

try { echo $m->hobi; } catch (OutOfBoundsException $e) {
    echo 'Error: ' . $e->getMessage() . '<br>';
}
try { $m->alamat = 'Sukabumi'; } catch (InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . '<br>';