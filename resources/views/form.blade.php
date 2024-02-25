<x-app-layout>
    <script>
        function confirmproduct() {
            var confirmed = confirm('ต้องการเพิ่มสินค้า หรือไม่ ? ');
            if (confirmed) {
                alert("เพิ่มสินค้าเสร็จสิ้น");
            }
            return confirmed;
        }
    </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols- md:grid-cols-1 gap-6 lg:gap-78p-6 lg:p-10 "> 
                    <p class="text-2xl ...">เพิ่มรายการสินค้า</p>


                    <div class="mt-5 text-gray-500 text-sm leading-relaxed" >
                        <form class="space-y-4" method="POST" action="/Admin/store">
                            @csrf 
                                <div>
                                    <label for="product_name" class="block text-sm font-medium text-gray-700">ชื่อสินค้า</label>
                                    <input name="product_name" type="text" id="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                
                                    @error('product_name')
                                    <div class="alert alert-danger py-2 text-red-600">{{ $message }}</div>
                                    @enderror
        
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">รายละเอียด</label>
                                    <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                    
                                    @error('description')
                                    <div class="alert alert-danger py-2 text-red-600">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">ราคา</label>
                                    <input  name="price" type="number" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    
                                    @error('price')
                                    <div class="alert alert-danger py-2 text-red-600">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div>
                                    <label for="stock" class="block text-sm font-medium text-gray-700">จำนวน</label>
                                    <input name="stock" type="number" id="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                
                                    @error('quantity')
                                    <div class="alert alert-danger py-2 text-red-600">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="py-5">
                                <input type="submit"  value="เพิ่มสินค้า"  onclick="confirmproduct()"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 p-3"></input>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>