# Instalação no Windows
- ### Requisitos
    - Instale primeiramente o [WSL2](https://docs.microsoft.com/pt-br/windows/wsl/install)
        - Pelo PowerShell no modo **administrador** digite os comados:
            - `wsl --install`
            - `wsl --set-default-version 2`
            - `wsl -l -v`
            - Aqui deve aparecer uma imagem Ubuntu, caso não apareça, você precisa baixar, digite `wsl --install -d Ubuntu`
            - `wsl --setdefault <Nome_da_distro_Linux>`
        - Existe a opção de instalar o Ubuntu pelo Microsoft Store, caso não funcione, portanto, lembre-se de alterar a distribuição do WSL.
            - Configurar o uso do WSL:
            - No seu diretório `C:/Users/nome_usuario/` crie um arquivo chamado `.wslconfig`
            - Configure o arquivo da seguinte maneira:
          ``` 
            [wsl2]
              memory=4GB # Limits VM memory in WSL 2
              processors=1 # Makes the WSL 2 VM use 4 virtual processors
              localhostForwarding=true # Boolean specifying if ports bound to wildcard or localhost in the WSL 2 VM should be connectable from the host via localhost:port.
          ```
    - Configure o seu Windows como conta [Windows Insider Preview](https://www.youtube.com/watch?v=sr6vtDoTnWU)

  ### Docker
    - Após completar os outros passos, instale o [Docker Desktop](https://docs.docker.com/desktop/windows/install/)
    - Reinicie o computador
    - Abra o Docker Desktop, em Settings, confira se a opção *'Use the WSL 2 based engine'* está habilitada.
    - Em Settings > Resources > WSL Integration habilite a opção *'Enable integration with my default WSL distro'* e marque a sua distribuição padrão para integrar ao Docker. Dê um Apply & Restart.

  ### PHP
    - Você precisa instalar o PHP e suas extensões para executar os comandos de `composer ` e `php`.
    - Siga as instruções da versão escolhidas neste [link](https://thishosting.rocks/install-php-on-ubuntu/). (Como este projeto é Laravel 9, a versão do PHP deve ser ao menos 8.0)


## Instalando o Sail

- Clone o projeto na sua máquina pelo WSL no diretório `~`. (É de extrema importância pois fazer a instalação em `/mnt/c/Users/...` pode causar problemas de permissão)
- Com o Docker baixado e instalado em sua máquina
- Entre na pasta do projeto
- Rode o `composer install`
- Crie uma conexão com o banco de acordo com o `.env`.
- Rode `php artisan sail:install`
- Para testar a instalação do sail, rode `./vendor/bin/sail up`

## Rodando o banco

### MySQL Workbench
- Caso tenha problemas com falha na conexão com o banco, acesse o terminal na pasta do projeto.
- Acesse o CLI do MySQL que está no container MySQL do seu Docker Desktop (Clicando nos 3 pontinhos da imagem do container MySQL)
- Digite `mysql -u root -p` e digite a senha `password`
- Em seguida digite os seguintes comandos (um de cada vez):
    ```
    CREATE USER 'sail'@'localhost' IDENTIFIED BY 'password';

    GRANT ALL PRIVILEGES ON *.* TO 'sail'@'localhost' WITH GRANT OPTION;

    CREATE USER "sail'@'%" IDENTIFIED BY 'password';

    GRANT ALL PRIVILEGES ON *.* TO "sail'@'%" WITH GRANT OPTION;

    FLUSH PRIVILEGES;
    ```
- Reinicie o container pelo Docker Desktop

Após instalação do sail, em um outro terminal você utilizará o artisan normalmente, mas de dentro do Docker. Veja:

- Verifique o seu .env.example e crie o seu .env (pode só copiar inicialmente)
- Agora rode `sail artisan migrate`
- Verifique se o migrations rodou completamente com `sail artisan migrate:status`

## Criando um alias para o sail

- Crie um alias para facilitar o uso com `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`
- Faça um `sail up -d` para executar sem logs do servidor ou `sail up` para rodar e visualizar também os logs.
- Abra o browser via `http://localhost/`
- Para parar o sail, use `sail stop` ou de um CONTROL+C


## Instalando o package.json para realizar alterações no código

Após deixar o sail rodando e rodar o banco, vocë precisará rodar o npm para instalar os packages, yarn e utilizar o mix para fazer um watch os arquivos de modificação, tais como JS, SASS etc. Para isso:

- Rode o comando: `sail npm install` para instalar as dependencias dentro do docker
- Rode o comando: `sail npm run dev` para rodar o mix e compilar os arquivos
- Lembre-se de sempre rodar os comandos com o nome `sail` antes para ter certeza que utilizaremos o Docker para rodar todos os comandos
