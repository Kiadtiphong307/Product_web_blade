<x-app-layout>
    @section('title', 'รายการสินค้า')
    @if (count($products) > 0)


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="text-2xl p-6 m-6 text-center" >
                        รายการสินค้าแนะนำ🛒
                        <hr style="width: 20%; margin: auto; border: 1.5px solid #000; ">
                    </div>
                    <div class=" p-6 m-6 " >  

                                        <div class="card">          
                                        @foreach($products as $product)
                                        @csrf
                                        <div class="box rounded-lg ">
                                            <div name="image">
                                                <img src="{{ asset('storage/'.$product->image) }} ">
                                            </div>

                                            <div class="text-center">
                                                <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="product_id">
                                                รหัสสินค้า : {{ $product->id }}
                                                </div>
                                                <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="product_name">
                                                ชื่อสินค้า : {{ $product->product_name }}
                                                </div>
                                                <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="description">
                                                รายละเอียด : {{ $product->description }} หมวดหมู่ : {{ $product->category }} ภาค : {{ $product->region }}
                                                </div>
                                                {{-- <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="region">
                                                    ภาค : {{ $product->region }}
                                                </div>
                                                <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="category">
                                                    หมวดหมู่ : {{ $product->category }}
                                                </div> --}}
                                                <div  class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="price">
                                                    ฿ {{ $product->price }} บาท
                                                </div>
                                                <div class="px-2 py-1 whitespace-nowrap text-xs font-medium text-gray-500" name="stock">
                                                มีสินค้าทั้งหมด {{ $product->stock }} ชิ้น   
                                                </div>
                                            </div>

                                            @if($product->stock > 0)
                                            <button type="submit" class="btn-add mb-2 mt-2  rounded-lg">
                                                <p class="flex">
                                                    <a href="{{ route('addcart', $product->id) }}"
                                                        onclick="return confirm('ต้องเพิ่ม {{ $product->product_name }} ลงตะกร้าหรือไม่ ? ')">เพิ่มลงตะกร้า</a>
                                                    <svg class="justify-self-end mt-1 mb-1 rounded-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart rounded-lg">
                                                        <circle cx="9" cy="21" r="1"></circle>
                                                        <circle cx="20" cy="21" r="1"></circle>
                                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 1.96 1.61h8.72a2 2 0 0 0 1.96-1.61L23 6H6" style="fill:none;stroke-linecap:round;stroke-linejoin:round;"></path>
                                                    </svg>
                                                </p>
                                            </button>
                                        @else
                                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                <p class="flex">
                                                    <span>สินค้าหมด</span>
                                                </p>
                                            </button>
                                        @endif

                                        </div>
                                        @endforeach
                
                                        </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="py-2">
                                {{ $products->links() }}
                            </div>     
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-2xl p-6 m-6">ไม่พบข้อมูลสินค้า</div>
            </div>
        </div>
    </div>
    @endif


</x-app-layout>

<style>

    .box {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 250px;
        max-height: 500px;
        box-shadow: 0 6px 6px rgba(0, 0, 0, 0.3);
    }
    
    .card {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 4rem;
    
    }
    
    .btn-add {
        background-color: green;
        color:#fff;
        padding: 8px 12px;
    }
    
    .p{
        font-size:1.2rem;
    }
    
    
    .box img{   
        flex: 1;
        max-width: 200px%;
        height: 250px;
    }
    
    .col-box > div {
        padding: 10px;
    }
    
    .btn-add svg {
            width: 18px;
            height: 18px;
            margin-right: 5px;
            margin-left: 5px;
    }
    
    .btn-add {
        transition: transform 0.2s ease; /* เพิ่มการเปลี่ยนแปลงเมื่อ hover */
    }
    
    .btn-add:hover {
        transform: scale(1.05); /* เพิ่มขนาดปุ่มเมื่อ hover */
    }
    </style>