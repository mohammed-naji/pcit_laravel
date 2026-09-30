<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <p class="text-sm font-medium uppercase tracking-wide text-sky-600">
                    {{ __('site.management') }}</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">{{ __('Users') }}</h1>
            </div>


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
                                            {{ __('Name') }}</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('Role') }}</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            {{ __('site.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 bg-white">
                                    @php
                                        $count = ((request()->page ?? 1) - 1) * 20 + 1;
                                    @endphp
                                    @forelse ($users as $user)
                                        <tr class="transition hover:bg-slate-50">
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-700">
                                                {{-- {{ $loop->iteration }} --}}
                                                {{-- {{ $user->id }} --}}
                                                {{ $count }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                                {{ $user->name }}</td>
                                            <td class="px-6 py-4">
                                                <select onchange="updateRole(event, '{{ $user->id }}')"
                                                    class="rounded w-36 block">
                                                    @foreach ($roles as $role)
                                                        <option @selected($user->hasRole($role->name))
                                                            value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="flex justify-end gap-2">


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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateRole(e, userId) {
            console.log(e.target.value, userId);
            fetch('{{ route('dashboard.user.role') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                },
                body: JSON.stringify({
                    userId: userId,
                    role: e.target.value
                })
            }).then((res) => {
                console.log(res);
                alert('user role updated')
            }).catch((err) => {
                console.log(err);
            });
        }
    </script>
</x-app-layout>
