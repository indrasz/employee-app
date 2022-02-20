<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeIndex extends Component
{
    public $employees, $name, $position, $address, $gender, $status, $employees_id;
    protected $listeners = ['delete'];
    public $isModalOpen = 0;

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
        $this->email = '';
        $this->position = '';
        $this->address = '';
        $this->gender = '';
        $this->status = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);
    
        Employee::updateOrCreate(['id' => $this->employees_id], [
            'name' => $this->name,
            'email' => $this->email,
            'position' => $this->position,
            'address' => $this->address,
            'gender' => $this->gender,
            'status' => $this->status,
        ]);

         
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => $this->employees_id ? 'Employee Updated Successfully!' : 'Employee Created Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]);
        
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->employees_id = $id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->position = $employee->position;
        $this->address = $employee->address;
        $this->gender = $employee->gender;
        $this->status = $employee->status;
    
        $this->openModalPopover();
    }

    public function alertConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',  
                'message' => 'Are you sure?', 
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'id' => $id,
        ]);
    }
    
    public function delete($id)
    {
        Employee::find($id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Employee Delete Successfully!', 
            'text' => 'It will not list on users table soon.'
        ]); 
        
    }

}
