<div>
    <button type="button" data-modal-target="large-modal" data-modal-toggle="large-modal" @click="openModal('modal')"
        class="mx-auto lg:mx-0 flex bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        <svg aria-hidden="true" class="w-4 h-4 mr-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
            </path>
        </svg>
        Leave a Tribute
    </button>

    <x-tribute-modal />
</div>
