# Solarina Release 0.5.6

## Resumo do lançamento

Este release finaliza a evolução do tema Solarina até a versão `0.5.6`, com foco em acabamento visual, performance e integração sólida com o WooCommerce.

## O que foi entregue

- `page-top-backdrop` com degradê laranja nas páginas sem background, garantindo um topo visual mais suave e alinhado ao menu fixo.
- Integração do avatar do usuário logado no cabeçalho desktop, trazendo consistência com o menu mobile.
- Página de busca (`search`) redesenhada com cards responsivos e estilo condizente com o tema.
- Carregamento condicional de CSS por página, reduzindo o peso na home e acelerando o carregamento inicial.
- Ajustes no `header.css` para remover a troca de logo branca no menu mobile e manter somente o logo padrão.
- Seção Instagram (`follow`) corrigida para renderizar o shortcode do plugin corretamente quando disponível.
- Atualização da versão do tema para `0.5.6`.

## Notas de release

- A home agora carrega somente os estilos necessários, sem assets de busca, conta ou erro quando não são usados.
- O cabeçalho fixo recebeu uma transição visual mais agradável com o degradê de topo.
- O tema está preparado para o uso comum de lojas WooCommerce de moda praia.
- Documentação básica atualizada em `README.md`.

## Arquivos atualizados nessa versão

- `style.css`
- `README.md`
- `CHANGELOG.md`
- `inc/enqueue.php`
- `assets/css/search.css`
- `assets/css/header.css`
- `template/sections/follow.php`
- `template/header/site-header.php`
- `template/header/header-icons.php`
