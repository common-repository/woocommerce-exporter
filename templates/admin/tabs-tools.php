<ul class="subsubsub">
    <li><a href="#tools"><?php esc_html_e( 'Tools', 'woocommerce-exporter' ); ?></a> |</li>
    <li><a href="#export-modules"><?php esc_html_e( 'Export Modules', 'woocommerce-exporter' ); ?></a></li>
</ul>
<!-- .subsubsub -->
<br class="clear" />

<div id="poststuff">

    <?php do_action( 'woo_ce_before_tools' ); ?>

    <div id="tools" class="postbox">
        <h3 class="hndle"><?php esc_html_e( 'WooCommerce Tools', 'woocommerce-exporter' ); ?></h3>
        <div class="inside">
            <p><?php esc_html_e( 'Extend your store with other WooCommerce extensions from us.', 'woocommerce-exporter' ); ?></p>
            <table class="form-table">

                <tr>
                    <td>
                        <a href="<?php echo esc_url( $woo_pd_url ); ?>" <?php echo esc_attr( $woo_pd_target ); ?>><?php esc_html_e( 'Import Products from CSV', 'woocommerce-exporter' ); ?></a>
                        <p class="description"><?php esc_html_e( 'Use Product Importer Deluxe to import Product changes back into your WooCommerce store.', 'woocommerce-exporter' ); ?></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="<?php echo esc_url( $woo_st_url ); ?>" <?php echo esc_attr( $woo_st_target ); ?>><?php esc_html_e( 'Store Toolkit', 'woocommerce-exporter' ); ?></a>
                        <p class="description"><?php esc_html_e( 'Store Toolkit includes a growing set of commonly-used WooCommerce administration tools aimed at web developers and store maintainers.', 'woocommerce-exporter' ); ?></p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <!-- .postbox -->

    <?php do_action( 'woo_ce_after_tools' ); ?>

    <?php do_action( 'woo_ce_before_modules' ); ?>

    <div id="export-modules" class="postbox">
        <h3 class="hndle">
            <?php esc_html_e( 'Export Modules', 'woocommerce-exporter' ); ?>
            <a href="
            <?php
            echo esc_url(
                add_query_arg(
                    array(
						'action'   => 'refresh_module_counts',
						'_wpnonce' => wp_create_nonce( 'woo_ce_refresh_module_counts' ),
                    )
                )
            );
?>
" style="float:right;"><?php esc_html_e( 'Refresh counts', 'woocommerce-exporter' ); ?></a>
        </h3>
        <div class="inside">
            <p><?php esc_html_e( 'Export store details from other WooCommerce and WordPress Plugins, simply install and activate one of the below Plugins to enable those additional export options.', 'woocommerce-exporter' ); ?></p>
            <ul class="subsubsub">
                <li><a href="<?php echo esc_url( add_query_arg( 'module_status', 'all' ) ); ?>" <?php echo ( empty( $module_status ) ? 'class="current"' : '' ); ?>><?php esc_html_e( 'All', 'woocommerce-exporter' ); ?></a> <span class="count">(<?php echo esc_html( $modules_all ); ?>)</span> |</li>
                <li><a href="<?php echo esc_url( add_query_arg( 'module_status', 'active' ) ); ?>" <?php echo ( $module_status == 'active' ? 'class="current"' : '' ); ?>><?php esc_html_e( 'Active', 'woocommerce-exporter' ); ?></a> <span class="count">(<?php echo esc_html( $modules_active ); ?>)</span> |</li>
                <li><a href="<?php echo esc_url( add_query_arg( 'module_status', 'inactive' ) ); ?>" <?php echo ( $module_status == 'inactive' ? 'class="current"' : '' ); ?>><?php esc_html_e( 'Inactive', 'woocommerce-exporter' ); ?></a> <span class="count">(<?php echo esc_html( $modules_inactive ); ?>)</span></li>
            </ul>
            <!-- .subsubsub -->
            <br class="clear" />
            <hr />

            <?php if ( $modules ) { ?>
                <div class="table table_content">
                    <table class="woo_vm_version_table">
                        <?php foreach ( $modules as $module ) { ?>
                            <tr>
                                <td class="export_module">
                                    <?php if ( $module['description'] ) { ?>
                                        <a href="<?php echo esc_url( add_query_arg( 'ref', 'visserlabs', $module['url'] ) ); ?>" target="_blank"><strong><?php echo esc_html( $module['title'] ); ?></strong></a>: <span class="description"><?php echo esc_html( $module['description'] ); ?></span>
                                    <?php } else { ?>
                                        <a href="<?php echo esc_url( add_query_arg( 'ref', 'visserlabs', $module['url'] ) ); ?>" target="_blank"><strong><?php echo esc_html( $module['title'] ); ?></strong></a>
                                    <?php } ?>
                                </td>
                                <td class="status">
                                    <div class="<?php woo_ce_modules_status_class( $module['status'] ); ?>">
                                        <?php if ( $module['status'] == 'active' ) { ?>
                                            <div class="dashicons dashicons-yes" style="color:#008000;"></div><?php woo_ce_modules_status_label( $module['status'] ); ?>
                                        <?php } else { ?>
                                            <?php if ( $module['url'] ) { ?>
                                                <?php
                                                if ( isset( $module['slug'] ) ) {
                                                    echo '<div class="dashicons dashicons-download" style="color:#0074a2;"></div>';
                                                } else {
                                                    echo '<div class="dashicons dashicons-admin-links"></div>';
                                                }
                                                ?>
                                                &nbsp;<a href="<?php echo esc_url( ( isset( $module['slug'] ) ? $module['url'] : add_query_arg( 'ref', 'visserlabs', $module['url'] ) ) ); ?>" target="_blank" 
                                                <?php
                                                if ( isset( $module['slug'] ) ) {
                                                    echo ' title="' . esc_html__( 'Install via WordPress Plugin Directory', 'woocommerce-exporter' ) . '"';
                                                } else {
                                                    echo ' title="' . esc_html__( 'Visit the Plugin website', 'woocommerce-exporter' ) . '"';
                                                }
                                                ?>
                                                ><?php woo_ce_modules_status_label( $module['status'] ); ?></a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- .table -->
            <?php } else { ?>
                <p><?php esc_html_e( 'No export modules are available at this time.', 'woocommerce-exporter' ); ?></p>
            <?php } ?>
        </div>
        <!-- .inside -->
    </div>
    <!-- .postbox -->

    <?php do_action( 'woo_ce_after_modules' ); ?>

</div>
<!-- #poststuff -->
