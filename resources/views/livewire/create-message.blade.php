<div>
    <div class="sm:.text-center">
        <button type="button" data-modal-target="large-modal" data-modal-toggle="large-modal" wire:click.prevent="showForm()"
            class="mx-auto lg:mx-0 flex bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Leave a Tribute
        </button>
    </div>

    <x-tribute-modal wire:model="showForm"/>
</div>
