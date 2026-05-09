# Solarina Release 1.1.0

## Resumo do lançamento

Este release atualiza o tema Solarina para a versão `1.1.0`, com foco na organização dos estilos de produto e no carregamento condicional de CSS específico para templates do WooCommerce.

## O que foi entregue

- Criado CSS dedicado para `woocommerce/single-product/summary.php` em `assets/css/single-product-summary.css`.
- Criado CSS dedicado para a galeria de produto em `assets/css/single-product-gallery.css`.
- Criado CSS dedicado para produtos relacionados em `assets/css/single-product-related.css`.
- Criado CSS dedicado para abas do produto em `assets/css/single-product-tabs.css`.
- Criado CSS dedicado para reviews do produto em `assets/css/single-product-reviews.css`.
- Atualizado `inc/enqueue.php` para registrar e carregar estes assets somente em páginas de produto.
- Atualizada a versão do tema para `1.1.0` em `style.css`.

## Notas de release

- A organização de estilos do tema agora está mais granular, com assets específicos para cada parte do template de produto.
- A performance do carregamento de páginas de produto melhora ao somente carregar os CSS necessários.
- O release serve como base para futuras personalizações de templates WooCommerce sem misturar estilos globais.

## Arquivos atualizados nessa versão

- `style.css`
- `CHANGELOG.md`
- `RELEASE.md`
- `inc/enqueue.php`
- `assets/css/single-product-summary.css`
- `assets/css/single-product-gallery.css`
- `assets/css/single-product-related.css`
- `assets/css/single-product-tabs.css`
- `assets/css/single-product-reviews.css`
