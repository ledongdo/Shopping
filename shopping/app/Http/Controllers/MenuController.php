<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Components\MenuRecusive;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    private $menuRecusive;
    public function __construct(Menu $menu,MenuRecusive $menuRecusive)
    {
        $this->menu=$menu;
        $this->menuRecusive=$menuRecusive;
    }
    public function index()
    {   
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menus.index',compact('menus'));   
    }
    public function create()
    {
        $optionSelect = $this->menuRecusive->MenuRecusiveAdd();
        return view('admin.menus.add',compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id)
    {
        
        $menuFolowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->MenuRecusiveEdit($menuFolowIdEdit->parent_id);
        return view('admin.menus.edit',compact('menuFolowIdEdit','optionSelect'));
    }
    public function update($id,Request $request)
    {
        $menu = $this->menu->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
