<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\returnSelf;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now()->toDateTimeString();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'date', 'after:'.$today],
            'priority' => ['required', 'string'],
            'description' => ['required', 'string', 'min:20'],
        ]);

        $input = $request->all();

        if(!$request->reminder){
            $input['reminder'] = false;
        }else{
            $input['reminder'] = true;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token,
        ])->post(env('API_BASE_URL').'/task-create/'.auth()->user()->id, $input);
      
        if(!$response['status'])
            return redirect()->back()->with('error', 'An error occured, try again later');

        return redirect(route('dashboard'))->with('status', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task =  Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token,
        ])->get(env('API_BASE_URL').'/taskes/'.$id);

        return view('pages.show-task')
            ->with('task', json_decode($task));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task =  Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token,
        ])->get(env('API_BASE_URL').'/taskes/'.$id);

        return view('pages.edit-task')
            ->with('task', json_decode($task));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string'],
            'description' => ['required', 'string', 'min:20'],
        ]);

        $input = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token,
        ])->put(env('API_BASE_URL').'/update-taskes/'.$id, $input);

        if(!$response['status'])
            return redirect()->back()->with('error', 'An error occured, try again later');

        return redirect(route('dashboard'))->with('status', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response =  Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token,
        ])->delete(env('API_BASE_URL').'/delete-taskes/'.$id);

        if(!$response['status'])
            return redirect()->back()->with('error', 'An error occured, try again later');

        return redirect(route('dashboard'))->with('status', 'Task deleted successfully');
    }
}
