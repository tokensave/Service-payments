@extends('layouts.main')

@section('main.content')
    <section>

{{--        <div class="container">--}}
{{--            <div class="text-center">--}}
{{--                <div class="mb-4 text-success">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"--}}
{{--                         class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">--}}
{{--                        <path--}}
{{--                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <section>
            <div class="container">
                <div class="text-center">
                    <div class="mb-4 text-success">

                        <h5>
                            Оплачено
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                            </svg>
                        </h5>

                        <a href="{{ $payment->payable->getPayableUrl() }}" class="btn btn-primary">
                            Продолжить
                        </a>
                    </div>

                </div>
            </div>


        </section>


    </section>
@endsection
