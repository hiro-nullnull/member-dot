@extends('Base')

@section('body')
<div class="topPage">
    <p class="topPage__icon"><i class="nes-octocat animate"></i></p>
    <h1>ゆかい な なかま たち</h1>

    {{-- メンバーリスト --}}
    <section class="topPageMemberList">
        <h2>なかま</h2>
        <div class="topPageMemberList__content">
            <div class="topPageMemberList__contentItem">
                @foreach($memberList as $member)
                    <vc-member-icon icon-number="dot001"></vc-member-icon>
                    <p>{{$member->name}}</p>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
