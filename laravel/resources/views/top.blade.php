@extends('Base')

@section('body')
<div class="topPage">
    <p class="topPage__icon"><i class="nes-octocat animate"></i></p>
    <h1>ゆかい な なかま たち</h1>

    <h2>なかま</h2>
    <section class="topPageMemberList">

        <div class="topPageMemberList__content">
            <div lass="topPageMemberList__contentItem">
                <vc-member-icon icon-number="dot001"></vc-member-icon>
                <p>テストユーザー</p>
            </div>
        </div>
    </section>

    <vc-member-icon></vc-member-icon>
</div>
@endsection
