<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <p class="text-sm font-medium uppercase tracking-wide text-sky-600">
                    {{ __('site.management') }}</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">{{ trans('site.all_posts') }}</h1>
            </div>
            @can('articles.create')
                <a href="{{ route('posts.create') }}"
                    class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                    {{ __('site.add_post') }}
                </a>
            @endcan

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm mb-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('site.id') }}</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('site.title') }}</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('site.img') }}</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('site.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 bg-white">
                                    @php
                                        $count = ((request()->page ?? 1) - 1) * 20 + 1;
                                    @endphp
                                    @forelse ($posts as $post)
                                        <tr class="transition hover:bg-slate-50">
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-700">
                                                {{-- {{ $loop->iteration }} --}}
                                                {{-- {{ $post->id }} --}}
                                                {{ $count }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                                {{ $post->trans_title }}</td>
                                            <td class="px-6 py-4">
                                                <img src="{{ $post->image ? asset($post->image) : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg' }}"
                                                    alt="{{ $post->trans_title }}"
                                                    class="h-14 w-20 rounded-md object-cover ring-1 ring-slate-200">
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="flex justify-end gap-2">
                                                    @can('articles.view')
                                                        <a href="{{ route('posts.show', $post->id) }}"
                                                            class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                                                            View
                                                        </a>
                                                    @endcan

                                                    @can('articles.edit')
                                                        <a href="{{ route('posts.edit', $post) }}"
                                                            class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white transition hover:bg-amber-600">
                                                            Edit
                                                        </a>
                                                    @endcan


                                                    @can('articles.delete')
                                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                                            method="POST">
                                                            @method('delete')
                                                            <button onclick="return confirm('Are you sure?!')"
                                                                type="submit"
                                                                class="rounded-md bg-red-600 px-3 py-1.5 text-sm cursor-pointer font-medium text-white transition hover:bg-red-700">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan


                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $count++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-12 text-center text-sm text-slate-500">
                                                {{ __('site.no_posts') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-10">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
