<?php

namespace App\Repositories\admin;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\UrlShort;
use DataTables;

class UrlRepository
{
    public function index($request)
    {
    	$urlShortens = UrlShort::orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            return Datatables::of($urlShortens)

                ->addIndexColumn()

                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" title="Edit" href="'.route('urlShorten.edit',$row->id).'"> <i class="fa fa-edit"></i></a> ';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
            }
        return view('admin.urlShortens.index');
    }

    public function create()
    {
    	$urlShorten = "";
        return view('admin.urlShortens.create', compact('urlShorten'));
    }

    public function edit($id)
    {
    	$urlShorten = UrlShort::find($id);
        return view('admin.urlShortens.create', compact('urlShorten'));
    }

    public function store($request)
    {
    	if($request->id) {
    		$urlShorten = UrlShort::find($request->id);
    	} else {
    		$urlShorten = new UrlShort;
    	}
    	
    	$urlShorten->link = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
    	$urlShorten->expiry_time = $request->expiry_time;
    	$urlShorten->save();
    	return redirect('admin/urlShorten')->with('message', 'Data saved successfully');
    }

    public function destroy($id)
    {
    	$urlShorten = UrlShort::find($id);
    	if($urlShorten) {
    		$urlShorten->delete();
    		return back()->with('message', 'Data deleted successfully');
    	} else {
    		return back()->with('error', 'Data not found');
    	}
    }
}
