### Estrutura do projeto

```bash
login/
├── public/                   # Arquivos acessados diretamente pelo navegador
│   ├── css/
│   │   ├── global.css
│   │   └── painel.css
│   ├── img/
│   ├── index.php             # Tela Inicial de login
│   ├── cadastro.php          # Tela de cadastro
│   ├── dados.php             # Tela de atualizar dados
│   └── painel/               # Subpasta para arquivos da área logada
│       ├── index.php         # Painel principal
│       ├── logout.php
│       └── verificar.php     # Redirecionamento/autorização
├── src/                      # Scripts internos, não acessados diretamente
│   ├── database/
│   │   └── conexao.php
│   ├── controllers/
│       ├── autenticar.php
│       ├── cadastrar.php
│       └── processar_dados.php
└── README.md


```
