# AplicacaoWEBUniasselvi

Este repositório contém o projeto para o Seminário Interdisciplinar.

## Instalação

Para instalar o projeto, siga os seguintes passos:

1. Clone o repositório usando o comando: `git clone https://github.com/MatheusSan99/AplicacaoWEBUniasselvi.git`
2. Execute o comando no terminal `composer install e composer update`
3. Certifique-se de ter o PHP e o MySQL instalados. (Xdebug é opcional)

## Executando o Servidor

Para iniciar o servidor, execute o seguinte comando no terminal: `php -S localhost:8000 -t public`

## Acessando a Aplicação

Uma vez que o servidor esteja em execução, você pode acessar a aplicação em seu navegador usando a seguinte URL: [localhost:8000http://](http://localhost:8000)

## Guia de Uso

1. Página de Listagem de Notícias:

    - Exibe uma lista de notícias com título, imagem e um breve resumo.
    - Usuários podem clicar em uma notícia para ver os detalhes completos.

2. Criação de Notícias:

    - Usuários autenticados podem criar novas notícias.
    - O formulário de criação inclui campos para título, imagem, conteúdo e categoria da notícia.

3. Edição de Notícias:

    - Usuários autenticados podem editar notícias existentes.
    - O formulário de edição permite atualizar o título, imagem, conteúdo e categoria da notícia.

4. Remoção de Notícias:

    - Usuários autenticados podem remover notícias.

5. Autenticação de Usuário:

    - Formulário de login para usuários autenticados.
    - Opção para logout.

Navegação na Aplicação:

- Página Inicial: Exibe uma lista de notícias recentes.
- Nova Notícia: Acesso ao formulário para criar uma nova notícia.
- Editar Notícia: Acesso ao formulário para editar uma notícia existente.
- Remover Notícia: Opção para remover uma notícia.
- Login: Formulário de login para autenticação do usuário.
- Logout: Opção para sair da sessão.

Diagrama de Casos de Uso:

O diagrama de casos de uso descreve as interações entre os usuários e o sistema:

```plaintext
                  +--------------------+
                  |   Usuário Anônimo  |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |  Listar Notícias   |
                  +--------------------+
                             |
                             v
                  +----------+---------+
                  |   Ver Detalhes     |
                  +--------------------+

                  +--------------------+
                  | Usuário Autenticado|
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |   Criar Notícia    |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |   Editar Notícia   |
                  +----------+---------+
                             |
                             v
                  +----------+---------+
                  |  Remover Notícia   |
                  +--------------------+
                             |
                             v
                  +----------+---------+
                  |   Logout           |
                  +--------------------+
```

## Documentacao Seminario

https://trilhaaprendizagem.uniasselvi.com.br/ADS102_seminario_interdisciplinar_implementacao/

## Colaborando no Projeto

Trabalhando com Branches Individuais
Para garantir que todos os membros da equipe possam trabalhar simultaneamente no projeto sem conflitos, cada um deve criar e trabalhar em sua própria branch. Aqui estão os passos para configurar isso:

Atualize o repositório local:

```
git pull origin main
```

Crie sua branch a partir da main:

```
git checkout -b sua-branch
```

Substitua sua-branch por um nome que identifique o que você está trabalhando, por exemplo, criar-noticia, editar-noticia, autenticacao-usuario.

Faça suas alterações e commit:

```
git add .
git commit -m "Descrição das mudanças"
```

Envie sua branch para o repositório remoto:

```
git push origin sua-branch
```

Abra um Pull Request:

Vá até o repositório no GitHub.
Clique em "Compare & pull request".
Descreva suas mudanças e solicite a revisão.

Padrão de Projeto Relacionado aos Casos de Uso

Para este projeto, iremos utilizar o padrão MVC (Model-View-Controller). Este padrão ajuda a organizar a aplicação em três componentes principais:

**Model:**

Representa a lógica de dados da aplicação. Aqui você pode definir classes que representam as notícias, usuários, etc.
Exemplo: Classe Noticia que contém atributos como título, imagem, conteúdo e categoria.

**View:**

Responsável pela interface do usuário. Exibe os dados do model para o usuário e envia comandos do usuário para o controller.
Exemplo: Páginas HTML/PHP que listam notícias, formulários de criação e edição.

**Controller:**

Controla a lógica da aplicação. Recebe a entrada do usuário a partir da view, processa a lógica necessária e interage com o model.
Exemplo: Classe NoticiaController que gerencia ações como criar, editar, listar e remover notícias.

**Fluxo de Interação:**

Quando o usuário acessa a página de listagem de notícias, o Controller chama o Model para obter os dados das notícias e passa esses dados para a View.
Ao criar ou editar uma notícia, a View envia os dados para o Controller, que então atualiza o Model e redireciona o usuário de volta para a lista de notícias.

Esse padrão facilita a manutenção e a escalabilidade do código, além de separar claramente as responsabilidades dentro da aplicação.

