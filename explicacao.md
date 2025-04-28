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
