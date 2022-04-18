<?php

trait Hewan
{
    private $nama;
    private $darah = 50;
    private $jumlahKaki;
    private $keahlian;

    public function atraksi()
    {
        echo "$this->nama sedang $this->keahlian\n";
    }
}

trait Fight
{
    private $attackPower;
    private $defencePower;

    public function serang($diserang)
    {
        echo "$this->nama sedang menyerang $diserang->nama\n";
        $diserang->diserang($this);
    }

    public function diserang($penyerang)
    {
        echo "$this->nama sedang diserang\n";
        $this->darah -= $penyerang->attackPower / $this->defencePower;
    }
}

class Elang
{
    use Hewan, Fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahKaki = 2;
        $this->keahlian = "Terbang tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;
    }

    public function getInfoHewan()
    {
        $className = static::class;
        echo <<<STR
        Nama            : $this->nama
        Jenis Hewan     : $className
        Darah           : $this->darah
        Jumlah Kaki     : $this->jumlahKaki
        Keahlian        : $this->keahlian
        Attack Power    : $this->attackPower
        Defence Power   : $this->defencePower
        
        STR;
    }
}

class Harimau
{
    use Hewan, Fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahKaki = 4;
        $this->keahlian = "Lari cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }

    public function getInfoHewan()
    {
        $className = static::class;
        echo <<<STR
        Nama            : $this->nama
        Jenis Hewan     : $className
        Darah           : $this->darah
        Jumlah Kaki     : $this->jumlahKaki
        Keahlian        : $this->keahlian
        Attack Power    : $this->attackPower
        Defence Power   : $this->defencePower
        
        STR;
    }
}