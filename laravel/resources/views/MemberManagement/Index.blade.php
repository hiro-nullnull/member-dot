@extends('Base')

@section('body')
    <div class="memberManagement">
        <p class="topPage__icon"><i class="nes-octocat animate"></i></p>
        <h1>？？？ が なかま に なりたそう に こちら を みている</h1>

        <section>
            <vc-member-operation
                :member-list="{{ json_encode($memberList) }}"
            ></vc-member-operation>
        </section>

        <!-- 戻るリンク -->
        <div class="memberManagement_backLink">
            <p><a href="/">もどる</a></p>
            <i class="nes-pokeball"></i>
        </div>
    </div>
@endsection
