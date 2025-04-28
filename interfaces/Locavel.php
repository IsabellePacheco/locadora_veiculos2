<?php
namespace Interfaces;


// interface que define os metodos necessarios para um veiculo ser locavel

interface Locavel {
    public function alugar() : string;
    public function devolver() : string;
    public function isDiponivel() : bool;

}

