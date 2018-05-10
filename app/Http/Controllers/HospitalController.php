<?php

namespace App\Http\Controllers;

use App\Adachiku\Hospital;
use App\Http\Requests\HospitalRequest;

class HospitalController extends Controller {
	public function getCreate() {
		return view('admin.page.hospital.create');
	}

	public function postCreate(HospitalRequest $request) {

		$params = $request->only('name', 'is_deleted');
		if (empty($params['is_deleted'])) {
			$params['is_deleted'] = 0;
		}
		$model = new Hospital($params);
		if ($model->save()) {
			$request->session()->flash('success', '登録が完了しました');
			return redirect()->route("admin.hospital.getCreate");
		}
		return redirect()->back()->withErrors($validateResult)->withInput($request->all());
	}
}
