@extends('Base')

@section('body')
    <div class="memberManagement">
        <p class="topPage__icon"><i class="nes-octocat animate"></i></p>
        <h1>？？？ が なかま に なりたそう に こちら を みている</h1>

        <section>
            <vc-member-operation></vc-member-operation>
        </section>

        <!-- 戻るリンク -->
        <div class="memberManagement_backLink">
            <i class="nes-mario"></i>
            <a href="/">もどる</a>
        </div>
    </div>
@endsection
