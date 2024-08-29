@extends('layout')
@section('content')
    <div class="flex justify-center items-start py-10 w-full  min-h-[calc(100vh-80px)]">
        <div class="max-w-xl w-full px-10 py-10 mx-auto  drop-shadow-xl shadow-xl border ">
            @if ($errors->any())
                <div class="alert alert-error bg-red-200 py-2 px-4 rounded-md">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <h2 class="inline-block text-center text-xl font-semibold text-slate-700">Create Nasabah Baru</h2>
            <form action="{{route('saved.nasabah')}}" class="flex gap-3 flex-col ">
                @csrf
                <label class="flex flex-col gap-2 justify-center">
                    <span>Name</span>
                    <input type="text" name="name" id="nameInput" placeholder="Enter your name" />
                    <div class="text-red-500 text-xs" id="error-message"></div>
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Tempat Lahir</span>
                    <input type="text" id="nameInput" name="place_of_birth" placeholder="Enter Place of Birth" />
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Tanggal Lahir</span>
                    <input type="date" id="nameInput" name="date_of_birth" placeholder="Enter your date of birth" />
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Jenis Kelamin</span>
                    <select name="gender" id="">
                        <option value="l">Laki - Laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Pekerjaan</span>
                    <select name="occuption" id="">
                        <option value="" selected disabled class="text-gray-200">Select pekerjaan</option>
                        @foreach ($getOccuption as $pekerjaan)
                            <option value="{{$pekerjaan->id}}" class="text-gray-200">{{$pekerjaan->title}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Alamat</span>
                    <div class="w-full grid grid-cols-2 items-center gap-2">
                        <select name="province" id="province">
                            <option value="" selected disabled class="text-gray-200">Select provinsi</option>
                            @foreach ($getProvinces as $province)
                                <option value="{{$province->id}}" class="text-gray-200">{{$province->name}}</option>
                            @endforeach
                        
                        </select>
                        <select name="city" id="city">
                            <option value="" selected disabled class="text-gray-200">Select kota</option>
                        </select>
                        <select name="subdistrict" id="subdistrict">
                            <option value="" selected disabled class="text-gray-200">Select kecamatan</option>
                        </select>
                        <select name="vilage" id="vilage">
                            <option value="" selected disabled class="text-gray-200">Select kelurahan</option>
                        </select>
                    </div>
                    <textarea name="detail_address" id="" cols="30" rows="10" placeholder="Enter your address"></textarea>
                </label>
                <label class="flex flex-col gap-2 justify-center">
                    <span>Nominal Setor</span>
                    <input type="number" name="nominal_store">
                </label>
                <div class=" w-full grid grid-cols-2 gap-5 mt-5">
                    <a href="{{route('cs.home')}}" class="px-4 flex justify-center py-1.5 bg-red-500 text-white text-sm font-semibold rounded-md" type="button">Keluar Form</a>
                    <button class="px-4 py-1.5 bg-blue-500 text-white text-sm font-semibold rounded-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#nameInput").on("keyup", function () {
                const input = this.value;
                const regex = /^[a-zA-Z\s]+$/; // Allows letters and spaces only
                const prohibitedWords = ["profesor", "haji", "drs", "prof"]; // Add any other words to this array
            
                const hasProhibitedWords = prohibitedWords.some((word) =>
                    input.toLowerCase().includes(word)
                );
        
                if (!regex.test(input) || hasProhibitedWords) {
                    $("#error-message").text("Input tidak boleh mengandung angka, simbol, atau gelar tertentu seperti Profesor dan Haji.")
                        
                } else {
                    $("#error-message").text("")
                    
                }
            });

            $("#province").on("change", function () {
                const provinceId = $(this).val();
                $.ajax({
                    url: "/city/" + provinceId,
                    method: "GET",
                    success: function (response) {
                        console.log(response);
                        const city = $("#city");
                        city.empty();
                        city.append("<option value='' selected disabled class='text-gray-200'>Select kota</option>");
                        response.forEach(function (item) {
                            city.append("<option value='" + item.id + "' class='text-gray-200'>" + item.name + "</option>");
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    },
                });
            })

            $("#city").on("change", function () {
                const cityId = $(this).val();
                $.ajax({
                    url: "/district/" + cityId,
                    method: "GET",
                    success: function (response) {
                        console.log(response);
                        const city = $("#subdistrict");
                        city.empty();
                        city.append("<option value='' selected disabled class='text-gray-200'>Select kecamatan</option>");
                        response.forEach(function (item) {
                            city.append("<option value='" + item.id + "' class='text-gray-200'>" + item.name + "</option>");
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    },
                });
            })

            $("#subdistrict").on("change", function () {
                const districtId = $(this).val();
                $.ajax({
                    url: "/village/" + districtId,
                    method: "GET",
                    success: function (response) {
                        console.log(response);
                        const city = $("#vilage");
                        city.empty();
                        city.append("<option value='' selected disabled class='text-gray-200'>Select kelurahan</option>");
                        response.forEach(function (item) {
                            city.append("<option value='" + item.id + "' class='text-gray-200'>" + item.name + "</option>");
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    },
                });
            })
            
        })
    </script>
@endsection
