<x-app-layout>
    <div class="shadow bg-white border rounded w-full max-w-md mx-auto mt-10">
        <h1 class="text-3xl text-center font-semibold p-6">{{ __('宿題の登録') }}</h1>

        <x-validation-errors :errors="$errors" />

        <form action="{{ route('works.store') }}" method="POST" class="relative px-6 pb-6 flex-auto">
            @csrf

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('必要時間') }}
                </label>
                <input type="time" name="required_time" id="required_time" value="{{ old('required_time') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('進んだ時間') }}
                </label>
                <input type="time" name="elapsed_time" id="elapsed_time" value="{{ old('elapsed_time') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('宿題のタイトル') }}
                </label>
                <input type="text" name="title" id="title" placeholder="{{ __('宿題のタイトル') }}"
                    value="{{ old('title') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('宿題の内容') }}
                </label>
                <textarea name="body" id="body"
                    placeholder="{{ __('例：教科書p1~p10') }}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline h-32">{{ old('body') }}</textarea>
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('教科を選んでください') }}
                </label>
                @foreach ($subjects as $subject)
                    <label>
                        <input type="radio" name="subject_id" id='subject'
                            value="{{ $subject->id }}"{{ old('subject_id') == $subject->id ? 'checked' : '' }}>
                        {{ $subject->subject }}</label><br>
                @endforeach
            </div>

            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('現在の状況を選んでください') }}
                </label>
                @foreach ($states as $state)
                    <label>
                        <input type="radio" name="state_id" id='state'
                            value="{{ $state->id }}"{{ old('state_id') == $state->id ? 'checked' : '' }}>
                        {{ $state->state }}</label><br>
                @endforeach
            </div>

            <input type="submit" value="{{ __('Create') }}"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>
