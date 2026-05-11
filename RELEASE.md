# Solarina Release 1.2.0

## Resumo do lançamento

Este release atualiza o tema Solarina para a versão `1.2.0`, com foco em experiência de checkout WooCommerce, aviso de mensagens e carregamento condicional de assets.

## O que foi entregue

- Adicionado CSS exclusivo para checkout: `assets/css/form-checkout.css`.
- Adicionado JS exclusivo para o checkout: `assets/js/checkout.js`.
- Adicionado estilo dedicado para avisos (`notices`) em `assets/css/notices.css`.
- Atualizado `inc/enqueue.php` para carregar assets de checkout apenas em páginas de checkout, melhorando performance.
- Corrigido carregamento do script de checkout usando `jquery` como dependência para evitar falhas de execução.
- Ajustado `assets/js/header.js` para inicialização segura após DOM estar pronto.
- Atualizada a versão do tema para `1.2.0`.

## Notas de release

- O checkout agora possui arquivos CSS e JS dedicados, garantindo estilo e comportamento exclusivos sem poluir o restante do tema.
- Mensagens e avisos do WooCommerce recebem estilo próprio em `notices.css`, melhorando a consistência visual.
- Carregamento condicional de assets reduz o tempo de carregamento em páginas que não são checkout.
- O header do tema ficou mais estável, com inicialização JavaScript mais segura.

## Arquivos atualizados nessa versão

- `style.css`
- `README.md`
- `CHANGELOG.md`
- `RELEASE.md`
- `inc/enqueue.php`
- `assets/css/form-checkout.css`
- `assets/css/notices.css`
- `assets/js/checkout.js`
- `assets/js/header.js`
