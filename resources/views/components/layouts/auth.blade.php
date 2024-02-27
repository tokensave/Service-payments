<x-layouts.base>
    <div class="flex min-h-screen bg-gray-50 flex-col  justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">

            <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                {{ $title }}
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            {{ $slot }}

            <div class="pt-4 text-center text-sm text-gray-500">
                {{ $crosslink }}
            </div>

        </div>
    </div>

</x-layouts.base>
