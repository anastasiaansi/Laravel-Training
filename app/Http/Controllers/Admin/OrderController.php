<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders= Order::paginate(10);
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }
    /**
     * Show the form for creating a new feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'info' => 'required|string|min:5',
        ]);
        $orders= Order::create(
            $request->only(['name','phone','email', 'info'])
        );

        if ($orders) {
            Storage::append('info/order.txt', $orders);
            return redirect()->route('admin.order.index')
                ->with('success','create is success');
        }

        return back()->with('error', 'create is fail');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.order.index')
            ->withSuccess(__('Feedback delete successfully.'));
    }
}
