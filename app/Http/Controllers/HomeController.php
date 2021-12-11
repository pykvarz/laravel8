<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Bb;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     const BB_VALIDATOR = [
        'title'         => 'required|max:50',
        'description'   => 'required',
        'price'         => 'required|numeric'
    ];

     const BB_ERROR_MESSAGES = [
        'price.required'    => 'Раздать товары бесплатно нельзя',
        'required'          => 'Заполните это поле',
        'max'               => 'Значение не должно быть длинее :max символов',
        'numeric'           => 'Введите число'
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function showAddBbForm()
    {
        return view('bb_add');
    }

    public function storeBb(Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);

        Auth::user()->bbs()->create(['title' => $validated['title'], 'price'  => $validated['price'],'description'=> $validated['description']]);
        return redirect()->route('home');
    }

    public function updateBb(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);
        $bb->fill([ 'title'         => $validated['title'],
                    'description'   => $validated['description'],
                    'price'         => $validated['price'] ]);
        $bb->save();
        return redirect()->route('home');
    }

    public function showEditBbForm(Bb $bb)
    {
        return view('bb_edit', ['bb' => $bb]);
    }

    public function showDeleteBbForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }

    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
