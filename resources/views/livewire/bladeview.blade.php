<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <h2> from livewire view </h2>
    <div>
    --------------------------------
    </div>
    <h1>List of todo from database</h1>

    <input type="text" wire:model.lazy="message">
    <h3>Search</h3>
    <button wire:click="navigateToCreatePage">create new item</button>

    <div>
        <div>-----------------</div>
        <h2>result</h2>
        @foreach($datalist as $dataitem)
            <div style="display: flex; align-items: center;">
                <h3 style="margin-right: 10px;"> {{ $dataitem->name }}</h3>

                <button wire:click="delete({{ $dataitem->id }})">Delete</button>
            </div>


        @endforeach

    </div>

</div>
