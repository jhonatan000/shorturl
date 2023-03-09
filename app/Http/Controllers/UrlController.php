<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateUrl(Request $request)
    {
        $user_id = Auth::user()->id;
        // $Link = new ShortLink;
        $allurl = Url::all();
        $url = Url::where('user_id', $user_id)->get();
        // $latestLink = $Link->getLatestData();

        return view('url.generate', [
            'user_id' => $user_id ,
            'url' => $url,
            'allurl' => $allurl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('url.generate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'link' => 'required|url',
            'custom' => 'required|unique:Url,code',

        ]);

         $input['link'] =  $request->link;
         $input['code'] = $request->custom;
         $input['user_id'] = $request->user_id;

         Url::create($input);

        return redirect()->back()->withSuccess('Shorten Link Genereted Successfully.');
    }

    public function latestUrl($code)
    {
        $find = Url::where('code', $code)->first();
        return redirect($find->link);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linkid = Url::findorfail($id);
        return view('url.edit',[
            'linkid'=> $linkid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate ([
            'link' => 'required|url',
            'custom' => 'required|string',
        ]);

        $linkid = Url::findorfail($id);

        $linkid ['link'] = $request->link;
        $linkid ['code'] = $request->custom.Str::random(6);
        $linkid->update($request->all());

        return redirect('/generate-url')->withSuccess('Shorten Link Genereted Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = Url::findorfail($id);
        $url->delete();
        return redirect()->back();
    }


    public function archiveUrl()
    {
        $user_id = Auth::user()->id;
        // $Link = new ShortLink;
        $allurl = Url::all();
        $url = Url::where('user_id', $user_id)->get();
        // $latestLink = $Link->getLatestData();

        return view('url.archive', [
            'user_id' => $user_id ,
            'url' => $url,
            'allurl'=>$allurl,
        ]);
    }
}
