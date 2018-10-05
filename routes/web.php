<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function (\Doctrine\ORM\EntityManagerInterface $em){
    $scientist = new \App\Entities\Scientist("Albert", "Einstein");
    $scientist->addTheory(new \App\Entities\Theory("Relativity theory"));
    $em->persist($scientist);
    $em->flush();
    return "done";
});
Route::get('/find',function (\Doctrine\ORM\EntityManagerInterface $em){
    /** @var \App\Entities\Scientist $scientist */
    $scientist = $em->find(\App\Entities\Scientist::class,1);

    return $scientist->getFirstname()." ".$scientist->getLastname()."'s ".$scientist->getTheories()->first()->getTitle();
});
Route::resource('/scientists',ScientistController::class);