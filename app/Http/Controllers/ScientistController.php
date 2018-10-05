<?php

namespace App\Http\Controllers;

use App\Entities\Scientist;
use App\Entities\ScientistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScientistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param EntityManagerInterface $em
     * @return ArrayCollection
     */
    public function index(EntityManagerInterface $em)
    {
        /** @var ArrayCollection $scientists */
        $scientists = $em->getRepository(Scientist::class)->findAll();
        return view('index', [
            'scientists' => $scientists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function store(Request $request, EntityManagerInterface $em)
    {
        $scientist = new Scientist($request->get('firstname'),$request->get('lastname'));
        $em->persist($scientist);
        $em->flush();
        return redirect()->route('scientists.index')->with('success_message', 'Scientist added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param EntityManagerInterface $em
     * @return \Illuminate\Http\Response
     */
    public function show($id, EntityManagerInterface $em)
    {
        $scientist = $em->find(Scientist::class,$id);
        return view('add',compact($scientist));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param EntityManagerInterface $em
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, EntityManagerInterface $em)
    {
        $scientist = $em->getRepository(Scientist::class)->find($id);

        $em->remove($scientist);
        $em->flush();

        return redirect('/scientists')->with('success_message', 'Scientist successfully removed.');
    }
}
