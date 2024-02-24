<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="text-2xl p-6 m-6">แสดงรายการสินค้า</div>
                    <div class=" p-6 m-6">
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
                                                ราคา
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                จำนวน
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                สถานะ
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="sr-only">Delete</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $index => $product)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $index + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $product->product_id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->product_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->price }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $product->stock }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($product->stock > 0)
                                                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">มีสินค้า</button>
                                                @else
                                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">หมด</button>
                                                @endif
                                            </td>
                                            
                                            <td class="px-6 py-4 text-right">
                                                <a href="{{ route('edit', $product->product_id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                                onclick="return confirm('ต้องการแก้ไขสินค้า {{ $product->product_id }} หรือไม่ ? ')">แก้ไข</a>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a 
                                                href="{{ route('delete', $product->product_id) }}" 
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                onclick="return confirm('ต้องการลบสินค้า {{ $product->product_id }} หรือไม่ ? ')" > ลบ </a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

            </div>
        </div>
    </div>
</x-app-layout>
