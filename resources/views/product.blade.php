<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div><div><p class="text-4xl p-6 m-6">แสดงรายการสินค้า</p></div></div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-7 p-6 lg:p-10 ">
                    @foreach($products as $index => $product)
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white ">
                            <strong> ลำดับ : {{ $index + 1 }} </strong> <br>
                            รหัสสินค้า : {{ $product->product_id }} <br>
                            ชื่อสินค้า : {{ $product->product_name }} <br>
                            รายละเอียด : {{ $product->description }} <br>
                            ราคา : {{ $product->price }} <br>
                            จำนวน : {{ $product->stock }} <br>
                        </h5>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
