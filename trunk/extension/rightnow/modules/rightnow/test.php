<?php
/**
 * File test.php
 *
 * @package rightnow
 * @version //autogentag//
 * @copyright Copyright (C) 2007 xrow. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl.txt GPL License
 */
$Module =& $Params['Module'];
$http = eZHTTPTool::instance();

if ( $http->hasPostVariable('Skip') )
{
    $Module->redirectToView( 'menu' );
}

include_once( 'kernel/common/template.php' );
$tpl = templateInit();


$contact['sa_state']=(int)0;
$contact['ma_state']=(int)0;
$contact['css_state']=(int)1;

$contact['first_name']=(string)'Bjoern';
$contact['last_name']=(string)'ezright';
$contact['login']=(string)'ezright';
$contact['email']=(string)'bjoern@xrow.de';
$contact['password']=(string)'openpass';

/*
$contact['first_name']=(string)'Joe';
$contact['last_name']=(string)'Smith';
$contact['sa_state']=(int)0;
$contact['ma_state']=(int)0;
$contact['css_state']=(int)1;
*/

#RightNow::createCustomer( $contact );
$user = new RightNow();
$id = $user->getUniqueCustomer( array("email" => "tobedeletedafterwardstestuser@example.com") );
$value = $user->getCustomer( $id );
$Result = array();
$Result['left_menu'] = "design:parts/ezadmin/menu.tpl";
$Result['content'] = $tpl->fetch( "design:rightnow/test.tpl" );
$Result['path'] = array( array( 'url' => false,
                        'text' => 'API Test' ) );
?>