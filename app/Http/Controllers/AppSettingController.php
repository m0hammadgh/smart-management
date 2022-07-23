<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{

    public function showContentSetting()
    {
        $edit = AppSetting::first();

        return view('admin.app_setting.new', compact('edit'));
    }

    public function showContentSettingUpdate(Request $request)
    {
        $edit = AppSetting::where('key','admin_number')->first();
        $edit->value=$request->admin_number;
        $edit->save();
        $edit = AppSetting::where('key','tether_pay_reason')->first();
        $edit->value=$request->tether_pay_reason;
        $edit->save();
        $edit = AppSetting::where('key','rial_pay_reason')->first();
        $edit->value=$request->rial_pay_reason;
        $edit->save();
        $edit = AppSetting::where('key','transfer_pay_reason')->first();
        $edit->value=$request->transfer_pay_reason;
        $edit->save();
        return redirect()->route('settings.content');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \App\Http\Requests\StoreAppSettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AppSetting $appSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AppSetting $appSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AppSetting $appSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSetting $appSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAppSettingRequest $request
     * @param \App\Models\AppSetting $appSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSettingRequest $request, AppSetting $appSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AppSetting $appSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSetting $appSetting)
    {
        //
    }
}
