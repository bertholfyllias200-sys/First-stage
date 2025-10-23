<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class VendeurCrud extends Component
{
    public $name, $email, $password;
    public $vendeurId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.vendeur-crud', [
            'vendeurs' => User::where('role', 'vendeur')->latest()->get(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->vendeurId,
            'password' => $this->isEdit ? 'nullable' : 'required|min:6',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'vendeur',
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(['id' => $this->vendeurId], $data);

        $this->resetForm();
    }

    public function edit($id)
    {
        $vendeur = User::findOrFail($id);
        $this->vendeurId = $vendeur->id;
        $this->name = $vendeur->name;
        $this->email = $vendeur->email;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'vendeurId', 'isEdit']);
    }
}
