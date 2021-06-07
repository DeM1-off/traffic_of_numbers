<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;

class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('account.index', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUser()
    {
        return view('account.adduser');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addNumber($id)
    {
        /**
         * Mask number
         *  @parram $num
         */
        $num = array(50,67,63,68);

        return view('account.addnumber', ['user' =>$id,'num'=>$num]);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addBalance($id)
    {

        /**
         * summation with initial sum
         *  @parram user
         */
        return view('account.addbalance', ['user' => Telephone::find($id)]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeBalance(Request $request)
    {
        /**
         * Save new balance
         */
        $user = $request->get('userID');
        Telephone::where('id', (int)$request->get('startId'))->increment('balance', $request->get('balance'));
        return redirect(url('account/'.$user));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeNumber(Request $request)
    {
        /**
         * Save new number
         */
        $user= new Telephone();
        $intt =$request->get('operator') ;
        $operator = implode(",", $intt);
        $sum=  $operator. $request->get('number');
        $user->number=  $sum;
        $user->user_id = $request->get('user_id');
        $user->save();
        return redirect(url('account/'.$user->user_id));;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeAccount(Request $request )
    {
        /**
         * Save new user
         */
        $user= new User();
        $user->fill($request->all());
        $user->save();
        return redirect(route('account.index'));;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {

        /**
         * shows  personal account
         */
        $where = array('user_id' => $id);
        $product  = Telephone::where($where)->get();

        return view('account.show', ['user' => User::findOrFail($id),'numbers'=>$product]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        /**
         * deletes the whole chain
         */
        $user = User::find($id);
        $user->phone()->delete();
        User::find($id)->delete();
        return redirect(route('account.index'));
    }



}
