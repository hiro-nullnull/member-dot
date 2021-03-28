@extends('Base')

@section('body')
    <main class="topPage">
        <p class="topPage__icon"><i class="nes-octocat animate"></i></p>
        <h1>ゆかい な なかま たち</h1>

        {{-- メンバーリスト --}}
        <section class="topPageMemberList">
            <h2><i class="nes-icon coin is-large"></i>しょうかい</h2>

            <ul>
                {{-- 12~ からはインターン --}}
                @foreach($memberList as $key => $values)
                    <li class="topPageMemberList_column nes-container with-title">
                        <p class="title topPageMemberList__title">@lang('views.pages.top.member_titles.' . $key)</p>
                        <div class="topPageMemberList__content">
                            @foreach($values as $member)
                                <div class="topPageMemberList__contentItem">
                                    <vc-member-card
                                        icon-number="{{ $member->icon_name }}"
                                        member-name="{{ $member->name }}"
                                        member-introduction="{{ $member->introduction }}"
                                    ></vc-member-card>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection
