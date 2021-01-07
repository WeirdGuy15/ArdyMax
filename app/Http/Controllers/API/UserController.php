<?php
 
    namespace App\Http\Controllers\API;
 
    use Illuminate\Support\Str;
    use Hash;
    use DB;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Model\Devisi;
    use Illuminate\Support\Facades\Auth;
    use Validator;
 
    class UserController extends Controller
    {
 
        public $successStatus = 200;
 
        public function login(){
            if(Auth::attempt(['id_user' => request('id_user'), 'password' => request('password')])){
                $user = Auth::user();
                $success['token'] =  $user->createToken('nApp')->accessToken;
                return response()->json(['success' => $success], $this->successStatus);
            }
            else{
                return response()->json(['error'=>'Unauthorised'], 401);
            }
        }
 
        public function register(Request $request)
        {
            $users = new \App\User;
            $users->level=$request->level;
            $users->name=$request ->name;
            $users->no_telp=$request ->no_telp;
            $users->id_user=$request->id_user;
            $users->alamat=$request->alamat;
            if ($request->hasFile('gambar')) {
                $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
                $users->gambar = $request->file('gambar')->getClientOriginalName();
            }
            $users->password=bcrypt ($request->input('password'));
            $users->remember_token= Str::random(8);
            $users->api_token = Str::random(100);
            $users->save();
            $success['token'] =  $users->createToken('nApp')->accessToken;
            $success['name'] =  $users->name;
 
            return response()->json(['success'=>$success], $this->successStatus);
        }
 
        public function details()
        {
            $user = Auth::user();
            return response()->json(['success' => $user], $this->successStatus);
        }
        
        public function getlevel()
        {
            $devisi= \App\Devisi::all();
            return response()->json(['levelVendor' => $devisi]);
        }
        
        public function viewuser()
        {
            $users=\App\User::all();
            return response()->json($users);
        }
        
        public function lihatuserperid($id)
    {
        $users= \App\User::find($id);
        return response()->json($users);
    }
        
        
        public function viewedit($id)
        {
            $users= \App\User::find($id);
            $data = \App\Devisi::all();
            return response()->json($users);
        }

        public function update(Request $request,$id)
        {
            $users= \App\User::find($id);
            $users->update($request->all());
            
            if ($request->password != '' && $request->password != null) {
            DB::table('users')->where('id', $request->id)->update(['password' => bcrypt($request->password)]);
            }
            
            return response()->json($users);
        }
      
        public function delete($id)
        {
            $users= \App\User::find($id);
            $users->delete($users);
            return response()->json(['TERHAPUS' =>$users], $this->successStatus);
        }
    }