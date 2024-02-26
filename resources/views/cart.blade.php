<x-app-layout>
    <script>
                function confirmcheckout() {
            var confirmed = confirm('ต้องการชำระสินค้า ');
            // if (confirmed) {
            //     alert("ชำระเงินสำเร็จ");
            // }
            return confirmed;
        }
    </script>

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

                                <div class=" p-6 m-6">
                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                รหัสสินค้า
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ตัวอย่างรูปภาพ
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ชื่อสินค้า
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ราคา
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                จำนวน
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ราคารวม
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                <span class="sr-only">Delete</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                        
                                                    <tbody>
                                                        
                                                    
                                                        @php 
                                                        $totalStock = 0;
                                                        $totalPrice = 0;
                                                        @endphp
                                                        @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                        @php 
                                                        $totalStock += $details['stock'];
                                                        $totalPrice += $details['price']* $details['stock'] 
                                                        @endphp
                                                        <tr rowId="{{ $id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            

                                                            <td class="px-6 py-4">
                                                                {{ $details['id'] }}
                                                            </td>

                                                            <td class="px-6 py-4">
                                                                <img src="{{ asset('storage/images/' . ($details['image'] ?? '')) }}" class="w-20 h-20 object-cover rounded-lg">
                                                            </td>
                                                            
                                                            
                                                            
                                                            <td class="px-6 py-4">
                                                                {{ $details['product_name'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $details['price'] }}
                                                            </td>

                                                            <td class="px-6 py-4 ">
                                                                <form id="update-form-{{ $id }}" action="{{ route('updatecart') }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                                    <input  name="stock" value="{{ $details['stock'] }}" class=" w-15 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" data-id="{{ $id }}" />
                                                                    <button type="number" type="submit" class="btn btn-primary rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">+</button> 
                                                                </form>
                                                            </td>

                                                            
                                                            
                                                            
                                                            
                                                            <td class="px-6 py-4 ">
                                                                {{ $details['stock'] * $details['price'] }}
                                                            </td>

                                                            <td class="px-6 py-4 ">
                                                                <form id="delete-form-{{ $id }}" action="{{ route('deletecart', $id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline btn-sm delete-product" onclick="return confirm('ต้องการลบ {{ $details['product_name'] }} หรือไม่ ? ')">ลบ</button>
                                                                </form>
                                                            </td>
                                                            
                                                            
                                                        </tr> 
                                                        @endforeach
                                                        
                                                        @endif
                                                    </tbody>
                                                </table>
                                                
                                            </div>

                                            <div class="py-5 px-2">
                                                @if (session('cartQuantityMatches') === false)
                                                    @foreach (session('cartMessages', []) as $message)
                                                        <div class="font-medium text-red-600 dark:text-red-500" role="alert">
                                                            **** จำนวนสินค้า {{ $message['product_id'] }} : {{ $message['product_name'] }} 
                                                            ไม่สามารถเพิ่มได้เนื่องจากเหลือเพียง {{ $message['remaining_stock'] }} ชิ้น
                                                            กรุณาตรวจสอบใหม่
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            




                                            

               <div class="py-5">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-1 gap-6 lg:gap-78p-6 lg:p-10 "> 
                                 <p class="text-2xl ...">ที่อยู่</p>
                                     <div class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                        <form class="space-y-4"  action="#">
                                             @csrf 
                                             <div>
                                                <label for="product_name" class="block text-sm font-medium text-gray-700">ชื่อ-สกุล</label>
                                                <input name="product_name" type="text" id="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            </div>                 
                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-700">ที่อยู่</label>
                                                <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                            </div>
                                            <div>
                                                <label for="price" class="block text-sm font-medium text-gray-700">เบอร์โทร</label>
                                                <input  name="price" type="number" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                 
                                            </div>
                                            <div class="flex justify-end py-5">

                                                <div class="focus:outline-none text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-right" >
                                                    <a class="font-medium text-red-600 dark:text-red-500  text-right">
                                                        ยอดชำระเงินทั้งหมด  ({{ $totalStock }}) <br>
                                                        ฿ {{ $totalPrice }}
                                                    </a>
                                                </div>

                                                <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <a href="#"
                                                    onclick="confirmcheckout()"
                                                    >ชำระเงิน</a>
                                                </button>
                                            </div>
                                        </form>
                                                                                    
                                    </div>
                                </div>  
                            </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
