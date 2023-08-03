@props(['message' => null])
<div
    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
</div>
<time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $message->time }}</time>
<h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $message->fullname }}</h3>
<p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $message->msg }}</p>
@if ($message->filename)
    <a href="" wire:click.prevent="downloadFile('{{ $message->filename }}')"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-pink-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Download
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-download">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
        </svg>
    </a>
@endif
