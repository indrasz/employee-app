<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeIndex extends Component
{
    public $employees, $name, $position, $address, $gender, $status, $employees_id;
    public $isModalOpen = true;

    public function render()
    {
        $this->employees = Employee::all();
        return view('livewire.employee.employee-index');
    
    }
    
    public function create(){
        
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->position = '';
        $this->address = '';
        $this->gender = '';
        $this->status = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);
    
        Employee::updateOrCreate(['id' => $this->employees_id], [
            'name' => $this->name,
            'position' => $this->position,
            'address' => $this->address,
            'gender' => $this->gender,
            'status' => $this->status,
        ]);

        session()->flash('message', $this->employees_id ? 'Employee updated.' : 'Employee created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->employees_id = $id;
        $this->name = $employee->name;
        $this->position = $employee->position;
        $this->address = $employee->address;
        $this->gender = $employee->gender;
        $this->status = $employee->status;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee deleted.');
    }

}
