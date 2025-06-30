# TrustWork - Versão Melhorada

## Descrição
Esta é a versão melhorada do sistema TrustWork com implementações de segurança, acessibilidade, performance e experiência do utilizador aprimoradas.

## Melhorias Implementadas

### 🔒 Segurança
- **Ficheiro de configuração separado** (`config.php`) para credenciais da base de dados
- **Proteção CSRF** em todos os formulários
- **Rate limiting** no sistema de login para prevenir ataques de força bruta
- **Validação e sanitização** robusta de dados de entrada
- **Hashing seguro** de senhas com `password_hash()`
- **Prepared statements** para prevenir SQL injection

### 🎨 Interface e Experiência do Utilizador
- **CSS consolidado** em ficheiro único (`style.css`)
- **Design responsivo** melhorado para todos os dispositivos
- **Navegação consistente** entre páginas
- **Feedback visual** melhorado para ações do utilizador
- **Loading states** e animações suaves
- **Mensagens de erro/sucesso** mais informativas

### ♿ Acessibilidade
- **Navegação por teclado** implementada
- **Atributos ARIA** para leitores de ecrã
- **Labels apropriados** em formulários
- **Contraste de cores** melhorado
- **Skip links** para navegação rápida
- **Texto alternativo** em imagens

### ⚡ Performance
- **CSS otimizado** com variáveis CSS
- **JavaScript modular** e eficiente
- **Lazy loading** de imagens
- **Caching** de recursos estáticos
- **Código limpo** e bem estruturado

### 🛠 Funcionalidades Novas
- **Sistema de notificações** interativo
- **Pesquisa avançada** com filtros
- **Gestão de perfil** completa
- **Validação em tempo real** nos formulários
- **Funcionalidade "Lembrar-me"** no login

## Estrutura de Ficheiros

```
trustwork_melhorado/
├── config.php              # Configurações da aplicação
├── conexao.php             # Conexão com base de dados melhorada
├── style.css               # CSS consolidado e otimizado
├── index.html              # Página inicial melhorada
├── cadastro.php            # Sistema de cadastro com validações
├── login.php               # Sistema de login com proteções
├── logout.php              # Logout com limpeza completa
├── perfil.php              # Gestão de perfil do utilizador
├── servicos.html           # Página de serviços interativa
├── pesquisa.html           # Sistema de pesquisa avançada
├── notificacoes.html       # Sistema de notificações
├── sobrenos.html           # Página sobre nós melhorada
└── README.md               # Este ficheiro
```

## Instalação e Configuração

### Pré-requisitos
- Servidor web (Apache/Nginx)
- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Extensões PHP: mysqli, session

### Passos de Instalação

1. **Copie os ficheiros** para o diretório do servidor web
2. **Configure a base de dados** no ficheiro `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'seu_usuario');
   define('DB_PASS', 'sua_senha');
   define('DB_NAME', 'trustwork');
   ```

3. **Crie a base de dados** com as seguintes tabelas:

```sql
-- Tabela de utilizadores
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    ativo BOOLEAN DEFAULT TRUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultimo_login TIMESTAMP NULL,
    ultimo_logout TIMESTAMP NULL
);

-- Tabela para controlo de tentativas de login
CREATE TABLE tentativas_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    sucesso BOOLEAN NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip VARCHAR(45)
);
```

4. **Configure as permissões** dos ficheiros:
   ```bash
   chmod 644 *.php *.html *.css
   chmod 600 config.php  # Maior segurança para configurações
   ```

5. **Teste a aplicação** acedendo ao `index.html`

## Configurações de Segurança

### Produção
- Mova o `config.php` para fora do diretório público
- Configure HTTPS
- Defina senhas fortes na base de dados
- Configure backup automático
- Implemente logs de segurança

### Configurações Recomendadas no PHP
```ini
session.cookie_httponly = 1
session.cookie_secure = 1
session.use_strict_mode = 1
display_errors = 0
log_errors = 1
```

## Funcionalidades por Página

### index.html
- Design responsivo
- Navegação acessível
- Links para todas as funcionalidades
- Seção informativa sobre benefícios

### cadastro.php
- Validação em tempo real
- Proteção CSRF
- Verificação de email duplicado
- Feedback visual de validação

### login.php
- Proteção contra força bruta
- Funcionalidade "Lembrar-me"
- Validação de credenciais
- Redirecionamento seguro

### perfil.php
- Gestão de informações pessoais
- Alteração de senha
- Histórico de atividades
- Logout seguro

### servicos.html
- Carrossel interativo
- Categorias de serviços
- Navegação inferior fixa
- Pesquisa integrada

### pesquisa.html
- Filtros avançados
- Resultados dinâmicos
- Ordenação múltipla
- Interface intuitiva

### notificacoes.html
- Sistema de filtros
- Ações em lote
- Estados visuais
- Interação em tempo real

### sobrenos.html
- Design moderno
- Informações da empresa
- Estatísticas animadas
- Call-to-action

## Suporte e Manutenção

### Logs
- Erros de PHP: verificar logs do servidor
- Tentativas de login: tabela `tentativas_login`
- Atividades: logs personalizados implementados

### Backup
- Base de dados: backup diário recomendado
- Ficheiros: backup semanal dos ficheiros da aplicação

### Atualizações
- Verificar atualizações de segurança do PHP
- Monitorizar logs de erro
- Testar funcionalidades regularmente

## Contacto e Suporte

Para questões técnicas ou suporte, consulte a documentação ou entre em contacto com a equipa de desenvolvimento.

---

**Versão:** 2.0  
**Data:** Junho 2024  
**Desenvolvido por:** Equipa TrustWork

