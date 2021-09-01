<?php

namespace App\Http\Controllers;

use App\Models\MemorizedPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemorizedPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memorizedPages = MemorizedPage::all();
        if(MemorizedPage::whereStatus('W')->first()) {
            $memorizePage = MemorizedPage::whereStatus('W')->first();
        }else{
            $memorizePage = MemorizedPage::whereStatus('N')->inRandomOrder()->first();
            $memorizePage->status = 'W';
            $memorizePage->save();
        }

        $memorizedPagesGroup = MemorizedPage::groupBy('status')->select('status', DB::raw('count(*) as total'))->get();

        return view('home', compact('memorizedPages','memorizePage','memorizedPagesGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemorizedPage  $memorizedPage
     * @return \Illuminate\Http\Response
     */
    public function memorized()
    {

        $memorizePage = MemorizedPage::whereStatus('W')->first();
        $memorizePage->status = 'M';
        $memorizePage->save();

        $memorizePage = MemorizedPage::whereStatus('N')->inRandomOrder()->first();
        $memorizePage->status = 'W';
        $memorizePage->save();

        $memorizedPages = MemorizedPage::all();

        $memorizedPagesGroup = MemorizedPage::groupBy('status')->select('status', DB::raw('count(*) as total'))->get();

        return view('home', compact('memorizedPages','memorizePage','memorizedPagesGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemorizedPage  $memorizedPage
     * @return \Illuminate\Http\Response
     */
    public function edit(MemorizedPage $memorizedPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemorizedPage  $memorizedPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemorizedPage $memorizedPage)
    {
        $memorizedPage->status = 'M';
        $memorizedPage->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemorizedPage  $memorizedPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemorizedPage $memorizedPage)
    {
        //
    }
}
