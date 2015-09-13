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
            Return redirect('/toot/smsquery/settings?toot_id=' . $ti->id);
        }

    }

    public function getSettings(Request $request)
    {   $ti = TootInstance::find($request->get('ti_id'));
        $toot['id'] = $ti->toot_id;
        $toot['settings'] = json_decode($ti->settings);
        return view('modules.smsquery.message', compact('toot'));
    }

    public function getMessage($id, Request $request)
    {
        $ti = TootInstance::find($request->get('ti_id'));
        $toot['id'] = $ti->toot_id;
        $toot['settings'] = json_decode($ti->settings);
        $tableName = $ti->toot_id. '_messages';
        $message = DB::table($tableName)->where('id', $id)->first();
        return view('modules.smsquery.message', compact('message', 'toot'));

    }

    public function postMessageCreate(Request $request)
    {
        $message = DB::table($tableName)->insert($request->get('message'));

        return $message['id'];
    }

    public function postReplyCreate(Request $request)
    {
        $tableName = $request->toot_id . '_replies';
        $reply = DB::table($tableName)->insert($request->get('reply'));
        $reply = json_decode(json_encode($request->get('reply')), FALSE);

        return view('modules.smsquery._reply_tile', compact('reply'));

    }

    public function postLinkMessage(Request $request)
    {

        $message_id = $request->get('message_id');
        $ti = $request->get('ti_id');

        $message_id = DB::table($ti . '_messages')->insertGetId($request->get('message'));
        DB::table($ti . '_replies')->where('id', $request->get('reply_id'))->update(['next_message' => $message_id]);

        return $request->get('message')['name'];

    }

}
