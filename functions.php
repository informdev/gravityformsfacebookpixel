// Allow for Gravity Forms submissions to be track with the Facebook Pixel
add_filter( 'gform_submit_button', 'add_onclick', 10, 2 );
function add_onclick( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $onclick = $input->getAttribute( 'onclick' );
    $onclick .= " fbq('track', 'CompleteRegistration');";
    $input->setAttribute( 'onclick', $onclick );
    return $dom->saveHtml( $input );
}
