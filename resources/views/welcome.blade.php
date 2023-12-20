<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Todo Application</title>
    <link
        rel="stylesheet"
        href="{{ mix('css/app.css') }}"
    >
    <script
        src="{{ mix('js/app.js') }}"
        defer
    ></script>
</head>

<body class="bg-gray-100">
    <div class="w-3/4 mx-auto">
        <x-success-message class="my-4" />

        <a href="/">Home</a>

        {{-- create todo --}}
        <x-card title="Cambios de Arthur todo-laravel">
            <form
                action="{{ $model->exists ? route('todo.update', $model->id) : route('todo.store') }}"
                method="POST"
            >
                @csrf

                @if($model->exists)
                    @method('PUT')
                @endif

                <div class="text-gray-700 text-base mb-4">
                    @include('includes._title')
                    @include('includes._body')
                </div>

                <x-button>
                    {{ $model->exists ? 'Update' : 'Create' }}
                </x-button>
            </form>
        </x-card>


        @include('includes._todo_list', [
            'todos' => $todos,
        ])
    </div>
</body>

</html>
