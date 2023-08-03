<div>
    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Tributes
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <ol class="relative border-l border-gray-200 dark:border-gray-700 mx-6">
                @forelse ($messages as $message)
                    <li class="mb-10 ml-4">
                        <x-timeline :message="$message" />
                    </li>
                @empty
                    <div class="text-center p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">No Tributes yet....</h3>
                    </div>
                @endforelse
            </ol>
        </div>
    </section>
</div>
