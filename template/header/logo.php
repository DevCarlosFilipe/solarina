<div class="logo">
    <a href="<?php echo home_url(); ?>">
        <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            bloginfo('name');
        }
        ?>
    </a>
</div>