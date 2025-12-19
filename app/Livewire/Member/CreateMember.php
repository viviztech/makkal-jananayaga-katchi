<?php

namespace App\Livewire\Member;


use App\Models\Member; // Your Eloquent Model
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Livewire\Component;



class CreateMember extends Component implements HasForms, HasSchemas
{
    use InteractsWithForms;
    use InteractsWithSchemas;
    
    public ?array $data = [];
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Define your form fields here
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('content')
                    ->required()
                    ->rows(5),
            ])
            ->model(Member::class) // 👈 Associate the form with your Model
            ->statePath('data'); // 👈 Tell Filament to store data in the $data property
    }

    public function mount(): void
    {
        // Must be called on mount to initialize the form
        $this->form->fill();
    }
    
    // Method to handle form submission (e.g., saving the data)
    public function create(): void
    {
        // Validate and retrieve the form's state data
        $data = $this->form->getState();

        // Save the data to the database
        Member::create($data);

        // Optionally, redirect or show a success message
        session()->flash('success', 'Post created successfully!');
        // return redirect()->to('/posts');
    }
    
    public function render(): View
    {
        return view('livewire.create-member');
    }
}