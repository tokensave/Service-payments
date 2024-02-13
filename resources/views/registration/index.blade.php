<x-layouts.auth xmlns:x-slot="http://www.w3.org/1999/xhtml">

    <x-slot:title>
        Регистрация
    </x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('registration.store') }}" method="post">
                <x-form.item>
                    <x-form.label>Ваше имя</x-form.label>
                    <x-form.text name="first_name" placeholder="Иван" autofocus></x-form.text>


                </x-form.item>

                <x-form.item>
                    <x-form.label>Ваш email</x-form.label>
                    <x-form.text name="email" placeholder="mail@example.com"></x-form.text>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Придумайте пароль</x-form.label>
                    <x-form.text type="password" name="password" placeholder="*******"></x-form.text>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Повторите пароль</x-form.label>
                    <x-form.text type="password" name="password_confirmation" placeholder="*******"></x-form.text>
                </x-form.item>

                <x-form.item>
                    <x-form.check name="agreement">
                        Внимательно прочитал и принимаю пользовательское соглашение.
                    </x-form.check>
                </x-form.item>

                <x-button type="submit">Зарегистрироваться</x-button>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Есть аккаунт?

        <x-link to="{{ route('login') }}">
            Войти
        </x-link>

    </x-slot:crosslink>

</x-layouts.auth>
