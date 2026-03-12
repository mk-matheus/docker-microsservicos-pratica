# Microsserviços com Docker: Prática e Otimização

Este projeto é uma evolução do cenário prático proposto no bootcamp da Digital Innovation One. O objetivo principal é demonstrar a arquitetura de microsserviços utilizando contentores Docker, aplicando as melhores práticas do mercado para garantir independência, segurança e escalabilidade da infraestrutura.

## 🚀 Melhorias Implementadas (Indo além do projeto base)

Para demonstrar conhecimentos avançados, as seguintes otimizações foram aplicadas ao projeto original:
1. **Docker Compose:** Criação do ficheiro `docker-compose.yml` para orquestração automática da Base de Dados, Instâncias da Aplicação e Balanceador de Carga.
2. **Segurança (12-Factor App):** Remoção de IPs e senhas *hardcoded* no código PHP (`index.php`), passando a utilizar Variáveis de Ambiente.
3. **Imagens Leves:** Utilização da imagem `nginx:alpine` para reduzir o tamanho da imagem e a superfície de ataque.
4. **Resolução de Nomes Interna:** Configuração do `nginx.conf` para utilizar o DNS interno do Docker, eliminando a dependência de IPs privados estáticos da AWS.
5. **Healthchecks:** Configuração de dependências no Compose para garantir que a aplicação PHP apenas inicie quando a Base de Dados MySQL estiver totalmente pronta para receber conexões.

## 🛠️ Arquitetura

* **Nginx (Proxy Reverso/Load Balancer):** Recebe os pedidos na porta `4500` e distribui entre os contentores da aplicação.
* **PHP Apache (App):** Múltiplas instâncias da aplicação processando os pedidos de forma independente.
* **MySQL (Base de Dados):** Armazena os dados inseridos pela aplicação.

## ⚙️ Como executar o projeto

Certifique-se de que tem o Docker e o Docker Compose instalados na sua máquina.

1. Clone o repositório:
   ```bash
   git clone [https://github.com/SEU_USUARIO/NOME_DO_REPO.git](https://github.com/SEU_USUARIO/NOME_DO_REPO.git)
   cd NOME_DO_REPO
