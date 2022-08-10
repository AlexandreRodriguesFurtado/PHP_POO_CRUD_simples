<h1 align="center">App Cadastro Vagas</h1>

<div align="center">
    <img src="https://user-images.githubusercontent.com/107329581/183470182-e457c76c-c9e7-45f8-bce9-367ea3328215.png" width="480px">
    <img src="https://user-images.githubusercontent.com/107329581/183470872-e20d9b54-1e27-4016-b1d1-cd532cc07861.png" width="480px">
</div>

<br>

# Índice
- [Sobre](#📜sobre)
- [Tecnologias Utilizadas](#🚀tecnologias-utlizadas)
- [Como baixar o projeto](#📥como-baixar-o-projeto)
- [Configurar Query Builder](#⚙-configurar-query-builder)
-   Scripts
    - [Diagrama](#🚧-diagrama-der-🚧)
    - [Scripts de criação](#🚧-scripts-de-criação-🚧)
    - [Script de inserção](#🚧-script-de-inserção-🚧)
- [Agradecimentos](#👍Agradecimentos)
---

<br>

## 📜Sobre
<p align="justify">
O projeto <b>App Cadastro Vagas</b> foi criado dentro do curso de informática da escola tecnica e faculdade QI na unidade Web2 com o intuito de colocar em prática o conteúdo que foi estudado durante a unidade (linguagem <b>PHP</b>, <b>POO </b>e <b>CRUD</b>).<br>
 O App conta com um sistema simples de login, cadastro, consulta, atualização e exclusão para se ter um entendimento de como funciona a comunicação entre front, back end e a manipulação de dados com o banco de dados. 
</p>

---
<br>


## 🚀Tecnologias utlizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias

- [<img alt="Visual Studio Code" src="https://img.shields.io/badge/Visual_Studio-5C2D91?style=for-the-badge&logo=visual%20studio&logoColor=white"/>](https://code.visualstudio.com/download)
- [<img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>](https://www.apachefriends.org/index.html)
- [<img alt="MySql" src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white"/>](https://www.apachefriends.org/index.html)
- [<img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white"/>](https://getbootstrap.com/docs/5.2/getting-started/download/)
- [<img alt="Composer" src="https://img.shields.io/badge/Composer-323330?style=for-the-badge&logo=Composer&logoColor=pink"/>](https://getcomposer.org/download/)

<br>

---

<br>

## 📥Como baixar o projeto

````bash
# Crie um diretório no seu pc
nova pasta

# Abra pasta com o git
Git Bash Here

# Clonar o repositório
$ git clone https://github.com/AlexandreRodriguesFurtado/PHP_POO_CRUD_simples.git
````
<br>

---

<br>

## ⚙ Configurar *Query Builder*
- ⚠️ Na raiz do projeto no diretório **Db/Database.php** altere os campos destacados de acordo com a sua aplicação !

<br>

![configBD](https://user-images.githubusercontent.com/107329581/183490380-8d7a0de2-423a-4b6e-a728-7484a97a064a.png)

---

<br>

## 🚧 Diagrama-DER 🚧

![Diagrama_DER](https://user-images.githubusercontent.com/107329581/183892720-5c40ecb4-65cc-4356-b3f7-be7a88ce4960.png)

---

<br>

## 🚧 Scripts de criação 🚧

````sql
--
-- Banco de dados: `projetofinal`
--

CREATE DATABASE 'projetofinal';

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
````

<br>

## 🚧 Script de inserção 🚧

````sql
INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `ativo`, `data`) 

VALUES 

(NULL, 'Auxiliar Técnico Eletrônica', 'Desenvolve sistemas embarcados para o segmento agrícola.', 'n', current_timestamp()),
 
(NULL, 'Técnico Eletrônica', 'Fabricação de equipamentos do setor bancário e de varejo.', 's', current_timestamp()),

(NULL, 'AUXILIAR DE INDÚSTRIA', 'Auxiliar nos processos de manufatura gerais do departamento.', 's', current_timestamp()),

(NULL, 'Técnico de automação', 'Realizar manutenção predial', 's', current_timestamp()),

(NULL, 'Instalador Hidráulico ', 'Realizar a Instalação e manutenção e reparo preventiva e corretiva de equipamentos', 's', current_timestamp()),

(NULL, 'Assistente Administrativo Fertilizantes', 'Suporte administrativo no setor de fertilizantes.', 's', current_timestamp()),

(NULL, 'Técnico de Informática', 'Realizar análise de erros de hardware e software para efetuar o diagnóstico ', 's', current_timestamp()),

(NULL, 'Digitador', 'Transferir dados de formatos de papel para arquivos de computador usando teclados', 's', current_timestamp()),

(NULL, 'Assistente de TI', 'Ajudar no desenvolvimento das atividades diárias do setor', 's', current_timestamp()),

(NULL, 'Assistente de manutenção', 'Realizar manutenção preditiva e manutenção industria', 's', current_timestamp()),

(NULL, 'Operador de Produção D - Site ', 'Participar dos projetos de melhoria realizada pela equipe de produção ', 's', current_timestamp()),

(NULL, 'Estagiário(a) de Produção Digital ', ' se desenvolver, atuando com clientes e marcas que geram alto impacto nos usuários ', 's', current_timestamp()),

(NULL, 'Supervisor(a) Produção I (Suínos)', 'Coordenar, acompanhar e orientar processos de produção, e padrões de qualidade.', 's', current_timestamp()),

(NULL, 'Líder de Produção ', 'Fornecer treinamento e/ou assistência técnica aos membros da equipe conforme necessário', 's', current_timestamp()),

(NULL, 'Operador De Máquina Laser', ' Fazer programação e operar máquina a laser (gravação)', 's', current_timestamp());
````

---

<br>

desenvolvido por ✌💪 *Alexandre Rodrigues Furtado.*

<br>

## 👍Agradecimentos

<br>

- prof. William Costa do canal **[WDEV](https://www.youtube.com/c/WDEVoficial)** youtube
- prof. Anderson Choren do canal **[Professor Choren](https://www.youtube.com/c/ProfessorChoren)** youtube (professor onde eu estudo)

### Foram as fontes de pesquisa, aprendizado e inspiração para desenvolver o projeto.


