<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;

use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index(Request $request)
    {
        $days = Day::orderBy('id', 'desc')->paginate(10);

        return view('admin.day.index', compact('days'));
    }

    public function create(Request $request)
    {
        return view('admin.day.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code_days' => 'unique:days,code_days|required',
            'name_day'  => 'required',

        ]);

        $params = [
            'code_days' => $request->input('code_days'),
            'name_day'  => $request->input('name_day'),
        ];

        $days = Day::create($params);

        return redirect()->route('admin.hari');
    }

    public function edit($id)
    {
        $days = Day::find($id);

        if ($days == null)
        {
            return view('admin.layouts.404');
        }

        return view('admin.day.edit', compact('days'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code_days' => 'unique:days,code_days,' . $id . '|required',
            'name_day'  => 'required',

        ]);

        $days            = Day::find($id);
        $days->code_days = $request->input('code_days');
        $days->name_day  = $request->input('name_day');
        $days->save();

        return redirect()->route('admin.hari');
    }

    public function destroy($id)
    {

            Day::find($id)->delete();

        return redirect()->route('admin.hari')->with('success', 'Hari berhasil dihapus');
    }
}
