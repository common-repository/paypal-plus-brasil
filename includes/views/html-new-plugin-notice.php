<?php
/**
 * New Plugin notice.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$is_installed = false;
if ( function_exists( 'get_plugins' ) ) {
	$all_plugins  = get_plugins();
	$is_installed = ! empty( $all_plugins['paypal-brasil-para-woocommerce/paypal-brasil.php'] );
}
?>

<?php if ( $is_installed && current_user_can( 'install_plugins' ) && ! is_plugin_active( 'paypal-brasil-para-woocommerce/paypal-brasil.php' ) ) : ?>
    <div class="error">
        <p>
            Agora o <b>Checkout Transparente do PayPal</b> é <b>PayPal Brasil para WooCommerce</b> (<a href="https://br.wordpress.org/plugins/paypal-brasil-para-woocommerce/" target="_blank">conheça aqui</a>)!<br>Identificamos que o plugin já está instalado, ative agora e desfrute das novas soluções PayPal.
        </p>
        <p>
            <a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=paypal-brasil-para-woocommerce/paypal-brasil.php&plugin_status=active' ), 'activate-plugin_paypal-brasil-para-woocommerce/paypal-brasil.php' ) ); ?>"
               class="button button-primary"><?php _e( 'Ativar <b>PayPal Brasil para WooCommerce</b>', 'paypal-plus-brasil' ); ?></a>
        </p>
    </div>
<?php elseif ( ! $is_installed ) :
	if ( current_user_can( 'install_plugins' ) ) {
		$url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=paypal-brasil-para-woocommerce' ), 'install-plugin_paypal-brasil-para-woocommerce' );
	} else {
		$url = 'https://br.wordpress.org/plugins/paypal-brasil-para-woocommerce/';
	}
	?>
    <div class="error">
        <p>
            Agora o <b>Checkout Transparente do PayPal</b> é <b>PayPal Brasil para WooCommerce</b> (<a href="https://br.wordpress.org/plugins/paypal-brasil-para-woocommerce/" target="_blank">conheça aqui</a>)!<br>Instale agora e desfrute das novas soluções PayPal. Não se esqueça de desativar o atual após a instalação do novo.
        </p>
        <p><a href="<?php echo esc_url( $url ); ?>"
              class="button button-primary"><?php _e( 'Instalar <b>PayPal Brasil para WooCommerce</b>', 'paypal-plus-brasil' ); ?></a>
        </p>
    </div>
<?php elseif ( $is_installed ): ?>
	<?php
	$plugin_file = 'paypal-plus-brasil/paypal-plus-brasil.php';
	$context     = 'all';
	$page        = 1;
	$s           = '';
	$url         = wp_nonce_url( 'plugins.php?action=deactivate&amp;plugin=' . urlencode( $plugin_file ) . '&amp;plugin_status=' . $context . '&amp;paged=' . $page . '&amp;s=' . $s, 'deactivate-plugin_' . $plugin_file );
	?>
    <div class="error">
        <p>
            Agora o <b>Checkout Transparente do PayPal</b> é <b>PayPal Brasil para WooCommerce</b> (<a href="https://br.wordpress.org/plugins/paypal-brasil-para-woocommerce/" target="_blank">conheça aqui</a>)!<br>Identificamos que o plugin já está instalado e ativado, revise as configurações do novo Checkout Transparente (<a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&paypal-brasil' ) ); ?>" target="_blank">aqui</a>) e desative o plugin antigo.
        </p>
        <p><a href="<?php echo esc_url( $url ); ?>"
              class="button button-primary"><?php _e( 'Desativar <b>Checkout Transparente do PayPal</b>', 'paypal-plus-brasil' ); ?></a>
        </p>
    </div>
<?php endif; ?>
