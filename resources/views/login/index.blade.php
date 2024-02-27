<x-layouts.auth>

    <x-slot:title>
        Вход в аккаунт
    </x-slot:title>

    @auth
        <div class="py-4 text-center">
            {{ Auth::user()?->email }}

        </div>
    @endauth

    <x-card>
        <x-card.body>
            <x-form action="{{ route('login.store') }}" method="post">

                <x-form.item>
                    <x-form.label>Ваш email</x-form.label>
                    <x-form.text name="email" placeholder="mail@example.com"></x-form.text>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Ваш пароль</x-form.label>
                    <x-form.text type="password" name="password" placeholder="*******"></x-form.text>
                </x-form.item>

                <x-form.item>
                    <x-form.check name="remember">
                        Запомнить меня
                    </x-form.check>
                </x-form.item>

                <x-button type="submit">Войти</x-button>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Нет аккаунта?

        <x-link to="{{ route('registration') }}">
            Зарегистрироваться
        </x-link>

    </x-slot:crosslink>

</x-layouts.auth>
