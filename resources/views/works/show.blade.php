<x-app-layout>
    <div class="shadow bg-white border rounded w-full max-w-md mx-auto mt-10">
        <h1 class="text-3xl text-center font-semibold p-6">{{ __('宿題の詳細') }}</h1>

        <x-flash-message :message="session('notice')" />

        <div class="px-6 pb-6">

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('必要時間') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $work->required_time }}
                </div>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('進んだ時間') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $work->elapsed_time }}
                </div>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('宿題のタイトル') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $work->title }}
                </div>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('宿題の内容') }}
                </label>
                <p class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {!! nl2br(e($work->body)) !!}
                </p>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('教科') }}
                </label>
                <p class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $work->subject->subject }}
                </p>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('進捗状況') }}
                </label>
                <p class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $work->state->state }}
                </p>
            </div>

            <div class="flex flex-row text-center my-4">
                <a href="javascript:history.back()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">
                    {{ __('Go back') }}
                </a>
                <a href="{{ route('works.edit', $work) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">
                    {{ __('Edit') }}
                </a>
                <form action="{{ route('works.destroy', $work) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="{{ __('Delete') }}" onclick="if(!confirm('削除しますか？')){return false};"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            </div>

        </div>
</x-app-layout>
