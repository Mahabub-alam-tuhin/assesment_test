<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class itemController extends Controller
{
    public function add_item()
    {
        return view('admin.item.add_item');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Image' => 'Image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Items();
        $product->Title = $request->input('Title');
        $product->Description = $request->input('Description');
        $product->Price = $request->input('Price');

        if ($request->hasFile('Image')) {
            $product->Image = $this->saveImage($request->file('Image'));
        }

        $product->save();

        return back()->with('message', 'Product added successfully');
    }

    private function saveImage($Image)
    {
        $ImageName = rand() . '.' . $Image->getClientOriginalExtension();
        $directory = 'backend/assets/';
        $Imgurl = $directory . $ImageName;
        $Image->move($directory, $ImageName);
        return $Imgurl;
    }

    public function show()
    {
        return view('admin.item.view_all_item', [
            'product' => Items::all()
        ]);
    }
    public function edit($id)
    {
        $product = Items::find($id);
        return view('admin.item.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Items::find($id);
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $product->Title = $request->Title;
        $product->Description = $request->Description;
        $product->Price = $request->Price;

        if ($request->hasFile('Image')) {
            $extension = $request->file('Image')->extension();

            $product->Image = $this->saveImage($request->file('Image'), $extension);
        }

        $product->update();
        return redirect()->route('admin.item.view_all_item');
    }

    public function delete($id)
    {
        Items::where('id', $id)->delete();
        return redirect()->route('admin.item.view_all_item');
    }
    // public function confirmDelete($id)
    // {
    //     Items::where('id', $id)->delete();
    //     Alert::success('Success', 'Product deleted successfully');

    //     return redirect()->route('admin.item.view_all_item');
    // }
}
