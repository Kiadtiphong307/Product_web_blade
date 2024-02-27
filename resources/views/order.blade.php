<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('order') }}
        </h2>
    </x-slot>


    @if (count($orders) > 0)
    <div class="py-12">
        @section('title', 'ประวัติการสั่งซื้อ')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-2xl p-6 m-6">ประวัติการสั่งซื้อ</div>
                <div class="p-6 m-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ลำดับ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ชื่อ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ที่อยู่
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    เบอร์โทร
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    รูปภาพ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    วันที่สร้าง
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->order_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->address }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ asset('storage/' . $order->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $order->image) }}" alt="Image" class="w-20 h-20 object-cover rounded-lg">
                                    </a>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $order->created_at->timezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}
                                </td>
                                
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-2xl p-6 m-6">ไม่มีประวัติการสั่งซื้อ</div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>