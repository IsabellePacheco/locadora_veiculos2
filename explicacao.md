# Fucionamento do sistema de Locadora de Veiculos com PHP e Bootstrap

Esse documento descreve o funcionamento do sistema de Locadora de Veículos desenvolvido em PHP, utilizando Bootstrap para interface, com altenticação de usuários, gerenciamento de veículos (carros e motos) e persistência de dados em arquivos JSON. O foco principal é explicar o funcionamento geral do sistema, com ênfase especial nos perfils de acesso (admin e usuário).

## 1. Visão Geral do Sistema 
O sistema de locadora de veículos é uma aplicacao web que permite:
- Autenticação de usuário com dois perfis: **admin** (administrador) e **usuário** 
- Gerenciamento de veículos: cadastro, aluguel, devolução e exclusão; 
- Cálculo de previsão de aluguel: com base no tipo de veiculo (carro ou moto ) e número de dias;
- Interface responsiva. 

Os dois são armazenados em dois arquivos JSON:
- 'usuario.json' : username, senha criptografada e perfil
- 'veiculos.json' : tipo, modelo, placa e status de disponibilidade

## 2.Estrutura do sistema 
O sistema utiliza:
- **PHP**: para lógina
- **Bootstrap**: para estilização
- **Bootstrap Icons**: para icones da interface
- **Composer**: para autoloading de classes 
- **Json**: para persistência de dados 

### 2.1 Componentes principais
- **Interface**: Define a interface `Locavel` para veiculos e utiliza os metodos `alugar()`, `devolver()` e `isDiponivel()`
- **Models**: classes  `Veiculo` (abstrata), `Carro` e `Moto` para os veiculos, com cálculo de aluguel baseado em diárias constantes (`DIARIA_CARRO` e `DIARIA_MOTO`)
- **Services**: Classes `AUTH`(altenticação e gerenciamento de usuarios) e `Locadora` (gerenciamento dos veículos)
- **Views**: Template principal `template.php` para renderizar a interface e `login.php` para a autenticação
- **Controler**: Lógica em `index.php`  para processar requisições e carregar o template. 

