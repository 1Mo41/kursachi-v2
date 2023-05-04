<?php

namespace Controller;
use Illuminate\Database\Capsule\Manager as DB;

use Model\Reviews;
use Model\Menu;
use Src\View;
use Src\Request;
use Model\User;
use Model\Typedish;
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

    public function proverka(Request $request): string
    {
        $menu = Menu::all();
//        $emplos = DB::table('menu')
//            ->join('typedish','menu.typeDishId','=','typedish.typeDishId')
//            ->select('menu.*','typedish.*')
//            ->get();
        return new View('site.proverka',['menu'=>$menu]);
    }

    public function hello(): string
    {
        $typeDish = Typedish::all();
        return new View('site.hello',['typeDish'=>$typeDish]);
    }

    public function add_menu(Request $request): string
    {
        $typeDish = Typedish::all();
        if ($request->method === 'POST' && Menu::create($request->all())) {
            app()->route->redirect('/proverka');
        }
        return new View('site.add_menu',['typeDish' => $typeDish]);
    }
    public function  add_reviews(Request $request): string{
        if ($request->method === 'POST' && Reviews::create($request->all())) {
            app()->route->redirect('/reviews');
        }
        return new View('site.add_reviews');
    }

    public  function reviews(): string{
        $reviews = Reviews::all();

        return new View('site.reviews',['reviews'=>$reviews]);
    }
    public  function  search(Request $request): string{
        $typeDish = Typedish::all();
        $menu = Menu::all();

            $search1 = $request->all();
            if (isset($search1['search1'])) {
                $cartons = DB::table('menu')
                    ->join('typedish','menu.typeDishId','=','typedish.typeDishId')
                    ->where('typedish.name', $search1['search1'])
                    ->get();
            }
            return (new View())->render('site.search', ['cartons' => $cartons,'menu'=>$menu,'typeDish'=>$typeDish]);
        }


}