<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use PDF;
use App\Http\Requests\EmployeeRequest;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (request()->ajax()) {
            $query = Employee::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="relative inline-block text-left">
                        <div x-data="{ show: false }"  @click.away="show = false" class="mb-2">
                            <button @click="show = ! show" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                            Options
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </button>
                            <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1" role="none">
                                    <a class="text-gray-700 hover:bg-gray-100 block px-4 py-2 text-sm" href="' . route('dashboard.employee.show',  $item->id) . '">Show</a>
                                    <a class="text-gray-700 hover:bg-gray-100 block px-4 py-2 text-sm" href="' . route('dashboard.employee.gallery.create', $item->id) . '">Gallery</a>
                                </div>
                            </div>
                        </div>
  
                    </div>
                    <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                        href="' . route('dashboard.employee.edit',  $item->id) . '">
                        Edit
                    </a>
                    
                    <form class="inline-block" action="' . route('dashboard.employee.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                        ' . method_field('delete') . csrf_field() . '
                    </form>

                    
                
                    ';                   
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        Employee::create($data);
        
       
        return redirect()->route('dashboard.employee.index')->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Employee::findorFail($id);
        return view('pages.employee.show',[
            'item' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('pages.employee.edit',[
            'item' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->all();     
        $employee->update($data);
        return redirect()->route('dashboard.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findorFail($id);
        $employee->delete();
        return redirect()->route('dashboard.employee.index')->with('success', 'Task Deleted Successfully!');
    }
}
