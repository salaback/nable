<?php namespace smsquery;

use nable\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nable\Project;
use nable\Toot;
use nable\TootInstance;

class RouteController extends Controller {

    public function getAddToot(Request $request)
    {
        $toot = Toot::where('namespace', 'smsquery')->first();
        $ti = new TootInstance;
        $ti->project_id = $request->get('project_id');
        $ti->toot_id = $toot->id;
        $ti->save();



        Return redirect('/toot/smsquery/settings/' . $ti->id);
    }

    public function getSettings($id)
    {
        return $id;
    }

}
