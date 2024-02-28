<x-app-layout>


    <div class="py-12">
        @section('title', 'หน้าหลัก')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-4">
                    <div class="text-center " style="font-size:1.5rem; font-weight:bold;s">
                        Products Interesting
                    </div> <hr style="width: 25%; margin: auto; border: 1.5px solid #000;">

                    <div class="col-box">
                        <div class="header underline mt-5" style="font-size:1.3rem; font-weight:bold">
                            Products Nourth
                        </div>
                        <div class="north">
                            <!-- box-1 -->
                        <div class="box">
                            <div>
                                <img src="https://s.isanook.com/tr/0/ud/252/1262078/umbella.jpg" alt="">
                            </div>
                            <div class="text-center mt-3" style="font-size:1.2rem; font-weight:bold">
                                Products_One
                                <p class="text-center" style="font-weight:bold">
                                    $5500
                                </p>
                            </div>
                        </div>

                        <!-- box-2 -->
                        <div class="box">
                            <div>
                                <img src="https://s.isanook.com/tr/0/ud/252/1262078/strawberry.jpg" alt="">
                            </div>
                            <div class="text-center mt-3" style="font-size:1.2rem; font-weight:bold">
                                Products_Two
                                <p class="text-center" style="font-weight:bold">
                                    $6500
                                </p>
                            </div>
                        </div>

                        <!-- box3 -->
                        <div class="box">
                            <div>
                                <img src="https://s.isanook.com/tr/0/ui/252/1262078/teenjok_1363060017.jpg" alt="">
                            </div>
                            <div class="text-center mt-3" style="font-size:1.2rem; font-weight:bold">
                                Products_Three
                                <p class="text-center" style="font-weight:bold">
                                    $4000
                                </p>
                            </div>
                        </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<style>

.box {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 500px;
    max-height: 500px;
    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.3);
}

.north {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 2rem;

}



.box img{
    flex: 1;
    max-width: 200px%;
    height: 250px;
}

.col-box > div {
    padding: 10px;
}


</style>
