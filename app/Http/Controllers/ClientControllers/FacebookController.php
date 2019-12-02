<?php

namespace App\Http\Controllers\ClientControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Edbizarro\LaravelFacebookAds\Facades\FacebookAds;

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use App\Facebook as FacebookAccount;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $title = "Dashboard";
        $subTitle = "Facebook Dashboard";
     
        $fb = new \Facebook\Facebook([
        'app_id' => '1242399575944322',
        'app_secret' => 'e8e6715ecaedd350e164c2b390feaae8',
        'default_graph_version' => 'v5.0',
        'default_access_token' => 'EAARp9LFkrIIBAKuanKm3cT71spoSpDh2YYdnRpOuLl94PHKt60PRVu4DGfvMwRLAT29knHxzjgggeZCjTmZB8GZB5oyF3pyZAWgYoaOx7FknPrPKolo0ZAZCcKVtZAL4ER4IgSC7gPKZBwRI9vQKBZAOZCG4btHOI57D3oJToNkWbp9QZDZD', // optional
        ]);

         Api::init("1242399575944322", "e8e6715ecaedd350e164c2b390feaae8", "EAARp9LFkrIIBAKuanKm3cT71spoSpDh2YYdnRpOuLl94PHKt60PRVu4DGfvMwRLAT29knHxzjgggeZCjTmZB8GZB5oyF3pyZAWgYoaOx7FknPrPKolo0ZAZCcKVtZAL4ER4IgSC7gPKZBwRI9vQKBZAOZCG4btHOI57D3oJToNkWbp9QZDZD");
         $api = Api::instance();

         try {
          $response = $fb->get(
            '/me?fields=id,name,adaccounts',
            'EAARp9LFkrIIBAKZAt90wgOajoh6ygeIs2VSyQbJQMbzmMTiTTnHqoOHI07fsGffjvgQvR6s7TOIjw6kc4iEMKbRiLxVQ3ohoOPw3lcrxTg1fqmFXcZA2XY0fhbZB7P1xoZBE5TTMk4OkN7cIT8uK8nrH9Fjct42NEnBGTXRwMQZDZD'
          );
        } catch(FacebookExceptionsFacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $graphNode = $response->getGraphNode();
        if($graphNode){
          $fb = FacebookAccont::create([
            'id' => $graphNode['account']['data']['id'],
            'reach' => $graphNode['account']['data']['total_view_count'],
            'impression' => $graphNode['account']['data']['total_click'],
            'cpm' => $graphNode['account']['data']['unit_click_bl'] * 1000,
            'frequence' => $graphNode['account']['data']['total_click'],
            'comments' => $graphNode['account']['data']['total_comments'],
            'partages' => $graphNode['account']['data']['total_share'],
            'comments' => $graphNode['account']['data']['comment_count'],
            'Clics' => $graphNode['account']['data']['total_clicks'],
            'cost' => $graphNode['account']['data']['ad_campaign_cost'],
            'visites' => $graphNode['account']['data']['total_end_visited']
          ]);
        }

        return view('clients.facebook.index',compact('title', 'subTitle' , 'fb' ));

    }
}
