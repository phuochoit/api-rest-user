<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Facebook API
|--------------------------------------------------------------------------
*/


$config['facebook_app_id']              = '187003351838948';
$config['facebook_app_secret']          = 'fedba0e260332fa5fd26a3746ba8ba2f';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'user';
$config['facebook_logout_redirect_url'] = 'user/fbLogout';
$config['facebook_permissions']         = array('email');
$config['facebook_graph_version']       = 'v2.6';
$config['facebook_auth_on_load']        = TRUE;


/*
|--------------------------------------------------------------------------
| Google API
|--------------------------------------------------------------------------
*/
$config['google_id'] = '152390454137-9956crsv8lbnu614i6oc6iu3medsqsbo.apps.googleusercontent.com';
$config['google_secret'] = '4TX3pyygp7D45Tb6CrdYfpQF';



/* End of file oauth2.php */
/* Location: ./application/config/oauth2.php */