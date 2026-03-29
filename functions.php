<?php

// Setup do tema
require_once get_template_directory() . '/inc/setup.php';

// Assets (CSS/JS)
require_once get_template_directory() . '/inc/enqueue.php';

// Customizer
require_once get_template_directory() . '/inc/customizer.php';

// WooCommerce
require_once get_template_directory() . '/inc/woocommerce.php';

// Sistema de erro
require_once get_template_directory() . '/inc/error-handler.php';

// Plugins recomendados (TGM)
require_once get_template_directory() . '/inc/tgm.php';