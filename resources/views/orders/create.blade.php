<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders > Gerar Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a
                href="{{ route('orders.index') }}"
                type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Retornar
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <form method="post" action="{{ route('orders.store') }}">
                                @csrf
                                <div class="space-y-12">
                                    <div class="border-b border-gray-900/10 pb-12">
                                        <h2 class="text-base font-semibold leading-7 text-gray-900">Gerar Ordem de Serviços</h2>
                                        <p class="mt-1 text-sm leading-6 text-gray-600">Preecha o formulário para criar ordem de serviço para atendimento.</p>
                                        <hr>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
                                            <div class="sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Número da Ordem de Serviço</label>
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"></span>
                                                    <input type="number" name="id" id="id" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{ $order->orderBy('id', 'desc')->first()->id + 1 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Criado Por</label>
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span class="flex select-none items-center pl-6 text-gray-500 sm:text-sm"></span>
                                                    <input type="text" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" readonly>
                                                    <input type="hidden" name="id_user_created" id="id_user_created" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
                                            <div class="sm:col-span-9">
                                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Solicitante</label>
                                                <div class="mt-2">
                                                    <input id="requester" name="requester" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-4">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                                                <div class="mt-2">
                                                    <input type="tel" name="contact" id="contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-5">
                                                <label for="local" class="block text-sm font-medium leading-6 text-gray-900">Local</label>
                                                <div class="mt-2">
                                                    <select data-te-select-init data-te-select-filter="true" type="text" name="local" id="local" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <option value="1">Local 01</option>
                                                        <option value="2">Local 02</option>
                                                        <option value="3">Local 03</option>
                                                        <option value="4">Local 04</option>
                                                        <option value="5">Local 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="contract" class="block text-sm font-medium leading-6 text-gray-900">Contrato</label>
                                                <div class="mt-2">
                                                    <select data-te-select-init data-te-select-filter="true" type="text" name="contract" id="nacontractme" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        @foreach($contract->all() as $contract)
                                                            <option value="{{ $contract->id_contract }}">{{ $contract->contract }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="type_of_contract" class="block text-sm font-medium leading-6 text-gray-900">Tipo de Contrato</label>
                                                <div class="mt-2">
                                                    <select data-te-select-init data-te-select-filter="true" type="text" name="type_of_contract" id="type_of_contract" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <option value="1">Tipo 01</option>
                                                        <option value="2">Tipo 02</option>
                                                        <option value="3">Tipo 03</option>
                                                        <option value="4">Tipo 04</option>
                                                        <option value="5">Tipo 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="occurrence" class="block text-sm font-medium leading-6 text-gray-900">Ocorrências</label>
                                                <div class="mt-2">
                                                    <div class="relative flex w-full">
                                                        <select id="occurrence" name="occurrence" multiple autocomplete="off" class="block w-full rounded-sm cursor-pointer focus:outline-none">
                                                            <option value="1">Teste 1</option>
                                                            <option value="2">Teste 2</option>
                                                            <option value="3">Teste 3</option>
                                                            <option value="4">Teste 4</option>
                                                            <option value="5">Teste 5</option>
                                                            <option value="6">Teste 6</option>
                                                            <option value="7">Teste 7</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-9">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do Serviço</label>
                                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Informe aqui uma breve descrição do serviço . . . "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


