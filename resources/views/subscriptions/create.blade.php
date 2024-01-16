@extends('layouts.main')

@section('main.content')
    <section>
        <div class="container">
            <h4 class="mb-3">Мои подписки</h4>

            <div class="card">
                <div class="card-body">
                    <h5 class="m-0 card-title">
                        Создание подписки
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('subscriptions.store') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            Оформить подписку
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
