<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth','checkAccountStatus','admin'],
              'prefix' => 'admin' ],
               function () {
                    Route::get('/', 'AdminControllers\HomeController@index');
                    Route::get('home', 'AdminControllers\HomeController@index')->name('admin.home');
                    Route::resource('clients','AdminControllers\ClientController');
                    Route::resource('admins','AdminControllers\AdminController');
                    Route::resource('conversations','AdminControllers\ConversationController');
                    Route::post('conversations/{id}/respond','AdminControllers\ConversationController@respond')->name('conversations.respond');

                    Route::post('clients/{id}/lock','AdminControllers\ClientController@lock');
                    Route::post('clients/{id}/unlock','AdminControllers\ClientController@unlock');
                    Route::post('admins/{id}/lock','AdminControllers\AdminController@lock');
                    Route::post('admins/{id}/unlock','AdminControllers\AdminController@unlock');
               });

Route::group(['middleware' => ['auth','checkAccountStatus','client']],
               function () {
                    Route::get('/', 'ClientControllers\HomeController@index');
                    Route::get('profile', 'ClientControllers\ClientController@profile')->name('profile');
                    Route::patch('profile', 'ClientControllers\ClientController@update')->name('profile.update');
                    Route::get('conversations', 'ClientControllers\ConversationController@index')->name('client.conversations');
                    Route::get('conversations/create', 'ClientControllers\ConversationController@create')->name('client.create.conversation');

                    Route::get('conversations/{id}', 'ClientControllers\ConversationController@show')->name('client.show.conversations');




                    Route::post('conversations', 'ClientControllers\ConversationController@store')->name('client.store.conversation');
                    Route::get('home', 'ClientControllers\HomeController@index')->name('client.home');
                     Route::get('facebook', 'ClientControllers\HomeController@showFacebook')->name('client.facebook');
               });


/*
Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin', function () {
        return view('user.indexadmin', compact('users'));
    })->name('admin');

    Route::get('dashbord', function () {
      return view('dashbord');
    })->name('dashbord');
});
// Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
// Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});
*/




use  alchemyguy\YoutubeLaravelApi\AuthenticateService;  

Route::get('jaafar',function(){



if (!file_exists('/home/jaafar/projets/new/Projetlarvaelkpi/vendor/autoload.php')) {
  throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__));
}
require_once '/home/jaafar/projets/new/Projetlarvaelkpi/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('API code samples');


// TODO: For this request to work, you must replace
//       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
//       client_secret.json file. For more information, see
//       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
$client->setAuthConfig('/home/jaafar/projets/new/Projetlarvaelkpi/client_secret.json');
$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);    
$client->setAccessType('offline');
$client->setApprovalPrompt('force');
// Request authorization from the user.
$authUrl = $client->createAuthUrl();
printf("Open this link in your browser:\n%s\n", $authUrl);
print('Enter verification code: ');

 print $authUrl;

$authCode = '4/vAEC-4GaJF1k_kLcLL4nYm_TOSf7ddiqMPjP2yL2MTG3UTpku3uua3pKtMlyJPCsPte_AhsfQ4LaWyoR5P2MRGk'; // insert the verification code that you get after going to url in $authurl
file_put_contents('token.json', $client->authenticate($authCode));

 
// Exchange authorization code for an access token.
$client->setAccessToken(file_get_contents('token.json'));

// Define service object for making API requests.
$service = new Google_Service_YouTubeAnalytics($client);

return $response = $service->reports->query();
print_r($response);

});