<x-app-layout>
    <div class="mt-10">
        <h1 class="text-center text-lg">Let's Home Work！　宿題の一覧</h1>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-3">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">宿題名</th>
                    <th scope="col" class="py-3 px-6">教科</th>
                    <th scope="col" class="py-3 px-6">状態</th>
                    <th scope="col" class="py-3 px-6">進んだ時間</th>
                    <th scope="col" class="py-3 px-6">必要時間</th>

                    <th scope="col" class="py-3 px-6"></th>
                    <th scope="col" class="py-3 px-6"></th>
                    <th scope="col" class="py-3 px-6"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($works as $work)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">{{ $work->title }}</td>
                        <td class="py-4 px-6">{{ $work->subject->subject }}</td>
                        <td class="py-4 px-6">{{ $work->state->state }}</td>
                        <td class="py-4 px-6">{{ $work->elapsed_time }}</td>
                        <td class="py-4 px-6">{{ $work->required_time }}</td>

                        <td class="py-4 px-6">
                            <a href="{{ route('works.show', $work) }}"
                                class="inline-block bg-blue-500 hover:bg-blue-700 text-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                                {{ __('Details') }}
                            </a>
                        </td>
                        <td class="py-4 px-6"><a href="{{ route('works.edit', $work) }}"
                                class="inline-block bg-green-500 hover:bg-green-700 text-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                                {{ __('Edit') }}
                            </a>
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{ route('works.destroy', $work) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="{{ __('Delete') }}"
                                    onclick="if(!confirm('削除しますか？')){return false};"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
