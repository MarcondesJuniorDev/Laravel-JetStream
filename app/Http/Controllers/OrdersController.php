<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Order;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public readonly Order $order;
    public function __construct()
    {
        $this->order = new Order();
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order, User $user, Contract $contract)
    {
        return view('orders.create', compact('order', 'user', 'contract'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request);
        $created = $this->order->create([
            'id' => $request->input('id'),
            'id_user_created' => $request->input('id_user_created'),
            'id_contract' => $request->input('id'),
            'id_type_contract' => $request->input('id'),
            'id_local' => $request->input('id'),
            'requester' => $request->input('requester'),
            'contact_phone' => $request->input('contact'),
            'description' => $request->input('id')
        ]);
        if ($created) {
            return redirect()->route('order.index')->with('message', 'Ordem de Serviço '.  $request->input('name') . ' adicionado com Sucesso');
        }
        return redirect()->back()->with('message', 'Erro ao Cadastrar. Verifique os dados.!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->validate());

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
