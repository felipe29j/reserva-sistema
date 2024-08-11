# Desafio técnico - Sistema de Hotelarias.

Este é um sistema de mercado desenvolvido para gerenciar produtos, tipos de produtos e vendas. Ele fornece uma interface amigável para os funcionários do mercado registrarem vendas e calcularem os impostos sobre essas vendas.

## Passo 1: Preparar o Ambiente

# 1.1. Instalação do PHP

Se você ainda não tem o PHP instalado, baixe e instale a versão adequada para o seu sistema operacional. Você pode encontrar o PHP no site oficial PHP.net.

# 1.2. Instalação do MySQL (Opcional)

Se desejar usar o MySQL como banco de dados, baixe e instale o MySQL.

# 1.3  Clone o repositório para sua máquina local:

git clone [git@github.com:felipe29j/mercado-2.0.git](https://github.com/felipe29j/mercado-2.0)

Se não ter a SSH pode usar esse 

git clone [https://github.com/felipe29j/mercado-2.0.git](https://github.com/felipe29j/mercado-2.0.git)

# 1.4 Instalar Dependências

Se ainda não fez, instale as dependências do projeto usando Composer:

composer install

# 1.5 Configurar Ambiente

Copie o arquivo .env.example para criar um novo arquivo .env se ainda não existir o .env:

cp .env.example .env

## Passo 2: Configurar o Banco de Dados

# 2.1 Editar o Arquivo .env

Abra o arquivo .env e configure as variáveis de ambiente para o banco de dados:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reservas
DB_USERNAME=root
DB_PASSWORD=root

# 2.2 Criar o Banco de Dados

Se ainda não tiver criado o banco de dados, faça isso com o seguinte comando MySQL:

CREATE DATABASE reservas;

(Substitua reservas pelo nome do seu banco de dados, se necessário.)


## Passo 3: Configurar o Ambiente

# 3.1 Gerar a Chave de Aplicação

Gere a chave de aplicação do Laravel. Essa chave é usada para a criptografia de dados:

php artisan key:generate

## Passo 4: Rodar as Migrations

# 4.1 Executar Migrations

Execute as migrations para criar as tabelas no banco de dados:

php artisan migrate

php artisan db:seed

## Passo 5: Configurar o Servidor

# 5.1 Executar o Servidor de Desenvolvimento

Para rodar o servidor de desenvolvimento Laravel, use o comando:

php artisan serve

O Laravel iniciará o servidor e você verá uma saída informando que o servidor está rodando, geralmente acessível em http://127.0.0.1:8000.

## Passo 6: Testar a Aplicação

# 6.1 Acessar a Aplicação

Abra um navegador e vá para o URL fornecido (por exemplo, http://127.0.0.1:8000) para verificar se a aplicação está funcionando corretamente.

# 6.2 Testar Funcionalidades

Use o Postman ou uma ferramenta similar para testar os endpoints da API e garantir que tudo esteja funcionando conforme o esperado.

## Como Testar os Endpoints com o Postman

# Autenticação

Login:

URL: http://localhost:8000/login
Método: POST
Corpo da Requisição: JSON

{
  "login": "admin",
  "password": "1234"
}

Resposta Esperada: Se as credenciais estiverem corretas, você receberá um JSON contendo o token JWT.

Obter Dados do Usuário:

URL: http://localhost:8000/me
Método: GET
Cabeçalhos:
Authorization: Bearer <token>

# Hotéis

Listar Hotéis:

URL: http://localhost:8000/hotels
Método: GET
Cabeçalhos:
Authorization: Bearer <token>
Criar Hotel:

URL: http://localhost:8000/hotels
Método: POST
Corpo da Requisição: JSON

{
  "name": "Hotel Novo",
  "url": "http://novohotel.com",
  "cnpj": "11.111.111/1111-11",
  "status": "ativo"
}
Atualizar Hotel:

URL: http://localhost:8000/hotels/{id}
Método: PUT
Corpo da Requisição: JSON

{
  "name": "Hotel Atualizado",
  "url": "http://atualizadohotel.com",
  "cnpj": "11.111.111/1111-22",
  "status": "ativo"
}
Deletar Hotel:

URL: http://localhost:8000/hotels/{id}
Método: DELETE

# Usuários

Listar Usuários:

URL: http://localhost:8000/users
Método: GET
Criar Usuário:

URL: http://localhost:8000/users
Método: POST
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "role": "admin",
  "name": "Novo Admin",
  "login": "novoadmin",
  "status": "active",
  "password": "senha"
}
Atualizar Usuário:

URL: http://localhost:8000/users/{id}
Método: PUT
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "role": "admin",
  "name": "Admin Atualizado",
  "login": "adminatualizado",
  "status": "active",
  "password": "novasenha"
}
Deletar Usuário:

URL: http://localhost:8000/users/{id}
Método: DELETE

# Hóspedes

Listar Hóspedes:

URL: http://localhost:8000/guests
Método: GET
Criar Hóspede:

URL: http://localhost:8000/guests
Método: POST
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "name": "Hóspede Novo",
  "email": "hospede@exemplo.com",
  "phone": "123456789",
  "cell": "987654321",
  "document_type": "RG",
  "document_number": "123456789",
  "address": "Rua Exemplo, 123"
}
Atualizar Hóspede:

URL: http://localhost:8000/guests/{id}
Método: PUT
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "name": "Hóspede Atualizado",
  "email": "hospedeatualizado@exemplo.com",
  "phone": "123456789",
  "cell": "987654321",
  "document_type": "RG",
  "document_number": "987654321",
  "address": "Rua Atualizada, 456"
}
Deletar Hóspede:

URL: http://localhost:8000/guests/{id}
Método: DELETE

# Apartamentos

Listar Apartamentos:

URL: http://localhost:8000/apartments
Método: GET
Criar Apartamento:

URL: http://localhost:8000/apartments
Método: POST
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "number": "101",
  "type": "suite",
  "description": "Suite confortável com vista para o mar.",
  "price": 200.00,
  "status": "available"
}
Atualizar Apartamento:

URL: http://localhost:8000/apartments/{id}
Método: PUT
Corpo da Requisição: JSON

{
  "hotel_id": 1,
  "number": "102",
  "type": "suite",
  "description": "Suite com duas camas.",
  "price": 180.00,
  "status": "available"
}
Deletar Apartamento:

URL: http://localhost:8000/apartments/{id}
Método: DELETE

# Reservas

Listar Reservas:

URL: http://localhost:8000/bookings
Método: GET
Criar Reserva:

URL: http://localhost:8000/bookings
Método: POST
Corpo da Requisição: JSON

{
  "guest_id": 1,
  "apartment_id": 1,
  "check_in_date": "2024-08-15",
  "check_out_date": "2024-08-20",
  "status": "confirmed"
}
Atualizar Reserva:

URL: http://localhost:8000/bookings/{id}
Método: PUT
Corpo da Requisição: JSON

{
  "guest_id": 1,
  "apartment_id": 1,
  "check_in_date": "2024-08-16",
  "check_out_date": "2024-08-21",
  "status": "confirmed"
}
Deletar Reserva:

URL: http://localhost:8000/bookings/{id}
Método: DELETE
Cancelar Reserva:

URL: http://localhost:8000/bookings/{id}/cancel
Método: PATCH

## 7. Conclusão

Parabéns! Você concluiu a instalação do projeto do mercado. Agora, você tem um sistema funcional para cadastrar produtos, tipos de produtos, registro de vendas e listagem de produtos.