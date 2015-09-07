<?php namespace smsquery;

use League\Flysystem\Exception;
use nable\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nable\Project;
use nable\Toot;
use nable\TootInstance;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller {

    public function getAddToot(Request $request)
    {
        try {
            $toot = Toot::where('namespace', 'smsquery')->first();
            $ti = new TootInstance;
            $ti->project_id = $request->get('project_id');
            $ti->toot_id = $toot->id;
            $ti->save();
            Migrations::up($ti->id);
        }
        catch(Exception $e)
        {
            Return $e;
        }
        finally
        {
            Return redirect('/toot/smsquery/settings/' . $ti->id);
        }

    }

    public function getSettings($id)
    {   $toot['id'] = $id;
        $toot['settings'] = json_decode(TootInstance::find($id)->settings);
        return view('modules.smsquery.message', compact('toot'));
    }

    public function postMessageCreate(Request $request)
    {
        $tableName = $request->toot_id . '_messages';
        $message = DB::table($tableName)->insert($request->get('message'));

        return $message['id'];
    }

    public function postReplyCreate(Request $request)
    {
        $tableName = $request->toot_id . '_replies';
        $reply = DB::table($tableName)->insert($request->get('reply'));

        return $reply['id'];

    }

}
