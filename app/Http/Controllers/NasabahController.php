<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\DetailAddress;
use App\Models\Nasabah;
use App\Models\Occuption;
use App\Models\Provinces;
use App\Models\SubDistrict;
use App\Models\Vilage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NasabahController extends Controller
{
    public function cs_dashboard()
    {
        return view('cs.dashboard');
    }

    public function supervisor_dashboard()
    {
        return view('supervisor.dashboard');
    }

    public function getData()
    {
        $nasabahs = Nasabah::select(['id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pekerjaan_id', 'alamat_id', 'nominal_setor', 'status'])->where('cabang_id', \Auth::user()->cabang_id);

        return DataTables::of($nasabahs)
        ->addColumn('action', function ($nasabah) {
            return $nasabah->id;
        })
        ->editColumn('nominal_setor', function ($nasabah) {
            return number_format($nasabah->nominal_setor);
        })
        ->editColumn('pekerjaan_id', function ($nasabah) {
            $occuption = Occuption::where('id', $nasabah->pekerjaan_id)->first();

            return $occuption->title;
        })
        ->editColumn('alamat_id', function ($nasabah) {
            $detailAddress = DetailAddress::where('id', $nasabah->alamat_id)->first();
            $getProvinces = Provinces::where('id', $detailAddress->province_id)->first();
            $getCity = Cities::where('id', $detailAddress->city_id)->first();
            $getSubDistrict = SubDistrict::where('id', $detailAddress->sub_district_id)->first();
            $getVillage = Vilage::where('id', $detailAddress->vilage_id)->first();

            return $detailAddress->name.' ,desa '.$getVillage->name.', kecamatan '.$getSubDistrict->name.', kabupaten '.$getCity->name.', provinsi '.$getProvinces->name;
        })
        ->make(true);
    }

    public function create()
    {
        $getOccuption = Occuption::all();
        $getProvinces = Provinces::all();

        return view('cs.nasabah.create')->with(compact('getOccuption', 'getProvinces'));
    }

    public function getCity(Request $request, $id)
    {
        $getCity = Cities::where('province_id', $id)->get();

        return response()->json($getCity);
    }

    public function getDistrict(Request $request, $id)
    {
        $getCity = SubDistrict::where('city_id', $id)->get();

        return response()->json($getCity);
    }

    public function getVillage(Request $request, $id)
    {
        $getCity = Vilage::where('sub_district_id', $id)->get();

        return response()->json($getCity);
    }

    public function store(Request $request)
    {
        try {
            $detailAddress = DetailAddress::create([
                'province_id' => $request->province,
                'city_id' => $request->city,
                'sub_district_id' => $request->subdistrict,
                'vilage_id' => $request->vilage,
                'name' => $request->detail_address,
            ]);

            $store = Nasabah::create([
                'nama' => $request->name,
                'tempat_lahir' => $request->place_of_birth,
                'tanggal_lahir' => $request->date_of_birth,
                'jenis_kelamin' => $request->gender == 'l' ? 'laki-laki' : 'wanita',
                'pekerjaan_id' => $request->occuption,
                'alamat_id' => $detailAddress->id,
                'cabang_id' => \Auth::user()->cabang_id,
                'nominal_setor' => $request->nominal_store,
            ]);

            if ($store) {
                return redirect()->route('cs.home');
            }
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->withErrors([
                    'errors' => 'duplicate names',
                ])->withInput();
            }

            return redirect()->back()->withErrors([
                'errors' => 'error saved data',
            ])->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        $getNasabah = Nasabah::leftJoin('detail_addresses', function ($join) {
            $join->on('nasabahs.alamat_id', '=', 'detail_addresses.id');
        })->where('nasabahs.id', $id)->first([
            'nasabahs.id',
            'nasabahs.nama',
            'nasabahs.tempat_lahir',
            'nasabahs.tanggal_lahir',
            'nasabahs.jenis_kelamin',
            'nasabahs.pekerjaan_id',
            'nasabahs.alamat_id',
            'nasabahs.nominal_setor',
            'nasabahs.status',
            'detail_addresses.name',
            'detail_addresses.province_id',
            'detail_addresses.city_id',
            'detail_addresses.sub_district_id',
            'detail_addresses.vilage_id',
        ]);
        $getOccuption = Occuption::all();
        $getProvinces = Provinces::all();
        $getCities = Cities::where('province_id', $getNasabah->province_id)->get();
        $getSubDistrict = SubDistrict::where('city_id', $getNasabah->city_id)->get();
        $getVillage = Vilage::where('sub_district_id', $getNasabah->sub_district_id)->get();

        return view('cs.nasabah.edit')->with(compact('getNasabah', 'getOccuption', 'getProvinces', 'getCities', 'getSubDistrict', 'getVillage'));
    }

    public function changed(Request $request)
    {
        // check data
        $getIdAddress = Nasabah::findOrFail($request->id);
        $getAddress = DetailAddress::findOrFail($getIdAddress->alamat_id);
        $getAddress->province_id = $request->province;
        $getAddress->city_id = $request->city;
        $getAddress->sub_district_id = $request->subdistrict;
        $getAddress->vilage_id = $request->vilage;
        $getAddress->name = $request->detail_address;
        $getAddress->save();

        $getIdAddress->nama = $request->name;
        $getIdAddress->tempat_lahir = $request->place_of_birth;
        $getIdAddress->tanggal_lahir = $request->date_of_birth;
        $getIdAddress->jenis_kelamin = $request->gender == 'l' ? 'laki-laki' : 'wanita';
        $getIdAddress->pekerjaan_id = $request->occuption;
        $getIdAddress->cabang_id = \Auth::user()->cabang_id;
        $getIdAddress->nominal_setor = $request->nominal_store;
        $getIdAddress->save();

        if ($getIdAddress && $getAddress) {
            return redirect()->route('cs.home');
        }

        return redirect()->back()->withErrors([
            'errors' => 'error edited data.',
        ])->withInput();
    }

    public function destroy($id)
    {
        $delete = Nasabah::findOrFail($id);
        $delete->delete();
        $deleteAddress = DetailAddress::where('id', $delete->alamat_id)->delete();
        if ($delete && $deleteAddress) {
            return redirect()->route('cs.home');
        }

        return redirect()->back()->withErrors([
            'errors' => 'error deleted data',
        ])->withInput();
    }

    public function getDataNasabah()
    {
        $nasabahs = Nasabah::select(['id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pekerjaan_id', 'alamat_id', 'nominal_setor', 'status'])->where('cabang_id', \Auth::user()->cabang_id);

        return DataTables::of($nasabahs)
        ->addColumn('action', function ($nasabah) {
            return $nasabah->id;
        })
        ->editColumn('nominal_setor', function ($nasabah) {
            return number_format($nasabah->nominal_setor);
        })
        ->editColumn('pekerjaan_id', function ($nasabah) {
            $occuption = Occuption::where('id', $nasabah->pekerjaan_id)->first();

            return $occuption->title;
        })
        ->editColumn('alamat_id', function ($nasabah) {
            $detailAddress = DetailAddress::where('id', $nasabah->alamat_id)->first();
            $getProvinces = Provinces::where('id', $detailAddress->province_id)->first();
            $getCity = Cities::where('id', $detailAddress->city_id)->first();
            $getSubDistrict = SubDistrict::where('id', $detailAddress->sub_district_id)->first();
            $getVillage = Vilage::where('id', $detailAddress->vilage_id)->first();

            return $detailAddress->name.' ,desa '.$getVillage->name.', kecamatan '.$getSubDistrict->name.', kabupaten '.$getCity->name.', provinsi '.$getProvinces->name;
        })
        ->make(true);
    }

    public function approved($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->status = 'Disetujui';
        $nasabah->save();

        return redirect()->route('supervisor.home');
    }
}
