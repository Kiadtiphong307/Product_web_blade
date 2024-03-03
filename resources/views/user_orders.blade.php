<x-app-layout>

    <div class="py-12">
        @section('title', 'ประวัติการสั่งซื้อ')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($userOrders->isEmpty())
                    <div class="text-2xl p-6 m-6">ไม่มีประวัติการสั่งซื้อ</div>
                @else
                    <div class="text-2xl p-6 m-6">ประวัติการสั่งซื้อ</div>

                    <div class="p-6 m-6">

                        <table class="min-w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ลำดับ
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        รหัสการสั่งซื้อ
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ชื่อ
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ที่อยู่
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        เบอร์โทร
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        รายละเอียดการสั่งซื้อ
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        หลักฐานการโอนเงิน
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        วันที่สร้าง
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($userOrders as $order)
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            {{ $order->id }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            {{ $order->order_id }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            {{ $order->name }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            {{ $order->address }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            {{ $order->phone }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-500 text-left">

                                            รหัสสินค้า : {{ $order->product_id }} <br>
                                            ชื่อสินค้า : {{ $order->product_name }} <br>
                                            จำนวน : {{ $order->stock }} <br>
                                            ราคารวม : {{ $order->total }} <br>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-500">
                                            <a href="{{ asset('storage/' . $order->image) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $order->image) }}" alt="Image"
                                                    class="w-20 h-20 object-cover rounded-lg">
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap  text-xs font-medium text-gray-500">
                                            {{ $order->created_at->timezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                @endif
            </div>
        </div>

        <div class="py-2">
            {{ $userOrders->links() }}
        </div>

    </div>
    </div>
</x-app-layout>
