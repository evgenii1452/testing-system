<?php

namespace App\Http\Controllers;

use App\Services\Tests\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var TestService
     */
    private $testService;

    /**
     * TestController constructor.
     * @param TestService $testService
     */
    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = $this->testService->searchTests();

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->testService->createWithRelations($request->input());

        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = $this->testService->getTestWithRelations($id);

        return view('tests.item', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = $this->testService->getTestWithRelations($id);
        $questions = $test->questions;

        return view('tests.edit', compact(['test', 'questions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $test = $this->testService
                     ->updateWithRelations($id, $data);

        return redirect()->route('tests.edit', $test);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->testService->deleteWithRelations($id);

        return redirect()->route('tests.index');
    }
}
