<?php

namespace App\Http\Controllers;

use App\Services\Results\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{

    /**
     * @var ResultService
     */
    private $resultService;

    public function __construct(
        ResultService $resultService
    )
    {
        $this->resultService = $resultService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testsResults = $this->resultService->searchResults([], 'test_id');

        return view('results.index', compact('testsResults'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $this->resultService->createResultThroughUser($data);

        return redirect()->route('results.show', $data['test_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $testId
     * @return \Illuminate\Http\Response
     */
    public function show(int $testId)
    {
        $testResults = $this->resultService
                            ->getTestResultsForCurrentUser($testId);

        return view('results.item', compact('testResults'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->resultService->deleteResult($id);
    }
}
