# Solarina

Solarina é um tema WordPress premium para lojas WooCommerce de moda praia e verão. O tema é pensado para marcas de biquínis, maiôs, saídas de praia e acessórios; com um visual leve, elegante e moderno, ideal para e-commerces que buscam uma experiência de compra refinada.

## Versão atual

- `1.0.0`
- Lançamento focado em performance, experiência de usuário e continuidade de design.

## Principais recursos

- Compatível com WooCommerce para loja, produtos e checkout.
- Layout responsivo para desktop, tablet e mobile.
- Área de `My Account` personalizada e integrada com WooCommerce.
- Seção de busca (`search`) estilizada com cards consistentes ao tema.
- Cabeçalho com avatar do usuário logado e menu mobile otimizado.
- Carregamento condicional de CSS por página para melhorar performance.
- Seção Instagram / Follow que exibe shortcode do plugin quando disponível.
- Páginas de produto com layout elegante, reviews estilizados e abas customizadas.
- Seções de destaque: hero, produtos, categorias, informações e follow.

## Instalação

1. Copie a pasta do tema para `wp-content/themes/solarina`.
2. Ative o tema em **Aparência > Temas** no painel WordPress.
3. Instale e ative o plugin **WooCommerce**.
4. Instale o plugin de Instagram compatível se quiser usar a seção `Follow`.
5. Configure o Customizer e o menu de navegação conforme a identidade da marca.

## Como atualizar para a versão 0.5.6

- Atualize `style.css` para `0.5.6`.
- Verifique o `CHANGELOG.md` para ver o histórico das alterações.
- Certifique-se de que os plugins necessários estejam ativos: WooCommerce e plugin de Instagram.

## O que mudou no release `0.5.6`

- Adicionado `page-top-backdrop` com degradê laranja nas páginas sem background, garantindo melhor transição visual abaixo do menu fixo.
- Avatar do usuário logado exibido no cabeçalho desktop, igual ao menu mobile.
- Página de busca (`search`) redesenhada com cards responsivos e estilo do tema.
- Carregamento de CSS separado por página: `search.css`, `account.css`, `woocommerce.css`, `products.css` e outros apenas quando necessário.
- Ajuste no `header.css` para remover troca de logo branca no menu mobile e manter consistência.
- Fix na seção Instagram (`follow`) usando `shortcode_exists()` para garantir que o shortcode seja executado quando disponível.

## Estrutura do tema

- `assets/css/` – estilos específicos por seção e funcionalidade.
- `assets/js/` – scripts do tema, como controle de header e carrossel.
- `template/` – componentes do cabeçalho, rodapé e seções customizadas.
- `woocommerce/` – templates WooCommerce sobrescritos.
- `inc/` – funções do tema, carregamento de assets, integração com plugin e atualizações.

## Suporte

- Ideal para ecommerces de moda praia e lifestyle.
- Recomendado o uso com WooCommerce e um plugin de Instagram compatível para a seção `Follow`.

## Licença

- GPLv2 ou superior
