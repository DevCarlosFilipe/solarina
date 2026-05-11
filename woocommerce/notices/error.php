<?php
defined('ABSPATH') || exit;
$notices = $notices ?? [];
if (!$notices) {
    return;
}
?>

<div class="premium-notices-wrapper">

    <?php foreach ($notices as $notice) : ?>

        <div class="premium-notice error">

            <div class="premium-notice-icon">
                !
            </div>

            <div class="premium-notice-content">

                <?php
                echo wc_kses_notice(
                    $notice['notice']
                );
                ?>

            </div>

        </div>

    <?php endforeach; ?>

</div>