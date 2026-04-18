# Changelog

## [0.5.6] - 2026-04-18
### Added
- Adicionado `page-top-backdrop` com degradê laranja nas páginas sem background completo, empurrando o conteúdo para baixo do menu fixo.
- Inserido avatar do usuário logado no cabeçalho desktop, espelhando o comportamento do menu mobile.
- Customizada a página de busca com cards de resultados que combinam com o visual do tema.
- Adicionado carregamento condicional de `search.css` e `account.css` para otimizar o loading por página.

### Changed
- Versão do tema atualizada para `0.5.6` em `style.css`.
- Otimizado `inc/enqueue.php` para não carregar CSS de outras páginas na home e carregar apenas estilos específicos conforme o contexto.
- Ajustado `header.css` para remover a troca de logo branca no mobile e manter apenas o logo padrão.
- Refinado o layout de produto e formulário de avaliação, reduzindo o zoom em telas grandes e melhorando a apresentação de review form, botões e abas.
- Ajustada a renderização da seção Instagram em `template/sections/follow.php` para usar `shortcode_exists()` e funcionar corretamente quando o plugin estiver ativo.

### Fixed
- Correção da seção `follow`: agora exibe o shortcode do Instagram quando disponível, sem depender apenas de configurações internas do plugin.
- Correção do estilo da página de busca para manter a consistência visual do tema.
- Correção do carregamento condicional de CSS para melhorar desempenho na home e reduzir assets desnecessários.

## [0.2.6] - 2026-04-10
### Added
- Integração completa da área `My Account` do WooCommerce, incluindo dashboard customizado, navegação de conta e formulários de login/registro.
- Suporte a recuperação e redefinição de senha com templates `form-lost-password.php` e `form-reset-password.php`.
- Estilos dedicados para WooCommerce e conta em `assets/css/woocommerce.css`.
- Estilos específicos de paginação em `assets/css/woocommerce-pagination.css` com visual inspirado em Bootstrap e cores do tema.
- Assets JavaScript separados para `myaccount` em `assets/js/myaccount.js`, removendo scripts inline.
- `archive-product.php` atualizado para usar a imagem de thumbnail da categoria como background do `shop-hero` em páginas de categoria.
- Menu de categorias destacado para a categoria ativa, usando a cor marrom do tema.
- Estilo de botão “Adicionar ao carrinho” restaurado e alinhado ao visual do tema.
- Melhoria no carregamento condicional de CSS: `woocommerce.css` agora carrega para páginas WooCommerce e `my-account`, e `products.css` carrega para páginas de produto/loja.

### Changed
- Versão do tema atualizada para `0.2.6` em `style.css`.
- `style.css` limpo para mover estilos específicos de WooCommerce/conta para arquivos de assets dedicados.
- Melhor organização de templates WooCommerce customizados em `woocommerce/myaccount/`, `woocommerce/cart/` e templates principais do tema.

### Fixed
- Corrigido o botão de alternância de senha no formulário de registro para funcionar com JS externo.
- Corrigidos estilos de paginação e menu de categorias para refletirem corretamente o estado ativo.
