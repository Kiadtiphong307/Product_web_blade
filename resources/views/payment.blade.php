<x-app-layout>
    @section('title', 'ชำระเงิน')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                            <div class=" p-6 ">
                                <div class="text-2xl p-6 m-4 text-center">การชำระเงิน</div>
                                <div class="text-center py-2">
                                        <img src="{{ asset('storage/images/payment.jpg') }}" style="width: 250px; height: auto; margin: auto;">

                                        <div class="focus:outline-none text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center" >
                                            <a class="font-medium text-red-600 dark:text-red-500  ">
                                                {{-- ยอดชำระเงินทั้งหมด ฿ {{ $totalPrice }} --}}
                                            </a>
                                        </div>
                                </div>
                                <div>
                                    <div class="text-2xl p-6 m-4 text-center">
                                        <button  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <a href="cart">ยกเลิก</a>
                                        </button>

                                        <form method="post" action="{{ route('insertorder') }}">
                                            @csrf
                                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                ตกลง
                                            </button>
                                        </form>

                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>