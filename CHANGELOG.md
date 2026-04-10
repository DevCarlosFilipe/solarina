# Changelog

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
