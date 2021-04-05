@extends('Base')

@section('body')
    <main class="topPage">
        <vc-top-icon class="topPage__icon"></vc-top-icon>
        <h1>ゆかい な なかま たち</h1>

        {{-- メンバーリスト --}}
        <section class="topPageMemberList">
            <h2><i class="nes-icon coin is-large"></i>しょうかい</h2>

            <ul>
                @foreach($memberList as $key => $values)
                    @if (count($values) > 0)
                        <li class="topPageMemberList_column nes-container with-title">
                            <p class="title topPageMemberList__listTitle">@lang('views.pages.top.member_titles.' . $key)</p>
                            <div class="topPageMemberList__listContent">
                                @foreach($values as $member)
                                    <div class="topPageMemberList__listContentItem">
                                        <vc-member-card
                                            icon-number="{{ $member->icon_name }}"
                                            member-name="{{ $member->name }}"
                                            member-introduction="{{ $member->introduction }}"
                                        ></vc-member-card>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </section>
    </main>
@endsection
