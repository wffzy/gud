<?php

namespace Pterodactyl\Http\Controllers\Plugins;

use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pterodactyl\Models\Billing\BillingSettings;
use Pterodactyl\Models\Billing\BillingUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


require_once('PlUtil.php');

class PluginsController extends Controller
{

  /**
   * Returns listing of user's servers.
   *
   * @return \Illuminate\View\View
   */
  public function __construct(Request $request)
  {
    $this->request = $request;
    BillingSettings::scheduler();
  }

  private function getTemplate()
  {
    return $this->request->template;
  }

  public static function isPerms($server)
  {
    $uServers = BillingUsers::getUserServersData(Auth::user()->id);

    if (!isset($uServers[$server])) {
      return false;
    }
    return true;
  }

  public function index($server, $p = 1)
  {
    if (!self::isPerms($server)) {
      return redirect()->back();
    }
    $data = getAllPlugins(array('size' => 21, 'page' => $p));
    if (empty($data)) {
      return view('templates.' . $this->getTemplate() . '.plugins.error');
    }

    return view('templates.' . $this->getTemplate() . '.plugins.core', [
      'page' => 'plugins',
      'categories' => getPluginsCategories(),
      'plugins' => $data,
      'server' => $server,
      'p' => $p,
      'url' => "/server/{$server}/plugins/",
      'app_url' => config('app.url'),
      'settings' => BillingSettings::getAll()
    ]);
  }
  public function category($server, $id, $p = 1)
  {
    self::isPerms($server);
    $data = getPluginsInCategory($server, $id, array('size' => 21, 'page' => $p));
    if (empty($data)) {
      return view('templates.' . $this->getTemplate() . '.plugins.error');
    }

    return view('templates.' . $this->getTemplate() . '.plugins.core', [
      'page' => 'categories',
      'categories' => getPluginsCategories(),
      'plugins' => $data,
      'server' => $server,
      'p' => $p,
      'url' => "/server/{$server}/plugins/category/{$id}/",
      'app_url' => config('app.url'),
      'settings' => BillingSettings::getAll()
    ]);
  }
  public function search($server, $find, $p)
  {
    self::isPerms($server);
    $data = search($find, $p);
    if (empty($data)) {
      return view('templates.' . $this->getTemplate() . '.plugins.error');
    }
    return view('templates.' . $this->getTemplate() . '.plugins.core', [
      'page' => 'search',
      'categories' => getPluginsCategories(),
      'plugins' => $data,
      'server' => $server,
      'p' => $p,
      'url' => "/server/{$server}/plugins/search/{$find}/",
      'app_url' => config('app.url'),
      'settings' => BillingSettings::getAll()
    ]);
  }

  public function upload($server, $pl_id, $pl_mane)
  {
    installPlugin($server, $pl_id, $pl_mane);
    return;
  }

  public function getUpURL($server)
  {
    return getUpURL($server) . '&directory=/plugins';
  }
}
