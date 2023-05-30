<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Kampus;
use App\Models\programstudi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;





class Controller extends BaseController
{
    public function dashboardadmin()
    {
        $users = User::all();
        return view('dashboardadmin', compact('users'));
    }

    public function dashboardmahasiswa()
    {
        $users = User::all();
        $mahasiswa = Mahasiswa::all();
        return view('dashboardmahasiswa', compact('users','mahasiswa'));
    }





    public function Home()
    {
        $mahasiswaCount = User::where('usertype', 'mahasiswa')->count();

        $users = User::all();



        return view('Home', compact('mahasiswaCount','users'));
    }


    public function user( )
    {
        $users = User::all();
        return view('user', compact('users'));
    }
    public function detailuser( $id)
    {
        $users = User::findOrFail($id);
        return view('detailuser', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('edit', compact('users'));
    }


public function update(Request $request, $id)
{
    $users = User::findOrFail($id);


    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $users->id,
        'usertype' => 'required|in:admin,mahasiswa',
        'nim' => 'nullable|string',
        'idcard' => 'nullable|string',
        'password' => 'nullable|string|min:6',
    ]);

    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->usertype = $request->input('usertype');
    $users->nim = $request->input('nim');
    $users->idcard = $request->input('idcard');


    if ($request->filled('password')) {
        $users->password = bcrypt($request->input('password'));
    }


    $users->save();


    return redirect()->route('user')->with('success', 'User berhasil diperbarui.');
}
public function deleteuser($id)
{
    $users = User::findOrFail($id);
    $users->delete();

    return redirect()->route('user')->with('success', 'User deleted successfully');
}


public function addUser(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'usertype' => 'required|in:Admin,Mahasiswa',
        'nim' => 'nullable|string',
        'idcard' => 'nullable|string',
        'password' => 'required',
    ]);

    $users = new User;
    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->usertype = $request->input('usertype');
    $users->nim = $request->input('nim');
    $users->idcard = $request->input('idcard');
    $users->password = Hash::make($request->input('password'));

    $users->save();

    return response()->json(['message' => 'User added successfully']);
}

public function tambahuser()
{
    return view('tambahuser');
}




public function detailmahasiswa($id)
{
    $users = User::where('usertype', 'mahasiswa')->findOrFail($id);

    return view('detailmahasiswa', compact('users'));
}

public function mahasiswa()
{
    $users = User::all();

    return view('mahasiswa', compact('users'));
}

public function kampus()
    {
        $kampusList = Kampus::all();
        return view('kampus', compact('kampusList'));
    }

    public function create()
    {
        return view('kampus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'website' => 'required|url',
        ]);

        $kampus = new Kampus();
        $kampus->nama = $request->input('nama');
        $kampus->alamat = $request->input('alamat');
        $kampus->telepon = $request->input('telepon');
        $kampus->website = $request->input('website');
        $kampus->save();

        $kampusList = Kampus::all();

        return response()->json([
            'message' => 'Data kampus berhasil ditambahkan.',
            'kampus' => $kampus,
        ]);
    }


    public function detailkampus()
{
    $kampusList = Kampus::all();

    return view('detailkampus', compact('kampusList'));
}

    public function editkampus($id)
    {
        $kampusList = Kampus::findOrFail($id);
        return view('editkampus', compact('kampusList'));
    }

    public function updatekampus(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' =>'required',
            'website'=> 'required'
        ]);

        $kampusList = Kampus::findOrFail($id);
        $kampusList->update($request->all());

        return redirect()->route('kampus')->with('success', 'Data kampus berhasil diperbarui.');
    }

    public function destroykampus($id)
    {
        $kampusList = Kampus::findOrFail($id);
        $kampusList->delete();

        return redirect()->route('kampus')->with('success', 'Data kampus berhasil dihapus.');
    }




    public function programstudi()
    {
        $programstudi = ProgramStudi::all();
        return view('programstudi', compact('programstudi'));
    }

    public function editprogramstudi($id)
    {
        $programstudi = ProgramStudi::findOrFail($id);
        return view('editprogramstudi', compact('programstudi'));
    }

    public function updateprogramstudi(Request $request, $id)
    {
        $request->validate([
            'programstudi' => 'required'
        ]);

        $programstudi = ProgramStudi::findOrFail($id);
        $programstudi->programstudi = $request->input('programstudi');
        $programstudi->fakultas = $request->input('fakultas');

        $programstudi->save();

        return redirect()->route('programstudi')->with('success', 'Data program studi berhasil diperbarui.');
    }

    public function storeprogramStudi(Request $request)
    {
        $request->validate([
            'programstudi' => 'required',
            'fakultas' => 'required'
        ]);

        $programstudi = new ProgramStudi();
        $programstudi->programstudi = $request->input('programstudi');
        $programstudi->fakultas = $request->input('fakultas');
        $programstudi->save();

        $programStudi = ProgramStudi::all();

        return response()->json([
            'message' => 'Data program studi berhasil ditambahkan.',
            'programstudi' => $programStudi,
        ]);
    }

    public function destroyprogramstudi($id)
    {
        $programstudi = ProgramStudi::findOrFail($id);
        $programstudi->delete();

        return redirect()->route('programstudi')->with('success', 'Data program studi berhasil dihapus.');
    }

    public function formmahasiswa()
    {
        $users =user::all();
        $programstudi = ProgramStudi::all();
        $kampusList = Kampus::all();

        return view('formmahasiswa',compact('users','kampusList','programstudi'));
    }

    public function uploadformmahasiswa(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $jeniskelamin = $request->input('jeniskelamin');
        $tanggal = $request->input('tanggal');
        $agama = $request->input('agama');
        $alamat = $request->input('alamat');
        $pendidikan = $request->input('pendidikan');
        $kampus = $request->input('kampus');
        $programStudi = $request->input('programstudi');




        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp');

        }

        if ($request->hasFile('ijazah')) {
            $ijazahFile = $request->file('ijazah');

        }


        $mahasiswa = new mahasiswa;
        $mahasiswa->name = $name;
        $mahasiswa->email = $email;
        $mahasiswa->jeniskelamin = $jeniskelamin;
        $mahasiswa->tanggal = $tanggal;
        $mahasiswa->agama = $agama;
        $mahasiswa->alamat = $alamat;
        $mahasiswa->pendidikan = $pendidikan;
        $mahasiswa->kampus = $kampus;
        $mahasiswa->programstudi = $programStudi;


        $mahasiswa->save();


        return response()->json(['message' => 'Upload berhasil']);
    }

}
