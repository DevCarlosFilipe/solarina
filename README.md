# Solarina

Solarina é um tema WordPress premium para lojas WooCommerce de moda praia e verão. O tema é pensado para marcas de biquínis, maiôs, saídas de praia e acessórios; com um visual leve, elegante e moderno, ideal para e-commerces que buscam uma experiência de compra refinada.

## Versão atual

- `1.2.0`
- Lançamento focado em checkout WooCommerce dedicado, avisos estilizados e carregamento condicional de assets para maior performance.

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

## Como atualizar para a versão 1.2.0

- Atualize `style.css` para `1.2.0`.
- Verifique o `CHANGELOG.md` para o histórico completo de alterações.
- Certifique-se de que o plugin WooCommerce esteja ativo e revise as novas dependências de layout do checkout caso use personalizações adicionais.

## O que mudou no release `1.2.0`

- Adicionado `assets/css/form-checkout.css` para estilo dedicado do checkout WooCommerce.
- Adicionado `assets/js/checkout.js` com comportamento exclusivo para cupom e feedback visual de carregamento.
- Adicionado `assets/css/notices.css` para estilizar mensagens e avisos do WooCommerce.
- Atualizado `inc/enqueue.php` para carregar os arquivos de checkout e notices apenas quando necessário.
- Corrigido carregamento do script de checkout definindo `jquery` como dependência correta.
- Ajustado `assets/js/header.js` para inicialização segura após o DOM carregar, eliminando erro `ReferenceError: header is not defined`.
- Atualizada a versão do tema para `1.2.0` em `style.css`.

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
