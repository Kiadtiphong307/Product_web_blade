<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<x-app-layout>

    <div class="">

        @section('title', 'หน้าหลัก')
        <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl rounded-xl">
            <div class="container">
                <!-- header-picture FIRST -->
                <div class="content-img object-center w-full text-center" style="max-width:100%; max-height: 400px; position: relative;">
                    <img src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" style="filter: brightness(80%);">
                    <div class="text-box mb-10" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 10px; font-size:3rem; color:#FFFAF0; font-weight:bold;">
                        <p style="margin: 0;">Welcome to website</p>
                        <p class="text-center" style="margin-top: .2rem; font-size:1.2rem">BY GROUPPROJECT</p>
                    </div>

                    <div class="text-box1 mb-10 flex" style="position: absolute; bottom: 0; left: 50%; transform: translate(-50%, 0);padding: 10px;">
                        <div style="position: relative;">
                            <i class="fas fa-envelope" style="position: absolute; top: 50%; transform: translateY(-50%); right: 15px; font-size: 18px; color: #ccc; font-size:24px"></i>
                            <input type="text" placeholder="Enter your email" style="width: 400px; padding: 8px 40px 8px 20px; border-radius: 15px; font-size: 14px;">
                        </div>
                        <button style="padding: 8px 20px; border-radius: 15px; font-size: 14px; margin-left: 10px; border: 2.3px solid #fff; color: #fff; font-weight: bold; background-color: transparent; font-size: 15px">
                            Send Email <i class="fa fa-paper-plane ml-2" style="color: #fff; font-size:18px;"></i>
                        </button>
                    </div>
                </div>
                <!-- header-picture END -->
            </div>
        </div>

        <!-- header-main FIRST -->
        <div class="text-center mt-10">
                <p class="font-size:5rem; color: black;" style="font-size:1.7rem; font-weight:bold;">
                    Interesting tourist
                </p>
                <hr style="margin: auto; width: 25%; border:1px solid #000;">

                <!-- box-1 -->
                <div class="content-event mt-10">
                    <div class="custom-box shadow-xl">
                        <div class="box-1">
                            <div class="box-img w-full" style="">
                                <img src="https://www.agoda.com/wp-content/uploads/2019/10/The-Giant-Swing-Bangkok-sightseeing.jpg" alt="">
                            </div>
                        <div class="box-text">Travel One</div>
                        <button class="bg-black text-white hover:bg-gray-800 mb-5 mt-5" style="padding:8px 8px;">
                            <span>Learn more</span>
                        </button>
                    </div>
                </div>

                <!-- box-2 -->
                <div class="content-event ml-10">
                    <div class="custom-box shadow-xl">
                        <div class="box-1">
                            <div class="box-img w-full" style="">
                                <img src="https://s.isanook.com/tr/0/ud/283/1417415/ahr0chm6ly9zlmlzyw5vb2suy29tl_9.jpg?ip/resize/w728/q80/jpg" alt="">
                            </div>
                        <div class="box-text">Travel Two</div>
                        <button class="bg-black text-white hover:bg-gray-800 mb-5 mt-5" style="padding:8px 8px;">
                            <span>Learn more</span>
                        </button>
                    </div>
                </div>
                <!-- box-3 -->
                <div class="content-event ml-10">
                    <div class="custom-box shadow-xl">
                        <div class="box-1">
                            <div class="box-img w-full" style="">
                                <img src="https://static.thairath.co.th/media/Dtbezn3nNUxytg04N1QVlSgaL7B2Lkwv4tgfHCZ5lfoz3X.webp" alt="">
                            </div>
                        <div class="box-text">Travel Three</div>
                        <button class="bg-black text-white hover:bg-gray-800 mb-5 mt-5" style="padding:8px 8px;">
                            <span>Learn more</span>
                        </button>
                    </div>
                </div>
            </div>
        </div> <br>

    </div>
</div>




</x-app-layout>
<style>

.content-img {
    max-width: 100%;
    max-height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

    .content-event {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box-1 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .box-img img {
        max-width: 400px;
        height: 300px;
    }

    .box-text {
        margin-top: 10px;
        text-align: center;
    }

    .custom-box {
    display: flex;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* กำหนดการเงา */
    filter: brightness(110%); /* ปรับความสว่างของเงา */
}



</style>