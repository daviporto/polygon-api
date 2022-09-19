## Instalação
    - Necessário ter instalado docker, docker-compose, php 7. e composer.
    - Primeiro certifique-se que o mysql local não está rodando, nem um servidor local como Apache ou Nginx.
    - Rode o comando `docker-compose up`
    - Rode o comando `docker-compose run php composer install`
    - Crie os bancos de dados especificados nos arquivos db dentro de config
    - Rode o comando `✗ docker-compose run php php yii migrate`
    - Rode o comando `✗ docker-compose run php php yii serve`
## Sobre
Este é um projeto de teste para a empresa EmCash, consiste em uma simples Api que permite a criação de triângulos e
retângulos. Também calcula a soma da área de todos os poligonos cadastrados.

## Rotas
- O arquivo para ser usado no Insomnia encontra-se na raiz do projeto.