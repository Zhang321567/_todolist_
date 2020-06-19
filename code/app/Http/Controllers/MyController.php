<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\homepage;
use App\Todolist;
use App\Friend;


class MyController extends Controller
{
    public function login(){
        //跳转到login界面
        return view('login');
    }

    public function loginCheck(Request $request)
    {
        //检查登录是否正确
        $name = $request->get('name');
        $password = $request->get('password');
        $email = $request->get('email');
        $users = User::all();  //引入user数据库model
        //$flag = false;
        foreach ($users as $user) {  //判断输入姓名，密码，邮箱是否与数据库中的匹配
            if ($user->name == $name && $user->password == $password && $user->email == $email) {
                session::put('name', $name);//将name存入变量
                return redirect('/loginSuccess');//如果成功进入loginSuccess
            } else {
                print ("登陆失败");
                print ("<a href='login'>重新登陆</a>!");//登陆失败跳转到login界面
            }
        }
    }

    public function loginRegister(){
        return view('loginRegister');//登陆界面
    }
    public function add(Request $request){
        $var = User::create([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'email' => $request->get('email')
        ]);
        if ($var){
            return redirect('/login');
        }else{
            dump("aaa");
        }

    }
    public function loginSuccess(Request $request){
        $name = Session::get('name');
        $data = DB::table('homepage')->where('name',$name)->orWhere('share','like','%'.$name.'%')->paginate(100);
        return view('homepage',compact('data'));
    }
    public function insert(){
        $name = Session::get('name');
        $friends = DB::table('friend')->where('name', $name)->paginate(100);
        return view('insert', compact('friends'));
    }


    public function insert_homepage(Request $request){
        $name = Session::get('name');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        $result = homepage::create(['name'=>$name,'work' => $work, 'status' => $status, 'share' => $share.' ']);
        if ($result){
            //添加成功
            return redirect("/loginSuccess");
        }else{
            //添加失败
            print ("添加失败,请");
            print ("<a href='insert'>重新添加</a>！");
        }
    }

    public function out(){
        return redirect('login');
    }
    public function update_homepage(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        $data = homepage::find($id);
        return view('update_homepage',compact('data'));
    }

    public function update_homepage_op(Request $request){
        $id = Session::get('id');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        homepage::where('id', $id) -> update(['work' => $work, 'status' => $status, 'share' => $share.' ']);
        return redirect("/loginSuccess");
    }

    public function delete_homepage(Request $request){
        $id = $request->get('id');
        $result = homepage::where('id', $id)->delete();
        if ($result){
            return redirect("/loginSuccess");
        }else{
            print ("删除失败,请");
            print ("<a href='loginSuccess'>重新删除</a>！");
        }
    }

    public function accept(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');

        //创建用户
        $var = homepage::find($id);
        $share = $var->share;

        if (strpos($share,$name.'已接受 ') !== false){

        }elseif (strpos($share,$name.'未接受 ') !== false){
            $str = str_replace($name.'未接受 ', $name.'已接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'进行中','share'=>$str]);
        }else{
            $str = str_replace($name, $name.'已接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'进行中','share'=>$str]);
        }
        return redirect("/loginSuccess");
    }
    public function un_accept(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');

        //创建用户
        $var = homepage::find($id);
        $share = $var->share;

        if (strpos($share,$name.'未接受 ') !== false){

        }elseif (strpos($share,$name.'已接受 ') !== false){
            $str = str_replace($name.'已接受 ', $name.'未接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }else{
            $str = str_replace($name, $name.'未接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }
        return redirect("/loginSuccess");
    }
    public function todo(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        return redirect('todolist');
    }

    public function todolist(Request $request){
        $id = Session::get('id');
        $name = Session::get('name');
        if (Session::has('进行中')){
            $data = DB::table('todolist')->where('homeid',$id)->where('status','进行中')->paginate(100);
            Session::forget('进行中');
        }elseif (Session::has('已完成')){
            $data = DB::table('todolist')->where('homeid',$id)->where('status','已完成')->paginate(100);
            Session::forget('已完成');
        }else{
            $data = DB::table('todolist')->where('homeid',$id)->paginate(100);
        }
        $friend = DB::table('friend')->where('name', $name)->get();

        $s_name = $request->get('name');
        $s_email = $request->get('email');
        if ($s_name || $s_email){
            Session::put('s_name',$s_name);
            Session::put('s_email',$s_email);
            if (!$s_email){
                $s_email = '';
            }
            if (!$s_name){
                $s_name = '12@qq.com';
            }
            $user = DB::table('user')->where('name', 'like', '%' . $s_name . '%')->orwhere('email', 'like', '%' . $s_email . '%')->get();
            return view('todolist',compact('data','friend','user'));
        }else {
            $user = false;
            return view('todolist', compact('data', 'friend','user'));
        }
    }

    public function add_list(){
        return view('add_list');
    }

    public function add_list_op(Request $request){
        $id = Session::get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        $result = Todolist::create(['item' => $item, 'status' => $status, 'homeid' => $id]);
        if ($result){
            return redirect('todolist');
        }else{
            print ("添加失败,请");
            print ("<a href='add_list'>重新添加</a>！");
        }
    }

    public function listall(){
        return redirect('todolist');
    }

    public function ing(){
        Session::put('进行中','进行中');
        return redirect('todolist');
    }
    public function listend(){
        Session::put('已完成','已完成');
        return redirect('todolist');
    }
    public function dellistend(){
        Todolist::where('status','已完成')->delete();
        return redirect('todolist');
    }

    public function update_list(Request $request){
        $id = $request->get('id');
        $data = Todolist::find($id);
        return view('update_list',compact('data'));

    }
    public function update_list_op(Request $request){
        $id = $request->get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        Todolist::where('id',$id)->update(['item'=>$item,'status'=>$status]);
        return redirect('todolist');
    }

    public function delete_list(Request $request){
        $id = $request->input('uid');
        Todolist::where('id',$id)->delete();
        return redirect('todolist');
    }
    public function add_friend(Request $request){
        $name = Session::get('name');
        $friend = $request->get('friend');
        Friend::create(['name'=>$name,'friend'=>$friend]);
        return redirect('todolist');
    }

    public function delete_friend(Request $request){
        $id = $request->get('id');
        Friend::where('id',$id)->delete();
        return redirect('todolist');
    }
}
