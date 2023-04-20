<?php

namespace Controller;
use Illuminate\Database\Capsule\Manager as DB;
use Model\Compound;
use Model\pol;
use Model\Subdivision;
use Model\Position;
use Model\TypeS;
use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Model\Employees;
use Src\Auth\Auth;
use Src\Validator\Validator;
class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            return new View('site.signup', ['message' => 'Вы успешно зарегистрированы']);
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        } //Если удалось аутентифицировать пользователя, то редирект
        else if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        } else {
            //Если аутентификация не удалась, то сообщение об ошибке
            return new View('site.login', ['message' => 'Неправильные логин или пароль']);
        }

    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
//
//    public function add_personal(Request $request): string
//    {
//        $subdivision = Subdivision::all();
//        $position = Position::all();
//        $compound = Compound::all();
//        $pols = pol::all();
//        //Если просто обращение к странице, то отобразить форму
//        if ($request->method === 'POST' && Employees::create($request->all())) {
//            app()->route->redirect('/proverka');
//        }
//
//        return new View('site.add_personal', ['subdivision' => $subdivision, 'position' => $position, 'compound' => $compound, 'pols' => $pols]);
//
//
//    }

//    public function proverka(Request $request): string
//    {
//        $employees = Employees::all();
//        $emplo = DB::table('employees')
//            ->join('pol', 'employees.polID', '=', 'pol.polID')
//            ->join('position', 'employees.ДолжностьID', '=', 'position.ДолжностьID')
//            ->join('Compound', 'position.СоставID', '=', 'Compound.СоставID')
//            ->join('Subdivision', 'employees.ПодразделениеID', '=', 'Subdivision.ПодразделениеID')
//            ->select('employees.*', 'pol.*', 'position.*', 'Compound.*', 'Subdivision.*')
//            ->get();
//
//        $agevivod = DB::table('employees')
//            ->avg('age');
//        return new View('site.proverka', ['employees' => $employees, 'agevivod' => $agevivod, 'emplo' => $emplo]);
//
//
//    }
//
//    public function search(Request $request)
//    {
//        $employees = Employees::all();
//        $subdivision = Subdivision::all();
//        $compound = Compound::all();
//        $search1 = $request->all();
//        if (isset($search1['search1'])) {
//            $cartons = DB::table('employees')
//                ->join('position', 'employees.ДолжностьID', '=', 'position.ДолжностьID')
//                ->join('Compound', 'position.СоставID', '=', 'Compound.СоставID')
//                ->join('Subdivision', 'employees.ПодразделениеID', '=', 'Subdivision.ПодразделениеID')
//                ->where('Compound.НазваниеСостава', $search1['search1'])
//                ->get();
//        }
//        return (new View())->render('site.search', ['compound' => $compound, 'subdivision' => $subdivision, 'employees' => $employees, 'cartons' => $cartons]);
//    }
//
    public function proverka(Request $request): string
    {

        return new View('site.proverka');
    }
//
//    public function search1(Request $request)
//    {
//        $employees = Employees::all();
//        $subdivision = Subdivision::all();
//        $compound = Compound::all();
//        $search2 = $request->all();
//        if (isset($search2['search2'])) {
//            $cartons = DB::table('employees')
//                ->join('position', 'employees.ДолжностьID', '=', 'position.ДолжностьID')
//                ->join('Compound', 'position.СоставID', '=', 'Compound.СоставID')
//                ->join('Subdivision', 'employees.ПодразделениеID', '=', 'Subdivision.ПодразделениеID')
//                ->where('Subdivision.Подразделение', $search2['search2'])
//                ->get();
//        }
//        return (new View())->render('site.search1', ['compound' => $compound, 'subdivision' => $subdivision, 'employees' => $employees, 'cartons' => $cartons]);
//    }


}