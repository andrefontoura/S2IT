<?php

namespace S2Test\Http\Controllers;

use S2Test\Home;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use S2Test\Entities\People;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.form_xml');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function upload(Request $request,EntityManagerInterface $em)
    {
        if ($request->hasFile('xml_upload')) {

            try {
                $path = $request->xml_upload->path();
                $data = file_get_contents($path);
                $xml = simplexml_load_string($data);
            } catch (\Exception $e) {
                session()->flash('error',$e->getMessage());
                return back();
            }
            
            //dd($xml);
            //Está longe de ser a melhor ideia, maaaas...
            //Na velocidade pra acrescentar mais das tarefas desejadas
            //como o docker e outras coisas eu optei por deixar feio
            //mas funcional :D
            //Quero tentar cumprir todos os requisitos, então ai vai
            if ($xml->person)
            {
                //dd($xml->person);

                foreach($xml->person as $person)
                {
                    //dd ($person);
                    try {
                        $people = new People(
                            $person->personid,
                            $person->personname,
                            $person->person_id
                        );
                
                        $em->persist($people);
                        $em->flush();
                    } catch (\Exception $e) {
                        session()->flash('error',$e->getMessage());
                        return back();
                    }
                }
            }

            if ($xml->shiporder)
            {
                //dd($xml->shiporder);
            }
        }

        dd('not show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \S2Test\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \S2Test\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \S2Test\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \S2Test\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
