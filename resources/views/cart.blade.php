<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @section('title', 'ตะกร้าสินค้า')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-2xl p-6 m-6">ตระกร้า</div>
                
                        <div class="flex flex-col">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                ลำดับ
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                รหัสสินค้า
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ชื่อสินค้า
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                รายละเอียด
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                จำนวน
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ราคา
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                <span class="sr-only">Delete</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                        
                                                    <tbody>
                                                        @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                        <tr rowId="{{ $id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            <td class="px-6 py-4" >
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['id'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['product_name'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['description'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['stock'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['price'] }}
                                                            </td>

                                                            <td class="px-6 py-4 ">
                                                                <form id="delete-form-{{ $id }}" action="{{ route('deletecart', $id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-sm delete-product" onclick="return confirm('ต้องการลบ {{ $details['product_name'] }} หรือไม่ ? ')">ลบ</button>
                                                                </form>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                    
                                                </div>
                                        </div>  

                              </div>
                        </div>
                    </div>
   
            </div>
        </div>
    </div>


</x-app-layout>
