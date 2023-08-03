@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <!-- Main modal -->
    {{--
    <div id="modal"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal transform transition-all">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md transform transition-all"> --}}
    <!-- Modal body -->
    {{-- <div class="relative w-full max-w-md max-h-full p-4"> --}}
    <!-- Modal content -->
    <div class="relative w-full max-h-full bg-white dark:bg-gray-700">
        <button type="button" wire:click="$set('showForm', false)"
            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="large-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <!-- Modal header -->
        <div class="px-6 py-4 border-b rounded-t dark:border-gray-600 w-full">
            <h3 class="text-base font-bold text-gray-900 lg:text-xl dark:text-white">
                Tribute
            </h3>
        </div>
        <!-- Modal body -->
        <div class="p-4">
            <p class="text-md text-justify font-normal text-gray-500 dark:text-gray-400 mb-6">
                Share your condolences, tributes and memories of Cecilia. Whether you choose to
                write a life chapter or would simply like to say a few words - we encourage you to share your
                memories here.
            </p>

            <x-input.group wire:model.lazy="editing.fullname" type="phone" :error="$errors->first('editing.fullname')" placeholder="Ama"
                id="fullname" label="FullName" />

            <x-input.group type="phone" wire:model.lazy="editing.phone" :error="$errors->first('editing.phone')" placeholder="0201234567"
                id="phone" label="Phone" />

            <x-input.file wire:model="fileUpload" target="fileUpload" :error="$errors->first('fileUpload')" label="Select File"
                type="file">
                @if ($this->fileUpload)
                    <img class="object-cover w-full h-full rounded-md" src="{{ $this->fileUpload->temporaryUrl() }}"
                        alt="" />
                @else
                    <div class="bg-gray-100 rounded-md dark:bg-gray-700">
                        <p>Test</p>
                    </div>
                @endif
            </x-input.file>

            <div>
                <p
                    class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                    <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Upload a file or Enter you message below.
                </p>
            </div>
            <x-input.textarea wire:model.lazy="editing.message" id="award-entry" label="Message" :error="$errors->first('editing.message')" />
        </div>
    </div>
    {{-- </div> --}}

    <!-- Modal footer -->
    <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
        <button
            class="flex text-white bg-pink-700 space-x-2 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
            wire:click="save">
            <span >Save</span>
            <span class="absolute" wire:loading wire:target="save">
                <x-icon.tail-spin class="w-6 h-6" fill="currentColor" aria-hidden="true" /></span>
        </button>
        <button
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
            wire:click="$set('showForm', false)">Cancel</button>
    </div>
    {{-- </div>
    </div> --}}
</x-modal>
