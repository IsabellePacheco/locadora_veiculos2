<?php
namespace Models;

//classe abstrata para todos os tipos de veiculos

abstract class Veiculo {
    protected string $modelo;
    protected string $placa;
    protected string $disponivel;
    

    public function __construct(string $modelo, string $placa){
        $this -> modelo = $modelo;
        $this -> placa = $placa;
        $this -> disponivel = true;
    
        
    }

    //funcao para calculo de aluguel
    abstract public function calcularAluguel(int $dias) : float;


    public function isDisponivel(): bool {
        return $this->disponivel;
    }
    public function getModels(): string {
        return $this-> modelo;
    }
    public function getPlaca(): string {
        return $this-> placa;
    }
    public function setDisponivel(bool $disponivel):void{
        $this ->disponivel = $disponivel;
    }
}
